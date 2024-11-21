$(document).ready(function () {
    $("#sort").on('change', function () {
        this.form.submit();
    })
    // Get Product Price Base On Size
    $(".getPrice").change(function () {
        var size = $(this).val();
        var product_id = $(this).attr("product-id");
        // alert(size);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/get-attribute-price',
            data:{
                size:size,product_id:product_id
            },
            type:'post',
            success: function (resp) {
                $("#appendMiniCartItems").html(resp.minicartview);
                // alert(resp);
                if (resp['discount']>0) {
                    $(".getAttributePrice").html("<span>£" + resp['final_price'] + "</span> <span>£"+resp['product_price']+"</span>");
                } else {
                    $(".getAttributePrice").html("<span>£" + resp['final_price'] + "</span>");
                }
            },error:function () {
                alert("Error");
            }
        })
    
    });
    // Add To Cart 
    $("#addToCart").submit(function () {
        $("#loading").show();
        // alert("test");  
        var formData = $(this).serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/add-to-cart',
            type: 'post',
            data: formData,
            success: function (resp) {
                $("#loading").hide();
                // Update the total cart items count
                $(".totalCartItems").html(resp['totalCartItems']);
                $("#appendCartItems").html(resp.view);
                $("#appendMiniCartItems").html(resp.minicartview);
                // alert(resp);
                if (resp['status'] == 'true') { 
                    //alert("Product Added To Cart");
                    $('.print-success-msg').show();
                    $('.print-success-msg').delay(6000).fadeOut('slow');
                    $('.print-success-msg').html("<div class='success'><span class= 'closebtn' onclick = 'this.parentElement.style.display='none';'></span >"+resp['message']+"</div >");
                } else {
                    $('.print-error-msg').show(); 
                    $('.print-error-msg').delay(6000).fadeOut('slow'); 
                    $('.print-error-msg').html("<div class='alert'><span class= 'closebtn' onclick = 'this.parentElement.style.display ='none';'></span>"+resp['message']+"</div >");
                }
            }, error: function () {
                $("#loading").hide();
                alert("Error");
            }
        });
    });

    // Update CartItems Quantity
    $(document).on('click', '.updateCartItem', function () {
        // alert("test");
        if ($(this).hasClass('plus1')) {
            // Get Qty
            var quantity = $(this).data('qty');
            // alert(quantity);

            // Increase the quantity by one
            new_qty = parseInt(quantity)+1;
            // alert(new_qty);
        }
        if ($(this).hasClass('minus1')) {
            // Get Qty
            var quantity = $(this).data('qty');
            // alert(quantity);

            // Check Quantity Must Be 1
            if (quantity<=1){ 
                alert("Quantity must be 1 Or Greater!");
                return false;
            }

            // Increase the quantity by one
            new_qty = parseInt(quantity)-1;
            // alert(new_qty);
        }
        var cartid = $(this).data('cartid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'cartid': cartid,
                'qty': new_qty
            },
            url: '/update-cart-item-qty',
            type: 'post',
            success: function (resp) { 
                $(".totalCartItems").html(resp.totalCartItems);
                // alert(resp);
                if (resp.status==false) {
                    alert(resp.message);
                }
                $("#appendCartItems").html(resp.view);
                $("#appendMiniCartItems").html(resp.minicartview);
            }, error: function () {
                alert("Error");
            }
        });
    });
    /*$(document).on('click', '.updateCartItem', function () {
        var cartid = $(this).data('cartid');
        var quantity = $(this).data('qty');
        var new_qty = quantity;

        // Check if the clicked button is for increment or decrement
        if ($(this).hasClass('qtyPlus')) {
            new_qty = parseInt(quantity)+1;  // Increase quantity by 1
        }

        if ($(this).hasClass('qtyMinus')) {
            // Ensure the quantity doesn't go below 1
            if (quantity<=1) {
                new_qty = parseInt(quantity)-1;  // Decrease quantity by 1
            } else {
                alert("Quantity must be 1 or greater!");
                return false;
            }
        }

        // AJAX request to update the quantity
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'cartid': cartid,
                'qty': new_qty
            },
            url: '/update-cart-item-qty',
            type: 'post',
            success: function (resp) {
                // Update the cart view (assuming the response contains the updated view)
                if (resp.status==false) {
                    alert(resp.message);
                }
                $("#appendCartItems").html(resp.view);
            },error:function () {
                alert("Error updating cart item.");
            }
        });
    });*/
  
    /*$(document).on('click', '.updateCartItem', function () {
        // Get the current quantity from the input field instead of data-qty attribute
        var quantity = parseInt($(this).closest('.cart-plus-minus').find('input').val());
        var new_qty;

        if ($(this).hasClass('plus1')) {
            // Increase the quantity by one
            new_qty = quantity + 1;
        }

        if ($(this).hasClass('minus1')) {
            // Check Quantity Must Be 1
            if (quantity <= 1) {
                alert("Quantity must be 1 or Greater!");
                return false;
            }
            // Decrease the quantity by one
            new_qty = quantity - 1;
        }

        // Update the input field and data-qty attribute with the new value
        $(this).closest('.cart-plus-minus').find('input').val(new_qty);
        $(this).data('qty', new_qty);
        $(this).closest('.cart-plus-minus').find('.updateCartItem').data('qty', new_qty);

        var cartid = $(this).data('cartid');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'cartid': cartid,
                'qty': new_qty
            },
            url: '/update-cart-item-qty',
            type: 'post',
            success: function (resp) {
                if (resp.status == false) {
                    alert(resp.message);
                }
                $("#appendCartItems").html(resp.view);
            }, error: function () {
                alert("Error");
            }
        });
    });*/

    // Delete Cart Item
    /*$(document).on('click', '.deleteCartItem', function () {
        var cartid = $(this).data('cartid');
        var result = confirm("Are You Sure You Really Want To Delete these Article ?  Because You Won't Be Able To Redrive It Back!");
        if (result){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'cartid': cartid,
                },
                url: '/delete-cart-item',
                type: 'post',
                success: function (resp) {
                    $("#appendCartItems").html(resp.view);
                },
                error: function () {
                    alert("Error");
                }
            }); 
        }
        
    });*/
    // Confirm delete with sweat alert
    /*$(document).on("click", ".confirmDelete", function () {
        var record = $(this).attr('record');
        var recordid = $(this).attr('recordid');
        Swal.fire({
            title: "Are you sure you want to delete the file?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes,You Can delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted successfully.",
                    icon: "success"
                });
                window.location.href = "/admin/delete-" + record + "/" + recordid;
            }
        });
    });*/
    $(document).on('click', '.deleteCartItem', function () {
        var cartid = $(this).data('cartid');
        var page = $(this).data('page');
        // Trigger SweetAlert confirmation instead of default confirm dialog
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to redrive this item back!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'cartid': cartid,
                    },
                    url: '/delete-cart-item',
                    type: 'post',
                    success: function (resp) {
                        Swal.fire(
                            'Deleted!',
                            'Your item has been deleted.',
                            'success'
                        );
                        // Update the cart items dynamically
                        $("#appendCartItems").html(resp.view);
                        $("#appendMiniCartItems").html(resp.minicartview);
                        // Update the total cart items count
                        $(".totalCartItems").html(resp.totalCartItems);
                        if (page == "Checkout") {
                            window.location.href = "/checkout";
                        }
                    },
                    error: function () {
                        Swal.fire(
                            'Error!',
                            'There was an issue deleting the item.',
                            'error'
                        );
                    }
                });
            }
        });
    });

    // Empty Total Cart
    /*$(document).on('click', '.emptyCart', function () {
        // Trigger SweetAlert confirmation instead of default confirm dialog
        Swal.fire({
            title: 'Are you sure you want to delete the Total Cart ?',
            text: "You won't be able to redrive this item back!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/empty-cart',
                    type: 'post',
                    success: function (resp) {
                        Swal.fire(
                            'Deleted!',
                            'Your item has been deleted.',
                            'success'
                        );
                        // Update the cart items dynamically
                        $("#appendCartItems").html(resp.view);
                        $("#appendMiniCartItems").html(resp.minicartview);
                        // Update the total cart items count
                        $(".totalCartItems").html(resp.totalCartItems);
                    },
                    error: function () {
                        Swal.fire(
                            'Error!',
                            'There was an issue deleting the item.',
                            'error'
                        );
                    }
                });
            }
        });
    });*/

    // Register Form Validation
    $("#registerForm").submit(function () {
        $("#loading").show();
        var formData = $("#registerForm").serialize();
        // alert(formData); return false;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/user/register',
            type: 'post',
            data: formData,
            success: function (data) {
                if (data.type == "validation") {
                    $("#loading").hide();
                    $.each(data.errors, function (i, error) {
                        $('#register-' + i).attr('style', 'color:red');
                        $('#register-' + i).html(error);
                        setTimeout(function () {
                            $('#register-' + i).css({
                                'display': 'none'
                            });
                        }, 5000);
                    });
                } else if (data.type == "success") {
                    $("#loading").hide();
                    // alert(resp);
                    // window.location.href = data.redirectUrl;
                    $("#register-success").attr('style', 'color:green');
                    $("#register-success").html(data.message);
                }
            },
            error: function () {
                alert('Error!');
            }
        });
    });

    // Login Form Validation
    $("#loginForm").submit(function () {
        var formData = $(this).serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/user/login',
            type: 'post',
            data:formData,
            success: function (resp) {
                // alert(resp);
                if (resp.type == "error") {
                    $.each(resp.errors, function (i, error) {
                        $('.login-' + i).attr('style', 'color:red');
                        $('.login-' + i).html(error);
                        setTimeout(function () {
                            $('.login-' + i).css({
                                'display': 'none'
                                
                            })
                        }, 4000);
                    });
                } else if (resp.type == "inactive") { 
                    $("#login-error").attr('style', 'color:red');
                    $("#login-error").html(resp.message);
                    setTimeout(function () {
                        $("#login-error").css({
                            'display': 'none'
                        })
                    }, 4000);
                }
                else if (resp.type == "incorrect") {
                    $("#login-error").attr('style', 'color:red');
                    $("#login-error").html(resp.message);
                    setTimeout(function () {
                        $("#login-error").css({
                            'display': 'none'
                        })
                    }, 4000);
                } else if (resp.type == "success") {
                    window.location.href = resp.redirectUrl;
                }
            }, error: function () {
                alert("Error!");
            }
        });
    });
    
    // Forgot Password
    $("#forgotForm").submit(function () {
        $("#loading").show();
        var formData = $(this).serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/user/forgot-password',
            type: 'post',
            data: formData,
            success: function (resp) {
                $("#loading").hide();
                // alert(resp.type);
                if (resp.type == "error"){
                    $.each(resp.errors, function (i,error){
                        $('.forgot-'+i).attr('style','color:red');
                        $('.forgot-'+i).html(error);
                        setTimeout(function(){
                            $('.forgot-'+i).css({
                                'display':'none'
                            })
                        }, 4000);
                    });
                } else if (resp.type == "success") {
                    $(".forgot-success").attr('style','color:green');
                    $(".forgot-success").html(resp.message);
                    setTimeout(function () {
                        $(".forgot-success").css({
                            'display': 'none'
                        })
                    }, 4000);
                }
            }, error: function () {
                $("#loading").hide();
                alert("Error!");
            }
        });
    });

    // Reset Password Password Form Validation
    $("#resetPwdForm").submit(function () {
        $("#loading").show();
        var formData = $(this).serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/user/reset-password',
            type: 'post',
            data: formData,
            success: function (resp) {
                $("#loading").hide();
                // alert(resp.type);
                if (resp.type == "error") {
                    $.each(resp.errors, function (i, error) {
                        $('.reset-' + i).attr('style', 'color:red');
                        $('.reset-' + i).html(error);
                        setTimeout(function () {
                            $('.reset-' + i).css({
                                'display': 'none'
                            })
                        }, 4000);
                    });
                } else if (resp.type == "success") {
                    $(".reset-success").attr('style', 'color:green');
                    $(".reset-success").html(resp.message);
                    setTimeout(function () {
                        $(".reset-success").css({
                            'display': 'none'
                        })
                    }, 4000);
                }
            }, error: function () {
                $("#loading").hide();
                alert("Error!");
            }
        });
    });

    // Account Form Validation
    $("#accountForm").submit(function () {
        $("#loading").show();
        var formData = $(this).serialize();
        // alert(formData); return false;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/user/account',
            type:'post',
            data:formData,
            success: function(data) {
                if (data.type=="validation"){
                    $("#loading").hide();
                    $.each(data.errors,function(i,error){
                        $('#account-'+i).attr('style','color:red');
                        $('#account-'+i).html(error);
                        setTimeout(function(){
                            $('#account-'+i).css({
                                'display': 'none'
                                
                            });
                        }, 5000);
                    });
                } else if (data.type=="success") {
                    $("#loading").hide();
                    // alert(resp);
                    // window.location.href = data.redirectUrl;
                    $("#account-success").attr('style','color:green');
                    $("#account-success").html(data.message);
                }
            },
            error: function(){
                alert('Error!');
            }
        });
    });

    // Update Password Validation
    $("#password-success").hide();
    $("#password-error").hide();
    $("#passwordForm").submit(function () {
        $("#loading").show();
        var formData = $(this).serialize();
        // alert(formData); return false;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/user/update-password',
            type:'post',
            data:formData,
            success:function(data) {
                if(data.type=="error"){
                    $("#loading").hide();
                    $("#password-success").hide();
                    $.each(data.errors,function(i,error) {
                        $('#password-'+i).attr('style','color:red');
                        $('#password-'+i).html(error);
                        setTimeout(function(){
                            $('#password-'+i).css({
                                'display':'none'

                            });
                        }, 5000);
                    });
                } else if (data.type=="incorrect") {
                    $("#loading").hide();
                    // alert(resp);
                    // window.location.href = data.redirectUrl;
                    $("#password-success").hide();
                    $("#password-error").attr('style', 'color:red');
                    $("#password-error").html(data.message);
                } else if (data.type == "success") {
                    $("#loading").hide();
                    // alert(resp);
                    // window.location.href = data.redirectUrl;
                    $("#password-error").hide();
                    $("#password-success").attr('style', 'color:green');
                    $("#password-success").html(data.message);
                }
            },
            error: function () {
                $("#loading").hide();
                alert('Error!');
            }
        });
    });

    // Apply Coupon
    $(document).on('click', '#applyCoupon', function (e) {
        e.preventDefault(); // Prevent page reload
        var user = $(this).attr("user");
        if (user == 1) {
            // Proceed with coupon application
        } else {
            alert("Please Login To Apply Coupon!");
            return false;
        }
        var code = $("#coupon_code").val(); // Get the value using the ID 'coupon_code'
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: '/apply-coupon',
            data: {
                code: code
            },
            success: function (resp) {
                // Handle success response here
                //console.log(resp);
                if (resp.status == false) {
                    $('.print-error-msg').show();
                    $('.print-error-msg').delay(6000).fadeOut('slow');
                    $('.print-error-msg').html("<div class='alert'><span class= 'closebtn' onclick = 'this.parentElement.style.display = 'none';'></span>" + resp['message'] + "</div >");
                } else if (resp.status == true) {
                    if (resp.couponAmount > 0) {
                        $(".couponAmount").text("£" + resp.couponAmount);
                    } else {
                        $(".couponAmount").text("£0");
                    }
                    if (resp.grand_total > 0) {
                        $(".grandTotal").text("£" + resp.grandTotal);
                    }
                    $('.print-success-msg').show();
                    $('.print-success-msg').delay(6000).fadeOut('slow');
                    $('.print-success-msg').html("<div class='success'><span class= 'closebtn' onclick = 'this.parentElement.style.display ='none';'></span>" + resp['message'] + "</div >");
                    
                    $(".totalCartItems").html(resp.totalCartItems);
                    $("#appendCartItems").html(resp.view);
                    $("#appendMiniCartItems").html(resp.minicartview);
                    // Update the total cart items count
                 }
            },
            error: function () {
                alert('Error!');
            }
        });
    });

    // Save Delivery Address
    $(document).on('submit', '#deliveryAddressForm', function () {
        $("#loading").show();
        // alert("test");
        var formData = $("#deliveryAddressForm").serialize();
        //alert(formData);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/save-delivery-address',
            type: 'post',
            data: formData,
            success: function (resp) {
                // alert(resp);
                if (resp.type == "error") {
                    $("#loading").hide();
                    $.each(resp.errors, function (i, error) {
                        $('#delivery-' + i).attr('style', 'color:red');
                        $('#delivery-' + i).html(error);
                        setTimeout(function () {
                            $('#delivery-' + i).css({
                                'display': 'none'
                            });
                        },5000);
                    });
                } else {
                    $("#loading").hide();
                    $("#deliveryAddressForm").trigger('reset');
                    $(".deliveryText").text("Add New Delivery Address");
                    $("#deliveryAddresses").html(resp.view);
                    window.location.href = "checkout";
                }
            }, error: function () {
                $("#loading").hide();
                alert("Error");
            }
        })
    });

    // Edit Delivery Address
    $(document).on('click', '.editAddress', function () { 
        var addressid = $(this).data('addressid');
        // alert(addressid);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { addressid: addressid },
            url: '/get-delivery-address',
            type: 'post',
            success: function (resp) { 
                // alert(resp);
                $(".deliveryText").text("Edit Delivery Address");
                $('[name=delivery_id]').val(resp.address['id']);
                $('[name=delivery_name]').val(resp.address['name']);
                $('[name=delivery_address]').val(resp.address['address']);
                $('[name=delivery_city]').val(resp.address['city']);
                $('[name=delivery_state]').val(resp.address['state']);
                $('[name=delivery_country]').val(resp.address['country']);
                $('[name=delivery_pincode]').val(resp.address['pincode']);
                $('[name=delivery_mobile]').val(resp.address['mobile']);
            }, error: function () {
                alert("Error");
            }
        });
    });

    // Delete Delivery Address
    $(document).on('click', '.deleteAddress', function () {
        if (confirm("Are You Sure To Remove This Delivery Address")) {
            var addressid = $(this).data('addressid');
            // alert(addressid);
            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { addressid: addressid },
            url: '/remove-delivery-address',
            type: 'post',
            success: function (resp) {
                // alert(resp);
                $("#deliveryAddresses").html(resp.view);
                window.location.href = "checkout";
            }, error: function () {
                alert("Error");
            }
        });
        } 
    });

    // Calculate Grand Total
    $("input[name=address_id").bind('change', function () { 
        var shipping_charges = $(this).attr("shipping_charges");
        var total_price = $(this).attr("total_price");
        var coupon_amount = $(this).attr("coupon_amount");
        $(".shipping_charges").html("£." + shipping_charges);
        if (coupon_amount=="") {
            coupon_amount = 0;
        }
        $(".couponAmount").html("£." + coupon_amount);
        var grand_total = parseInt(total_price) + parseInt(shipping_charges) - parseInt(coupon_amount);
        $(".grand_total").html("£." + grand_total);
        // alert(grand_total);
        // alert(shipping_charges);
    });

    // Set Default Delivery Address
    $(document).on('click', '.setDefaultAddress', function () {
        var addressid = $(this).data('addressid');
        // alert(addressid);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { addressid: addressid },
            url: '/set-default-delivery-address',
            type: 'post',
            success: function (resp) {
                // alert(resp);
                $("#deliveryAddresses").html(resp.view);
                window.location.href = "checkout";
            }, error: function () {
                alert("Error");
            }
        });
    });

        

    // Save Delivery Address
    /*$(document).on('submit','#deliveryForm',function () {
        //alert("test");
        $("#loading").show();
        var formData = $("#deliveryAddressForm").serialize();
        //alert(formData);
        $.ajax({
            type: 'post',
            url: '/save-delivery-address',
            data: formData,
            success: function(resp){
                //alert(resp);
                // Handle success response here
                if (resp.type=="error") {
                    $("#loading").hide();
                    $.each(resp.errors,function(i,error) {
                        $('#delivery-'+i).attr('style','color:red');
                        $('#delivery-'+i).html(error);
                        setTimeout(function(){
                            $('#delivery-'+i).css({
                                'display':'none'
                            });
                        },5000);
                    });
                } else {
                    $("#loading").hide();
                    $("#deliveryAddressForm").trigger('reset');
                    $(".deliveryText").text("Add New Delivery Address");
                    $("#deliveryAddresses").html(resp.view);
                }
            },error: function () {
                $("#loading").hide();
                alert("Error");
            }
        });
    });*/


    // Edit Delivery Address
    /*$(document).on('click', '.editAddress', function () {
        var addressid = $(this).data('addressid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { addressid: addressid },
            type: 'post',
            url: '/get-delivery-address',
            success: function (resp) { 
                // Handle success response here
                $(".deliveryText").text("Edit Delivery Address");
                $('[name=delivery_id]').val(resp.address['id']);
                $('[name=delivery_name]').val(resp.address['name']);
                $('[name=delivery_address]').val(resp.address['address']);
                $('[name=delivery_city ]').val(resp.address['city']);
                $('[name=delivery_state]').val(resp.address['state']);
                $('[name=delivery_country]').val(resp.address['country']);
                $('[name=delivery_pincode]').val(resp.address['pincode']);
                $('[name=delivery_mobile]').val(resp.address['mobile']);
                $('[name=delivery_email]').val(resp.address['email']);
            }, error: function () {
                alert("Error");
            }
        });
    });
    
    // Delete Delivery Address
    $(document).on('click', '.deleteAddress', function () {
        if (confirm("Are You Sure To Remove This Address ?")) {
            var addressid = $(this).data('addressid');
           $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { addressid: addressid },
            type: 'post',
            url: '/remove-delivery-address',
            success: function (resp) {
                $("#deliveryAddresses").html(resp.view);
            }, error: function () {
                alert("Error");
            }
        }); 
        }
        
        
    });*/

});