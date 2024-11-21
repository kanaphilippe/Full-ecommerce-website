$(document).ready(function () {
    // Check Admin Password is correct or not
    $("#current_pwd").keyup(function () {
        var current_pwd = $("#current_pwd").val();
        //alert(current_pwd);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/check-current-password',
            data: { current_pwd: current_pwd },
            success: function (resp) {
                if (resp == "false") {
                    $("#verifyCurrentPwd").html("Wrong Current Password!");
                } else if (resp == "true") {
                    $("#verifyCurrentPwd").html("Your Current Password is Correct!");
                }
            }, error: function () {
                alert("Error");
            }
        })
    });
 
    // Update CMS Page Status
    $(document).on("click",".updateCmsPageStatus",function(){
        var status = $(this).children("i").attr("status");
        var page_id = $(this).attr("page_id");
        //alert(page_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/update-cms-page-status',
            data:{status:status,page_id:page_id },
            success:function(resp){
                if (resp['status'] == 0) {
                    $("#page-" + page_id).html("<i class='mdi mdi-toggle-switch-off' style='color:red' status='Inactive'></i>");
                }else if(resp['status']==1) {
                    $("#page-" + page_id).html("<i class='mdi mdi-toggle-switch' style='color:#5BD1D7' status='Active'></i>");
                }
            },error:function(){
                alert("Error");
            }
        })
    });

    // Update Category Status
    $(document).on("click", ".updateCategoryStatus", function () {
        var status = $(this).children("i").attr("status");
        var category_id = $(this).attr("category_id");
        //alert(category_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-category-status',
            data: { status: status, category_id: category_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#category-" + category_id).html("<i class='mdi mdi-toggle-switch-off' style='color:red' status='Inactive'></i>");
                } else if (resp['status'] == 1) {
                    $("#category-" + category_id).html("<i class='mdi mdi-toggle-switch' style='color:#5BD1D7' status='Active'></i>");
                }
            }, error: function () {
                alert("Error");
            }
        })
    });

    // Update Banner Status
    $(document).on("click", ".updateBannerStatus", function () {
        var status = $(this).children("i").attr("status");
        var banner_id = $(this).attr("banner_id");
        //alert(banner_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-banner-status',
            data: { status: status, banner_id: banner_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#banner-" + banner_id).html("<i class='mdi mdi-toggle-switch-off' style='color:red' status='Inactive'></i>");
                } else if (resp['status'] == 1) {
                    $("#banner-" + banner_id).html("<i class='mdi mdi-toggle-switch' style='color:#5BD1D7' status='Active'></i>");
                }
            }, error: function () {
                alert("Error");
            }
        })
    });

    // Update Product Status
    $(document).on("click", ".updateProductStatus", function () {
        var status = $(this).children("i").attr("status");
        var product_id = $(this).attr("product_id");
        //alert(product_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-product-status',
            data: { status: status, product_id: product_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#product-" + product_id).html("<i class='mdi mdi-toggle-switch-off' style='color:red' status='Inactive'></i>");
                } else if (resp['status'] == 1) {
                    $("#product-" + product_id).html("<i class='mdi mdi-toggle-switch' style='color:#5BD1D7' status='Active'></i>");
                }
            }, error: function () {
                alert("Error");
            }
        })
    });

    // Update Attribute Status
    $(document).on("click", ".updateAttributeStatus", function () {
        var status = $(this).children("i").attr("status");
        var attribute_id = $(this).attr("attribute_id");
        //alert(product_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-attribute-status',
            data: { status: status, attribute_id: attribute_id},
            success:function(resp){
                if (resp['status'] == 0){
                    $("#attribute-" + attribute_id).html("<i class='mdi mdi-toggle-switch-off' style='color:red' status='Inactive'></i>");
                } else if (resp['status']==1){
                    $("#attribute-" + attribute_id).html("<i class='mdi mdi-toggle-switch' style='color:#5BD1D7' status='Active'></i>");
                }
            }, error: function(){
                alert("Error");
            }
        })
    });

    // Update Brand Status
    $(document).on("click", ".updateBrandStatus", function () {
        var status = $(this).children("i").attr("status");
        var brand_id = $(this).attr("brand_id");
        //alert(product_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-brand-status',
            data: { status: status, brand_id: brand_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#brand-" + brand_id).html("<i class='mdi mdi-toggle-switch-off' style='color:red' status='Inactive'></i>");
                } else if (resp['status'] == 1) {
                    $("#brand-" + brand_id).html("<i class='mdi mdi-toggle-switch' style='color:#5BD1D7' status='Active'></i>");
                }
            }, error: function () {
                alert("Error");
            }
        })
    });

    // Update Rating Status
    $(document).on("click", ".updateRatingStatus", function () {
        var status = $(this).children("i").attr("status");
        var rating_id = $(this).attr("rating_id");
        //alert(product_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-rating-status',
            data: { status: status, rating_id: rating_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#rating-" + rating_id).html("<i class='mdi mdi-toggle-switch-off' style='color:red' status='Inactive'></i>");
                } else if (resp['status'] == 1) {
                    $("#rating-" + rating_id).html("<i class='mdi mdi-toggle-switch' style='color:#5BD1D7' status='Active'></i>");
                }
            }, error: function () {
                alert("Error");
            }
        })
    }); 

    // Update Subscribers Status
    $(document).on("click", ".updateSubscriberStatus", function () {
        var status = $(this).children("i").attr("status"); 
        var subscriber_id = $(this).attr("subscriber_id");
        //alert(product_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-subscriber-status',
            data: { status: status, subscriber_id: subscriber_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#subscriber-" + subscriber_id).html("<i class='mdi mdi-toggle-switch-off' style='color:red' status='Inactive'></i>");
                } else if (resp['status'] == 1) {
                    $("#subscriber-" + subscriber_id).html("<i class='mdi mdi-toggle-switch' style='color:#5BD1D7' status='Active'></i>");
                }
            }, error: function () {
                alert("Error");
            }
        })
    });

    // Update Shipping Status
    $(document).on("click", ".updateShippingStatus", function () {
        var status = $(this).children("i").attr("status");
        var shipping_id = $(this).attr("shipping_id");
        //alert(product_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-shipping-status',
            data: { status: status, shipping_id: shipping_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#shipping-" + shipping_id).html("<i class='mdi mdi-toggle-switch-off' style='color:red' status='Inactive'></i>");
                } else if (resp['status'] == 1) {
                    $("#shipping-" + shipping_id).html("<i class='mdi mdi-toggle-switch' style='color:#5BD1D7' status='Active'></i>");
                }
            }, error: function () {
                alert("Error");
            }
        })
    });


    // Update Users Status
    $(document).on("click", ".updateUserStatus", function () {
        var status = $(this).children("i").attr("status");
        var user_id = $(this).attr("user_id");
        //alert(product_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-user-status',
            data: { status: status, user_id: user_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#user-" + user_id).html("<i class='mdi mdi-toggle-switch-off' style='color:red' status='Inactive'></i>");
                } else if (resp['status'] == 1) {
                    $("#user-" + user_id).html("<i class='mdi mdi-toggle-switch' style='color:#5BD1D7' status='Active'></i>");
                }
            }, error: function () {
                alert("Error");
            }
        })
    });

    // Update Coupon Status
    $(document).on("click", ".updateCouponStatus", function () {
        var status = $(this).children("i").attr("status");
        var coupon_id = $(this).attr("coupon_id");
        //alert(product_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-coupon-status',
            data: { status: status, coupon_id: coupon_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#coupon-" + coupon_id).html("<i class='mdi mdi-toggle-switch-off' style='color:red' status='Inactive'></i>");
                } else if (resp['status'] == 1) {
                    $("#coupon-" + coupon_id).html("<i class='mdi mdi-toggle-switch' style='color:#5BD1D7' status='Active'></i>");
                }
            }, error: function () {
                alert("Error");
            }
        })
    });

    // Update Subadmin Status
    $(document).on("click", ".updateSubadminStatus", function () {
        var status = $(this).children("i").attr("status");
        var subadmin_id = $(this).attr("subadmin_id");
        //alert(page_id);
        $.ajax({ 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-subadmin-status',
            data: {status:status,subadmin_id:subadmin_id },
            success: function (resp) {
                if (resp['status'] == 0) {
                    $("#subadmin-"+subadmin_id).html("<i class='mdi mdi-toggle-switch-off' style='color:red' status='Inactive'></i>");
                } else if (resp['status'] == 1) {
                    $("#subadmin-"+subadmin_id).html("<i class='mdi mdi-toggle-switch' style='color:#5BD1D7' status='Active'></i>");
                }
            }, error: function () {
                alert("Error");
            }
        })
    });

    // Confirm delete of CMS Page.
   /* $(document).on("click", ".confirmDelete", function () {
        var name = $(this).attr('name');
        if (confirm('Are You Sure To Delete This' + name + '?')) {
            return true;
        }
        return false;
    })*/

    // Confirm delete with sweat alert
    $(document).on("click", ".confirmDelete", function () {
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
    });

    // Add Edit products Attributes Scripts
    $("#addRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="text" name="size[]" class="form-control m-input" placeholder="Enter SIZE" autocomplete="on"><input type="text" name="sku[]" class="form-control m-input" placeholder="Enter SKU" autocomplete="on"><input type="text" name="price[]" class="form-control m-input" placeholder="Enter PRICE" autocomplete="on"><input type="text" name="stock[]" class="form-control m-input" placeholder="Enter STOCK" autocomplete="on">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });

    // Show/Hide Coucpon Field for Manual/Automatic
    $("#ManualCoupon").click(function () {
        $("#couponField").show();
    });
    $("#AutomaticCoupon").click(function () { 
        $("#couponField").hide();
    });

    // Show Courier Name and Tracking Number in Case of Shipped Order Status
    $("#courier_name").hide();
    $("#tracking_number").hide();
    $("#order_status").on("change", function () {
        if (this.value == "Shipped") {
            $("#courier_name").show();
            $("#tracking_number").show();
        } else {
            $("#courier_name").hide();
            $("#tracking_number").hide();
        }
    });
});