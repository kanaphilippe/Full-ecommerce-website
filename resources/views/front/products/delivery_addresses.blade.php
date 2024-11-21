@if (count($deliveryAddresses)>0)
<h4 class="section-h4">Ship To</h4>
@foreach($deliveryAddresses as $address)
<div class="control-group" style="float: left; margin-right:5px;">
                     <input class="setDefaultAddress" data-addressid="{{$address['id'] }}" type="radio" id="address{{ $address['id'] }}" name="address_id" 
                                            value="{{ $address['id'] }}"   coupon_amount="{{ Session::get('couponAmount')}}"
                                            codpincodeCount="" prepaidpincodeCount="" @if ($address['is_default']==1) checked=""
                    
                    @endif>
</div>
    <div>
        <label style="color:blue;" class="control-label">{{ $address['name'] }}, 
                            {{ $address['address'] }}, <br>{{ $address['city'] }}:{{ $address['pincode'] }},  {{ $address['country'] }} 
                            ({{ $address['mobile'] }})
        </label>
<a style="float: right; margin-left: 10px;" href="javascript:;" data-addressid="{{$address['id'] }}" class="deleteAddress">Delete</a>
<a style="float: right;" href="javascript:;" data-addressid="{{$address['id'] }}" class="editAddress">Edit</a>
    </div>
@endforeach
@endif