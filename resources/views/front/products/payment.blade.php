<form action="{{ url('checkout') }}" name="checkoutForm" method="post">@csrf
<div class="accordion" id="checkoutAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header" id="checkoutOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bankOne" aria-expanded="true" aria-controls="bankOne">
                PAYMENT METHOD
            </button>
        </h2>
        <div id="bankOne" class="accordion-collapse collapse show" aria-labelledby="checkoutOne" data-bs-parent="#checkoutAccordion">
            <div class="accordion-body">
                <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="payment_gateway" id="bankTransfer" value="COD">
                        <label class="form-check-label" for="bankTransfer">
                            COD
                        </label>
                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="payment_gateway" id="bankTransfer" value="Bank Transfer">
                        <label class="form-check-label" for="bankTransfer">
                            Bank Transfer
                        </label>
                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="payment_gateway" id="creditCard" value="Credit Card">
                        <label class="form-check-label" for="creditCard">
                            Credit Card
                        </label>
                        <p>Pay using your credit card. You will be redirected to a secure payment gateway.</p>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="payment_gateway" id="paypal" value="Paypal">
                        <label class="form-check-label" for="paypal">
                            PayPal
                        </label>
                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                    </div>
            </div>
        </div>
    </div>
</div>

</form>

<style>
    @media (min-width:360px){
  h1{
    font-size:4.5em;
  }
  .go-home{
    margin-bottom:20px;
  }
}

@media (min-width:600px){
  .content{
  max-width:1000px;
  margin:0 auto;
}
}
</style>