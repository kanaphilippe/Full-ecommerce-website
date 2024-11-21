<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrdersLog;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Dompdf\Dompdf;

class OrderController extends Controller
{
    public function orders(){
        $orders = Order::with('orders_products', 'user')->orderBy('id', 'Desc')->get()->toArray();
        // dd($orders);
        return view('admin.orders.orders')->with(compact('orders'));
    }

    public function orderDetails($id){ 
        $orderDetails = Order::with('orders_products','user','log')->where('id',$id)->first()->toArray();
        $orderStatuses = OrderStatus::where('status', 1)->get()->toArray();
        // dd($orderDetails);
        return view('admin.orders.order_details')->with(compact('orderDetails','orderStatuses'));
    }

    public function updateOrderStatus(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            // Update Order Status
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);

            // Update Courier Name and Tracking Number
            if(!empty($data['courier_name'])&&!empty($data['tracking_number'])){
                Order::where('id', $data['order_id'])->update(['courier_name' => $data['courier_name'], 'tracking_number' => $data['tracking_number']]);

                // Send Order Shipped Email to Customer Tracking Details
                $orderDetails = Order::with('orders_products','user')->where('id', $data['order_id'])->first()->toArray();

                // Send Order Shipped Email
                $email = $orderDetails['user']['email'];
                $messageData = [
                    'email' => $email,
                    'name' => $orderDetails['user']['name'],
                    'order_id' => $data['order_id'],
                    'order_status' => $data['order_status'],
                    'courier_name' => $data['courier_name'],
                    'tracking_number' => $data['tracking_number'],
                    'orderDetails' => $orderDetails
                ];
                Mail::send('emails.shipped_order', $messageData, function($message) use ($email){
                    $message->to($email)->subject('Order Shipped (Tracking Details) - SAA MEYA');
                });
            }

            // Insert Order Status in Order Logs
            $log = new OrdersLog;
            $log->order_id = $data['order_id'];
            $log->order_status = $data['order_status'];
            $log->save();

            $message = "Order Status Has Been Updated Successfully!";
            return redirect()->back()->with('success_message',$message);
        }
    }

    public function printOrderHTMLInvoice($order_id){
        $orderDetails = Order::with('orders_products','user')->where('id',$order_id)->first()->toArray();
        // dd($orderDetails);
        return view('admin.orders.print_html_order_invoice')->with(compact('orderDetails'));
    }

    public function printPDFOrderInvoice($order_id){
        $orderDetails = Order::with('orders_products', 'user')->where('id', $order_id)->first()->toArray();

        $output = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Order Invoice</title>
    <style>
    .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
  </head>
  <body>
    <header class="clearfix">
      <h1>ORDER INVOICE</h1>
      <div id="company" class="clearfix">
        <div>SAAMEYA.IT</div>
        <div>Italia &nbsp; Alessandria<br /> , Via Mazzini 61 US</div>
        <div> Phone: (+39)3517-414-205</div>
        <div><a href="mailto:Email: saameya@eshop.it">Email: saameya@eshop.it</a></div>
      </div>
      <div id="project">
        <div><span>Order NUMBER</span> '.$orderDetails['id'].'</div>
        <div><span>DATE</span> '.date("F j, Y, g:i a", strtotime($orderDetails['created_at'])).'</div>
        <div><span>BILING ADDRESS</span> '.$orderDetails['user']['name'].','.$orderDetails['user']['address'].','.$orderDetails['user']['city'].','.$orderDetails['user']['state'].','.$orderDetails['user']['country'].','.$orderDetails['user']['pincode'].'</div>
        <div><span>DELIVERY ADDRESS</span> '.$orderDetails['name'].','.$orderDetails['address'].','.$orderDetails['city'].','.$orderDetails['state'].','.$orderDetails['country'].','.$orderDetails['pincode'].'</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Product</th>
            <th class="desc">Size</th>
            <th>Colore</th>
            <th>QTY</th>
            <th>Unit Price</th>
            <th>Total</th>
          </tr>
        </thead>';
             $total_price = 0;
        foreach ($orderDetails['orders_products'] as $order) {
            $total_price = $total_price + ($order['product_price'] * $order['product_qty']);

            $output .= '<tbody>
          <tr>
            <td class="desc">' . $order['product_name'] . '(' . $order['product_code'] . ')</td>
            <td class="desc">' . $order['product_size'] . '</td>
            <td class="qty">' . $order['product_color'] . '</td>
            <td class="qty">' . $order['product_qty'] . '</td>
            <td class="qty">' . $order['product_price'] . '£</td>
            <td class="qty">' . $order['product_price'] * $order['product_qty'] . '£</td>
          </tr>';
        }
          $output .='<tr>
            <td colspan="5">SUBTOTAL</td>
            <td class="total">'.$total_price.'£</td>
          </tr>
          <tr>
            <td colspan="5">SHIPPING CHARGES</td>
            <td class="total">0</td>
          </tr>
          <tr>
            <td colspan="5">DISCOUNT</td>';
            if ($orderDetails['coupon_amount']>0){
                $output .='<td class="total">'.$orderDetails['coupon_amount'].'£</td>';
            }else{
                $output .='<td class="total">0£</td>';
            }
           $output .='</tr> 
          
          <tr>
            <td colspan="5" class="grand total">GRAND TOTAL</td>
            <td class="grand total">'.$orderDetails['grand_total'].'</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($output);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }

}
