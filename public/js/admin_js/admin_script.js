$(document).ready(function() {

    $(".delete_form").click(function() {
        var id = $(this).attr('rel');
        var record = $(this).attr('record');
        // alert(id);
        swal({
                title: "Are you sure?",
                text: "You will not able to recover this record again!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it",
            },
            function() {
                window.location.href = "delete-" + record + "/" + id;
            }
        );
    });

});

$(document).ready(function() {
    $(".categories").click(function() {
        var category_id = $(this).attr("category_id");
        console.log(category_id)
            // alert(category_id)
        $.ajax({
            type: 'get',
            url: '/admin/ajax-get-item',
            data: {
                category_id: category_id
            },
            success: function(response) {
                console.log(response)
                $("#ajaxItem").html(response);
            },
            error: function() {
                alert("Error");
            }
        });
    });

});


//kishor i did this
$(document).ready(function() {
    $(".add_item").click(function() {
        // $("#add_item").empty()
        var item_id = $(this).attr("item_id");
        // alert('test')
        var price = $(this).attr("price");
        var name = $(this).attr("names");
        // var table = $(this).attr("table");
        var is_bar = $(this).attr("is_bar");
        var is_caffe = $(this).attr("is_caffe");
        var is_kitchen = $(this).attr("is_kitchen");
        $.ajax({
            type: 'post',
            url: '/admin/ajax-food-table',
            data: {
                item_id: item_id,
                price: price,
                name: name,
                is_bar: is_bar,
                is_caffe: is_caffe,
                is_kitchen: is_kitchen,

            },
            success: function(response) {
                console.log(response)
                $("#add_item_table").html(response);
            },
            error: function() {
                alert("Error");
            }
        });
    });
    $("#search-field").keyup(function() {
        var searchItem = $(this).val();
        $.ajax({
            type: 'post',
            url: '/admin/ajax-search-food',
            data: {
                searchItem: searchItem,

            },
            success: function(response) {
                // console.log(response)
                $("#ajaxItem").html(response);
            },
            error: function() {
                alert("Error");
            }
        });

    })
    $('.qtyMinus').click(function() {
        if ($(this).hasClass('qtyMinus')) {
            var cart_id = $(this).attr('attr');
            var qty = "qtyMinus"
            console.log(cart_id)
                // alert(qty)
            $.ajax({
                type: 'post',
                url: '/admin/update-cart-item-quantity',
                data: {
                    cart_id: cart_id,
                    qty: qty,
                },
                success: function(response) {
                    // alert(response)
                    $('#add_item_table').html(response.view);
                },
                error: function() {
                    alert("Error");
                }
            });
        }
    })
    $('.qtyPlus').click(function() {
        if ($(this).hasClass('qtyPlus')) {
            var cart_id = $(this).attr('attr');
            var qty = "qtyPlus"
            console.log(cart_id)
            $.ajax({
                type: 'post',
                url: '/admin/update-cart-item-quantity',
                data: {
                    cart_id: cart_id,
                    qty: qty,
                },
                success: function(response) {
                    // alert(response)
                    $('#add_item_table').html(response.view);
                },
                error: function() {
                    alert("Error");
                }
            });
        }
    })

    $(".delet_cart_item").click(function() {
        var cart_id = $(this).attr('cart_id');
        $.ajax({
            type: 'post',
            url: '/admin/delete-cart-item',
            data: {
                cart_id: cart_id,
            },
            success: function(response) {
                // alert(response)
                $('#add_item_table').html(response.view);
            },
            error: function() {
                alert("Error");
            }
        });
        // console.log(cart_id)
    })
    $(".order_item").click(function() {
        var order_id = $(this).attr('order_id')
        $("#order_id").val(order_id);
        $("#orders_id").val(order_id);

        $.ajax({
            type: 'get',
            url: '/admin/ajax-get-modify-order',
            data: {
                order_id: order_id,
            },
            success: function(response) {
                console.log(response)
                    // alert(response)
                    // $('#ajaxModifyOrder').html(response);
            },
            error: function() {
                alert("Error");
            }
        });

    })
    $(".test_order_details").click(function() {
        var order_id = $("#order_id").val()
        $.ajax({
            type: 'get',
            url: '/admin/ajax-order-details',
            data: {
                order_id: order_id,
            },
            success: function(response) {
                console.log(response)
                    // alert(response)
                $('#ajaxOrderDetail').html(response);
            },
            error: function() {
                alert("Error");
            }
        });
    })
    $(".kot_order_details").click(function() {
        var order_id = $("#order_id").val()
            // alert(order_id)
        $.ajax({
            type: 'get',
            url: '/admin/ajax-kit-order-details',
            data: {
                order_id: order_id,
            },
            success: function(response) {
                console.log(response)
                    // alert(response)
                $('#ajaxKotOrderDetail').html(response);
            },
            error: function() {
                alert("Error");
            }
        });
    })
    $(".bot_order_details").click(function() {
        var order_id = $("#order_id").val()
            // alert(order_id)
        $.ajax({
            type: 'get',
            url: '/admin/ajax-bot-order-details',
            data: {
                order_id: order_id,
            },
            success: function(response) {
                console.log(response)
                    // alert(response)
                $('#ajaxBotOrderDetail').html(response);
            },
            error: function() {
                alert("Error");
            }
        });
    })
    $(".order_innovice").click(function() {
        var order_id = $("#order_id").val()
        $.ajax({
            type: 'get',
            url: '/admin/oder-innovice',
            data: {
                order_id: order_id,
            },
            success: function(response) {
                console.log(response)
                    // alert(response)
                $('#checkout').html(response);
            },
            error: function() {
                alert("Error");
            }
        });
    })
    $(".order_bill").click(function() {
        var order_id = $("#order_id").val()
        console.log(order_id)
        $.ajax({
            type: 'get',
            url: '/admin/oder-bill',
            data: {
                order_id: order_id,
            },
            success: function(response) {
                console.log(response)
                $('#oder-bill').html(response);
            },
            error: function() {
                alert("Error");
            }
        });
    })
    $(".kitchen_status").click(function() {
        var order_id = $("#order_id").val()
        $.ajax({
            type: 'get',
            url: '/admin/kitchen-status',
            data: {
                order_id: order_id,
            },
            success: function(response) {
                console.log(response)
                    // alert(response)
                $('#ajaxKitchenStatus').html(response);
            },
            error: function() {
                alert("Error");
            }
        });
    })
    $(".update-oder").click(function() {
        alert('tets')
    })
    $(".will_login").click(function() {
        var value = $(this).val();
        if (value == 'Yes') {
            $(".add_user").css("display", 'block');

        } else {
            $(".add_user").css("display", 'none');

        }

        // alert(value)
    })
    $(".checkAll").click(function() {
        // alert('tst')

        if (!$('input:checkbox').is('checked')) {
            $('input:checkbox').attr('checked', 'checked');
        } else {
            $('input:checkbox').removeAttr('checked');
        }
    });


});

$(document).ready(function() {
    $("#purchase_id").change(function() {
        var purchase_id = $("#purchase_id").val();
        // alert(purchase_id)
        $.ajax({
            type: 'post',
            url: '/admin/ajax-purchase-table',
            data: {
                purchase_id: purchase_id
            },
            success: function(response) {
                console.log(response)
                $("#ajaxPurchase").html(response);
               
            },
            error: function() {
                alert("Error");
            }
        });
    });

});

//Delete Cart Table through ajax
$(document).ready(function() {
    $(".delete_cart_table").click(function() {
        var ingredient_id=$(this).attr("ingredient_id");
   // alert(ingredient_id)
        $.ajax({
            type: 'post',
            url: '/admin/delete-purchase-table',
            data: {
                ingredient_id: ingredient_id
            },
            success: function(response) {
                console.log(response)
                $("#ajaxPurchase").html(response);
               
            },
            error: function() {
                alert("Error");
            }
        });
    });

});



//ajx check current amount in ajx purchase table  
$(document).ready(function(){
    //check current amount
    $(".ingredientCart_id").change(function(){
        var ingredientCart_id = $(this).attr('ingredientCart_id');
        var quantity = $(this).val();
    // alert(ingredientCart_id);
    //console.log(chkCurrentAmount);

        $.ajax({
            type: 'post',
            url: '/admin/check-current-amount',
            data: {
                ingredientCart_id: ingredientCart_id,
                quantity:quantity
            },
            success: function(response) {
                console.log(response)
                $("#ajaxPurchase").html(response);
            
            },
            error: function() {
                alert("Error");
            }
        });
    });
    $(".ingredientCart_id").keyup(function(){
        var ingredientCart_id = $(this).attr('ingredientCart_id');
        var quantity = $(this).val();
    // alert(ingredientCart_id);
    //console.log(chkCurrentAmount);

        $.ajax({
            type: 'post',
            url: '/admin/check-current-amount',
            data: {
                ingredientCart_id: ingredientCart_id,
                quantity:quantity
            },
            success: function(response) {
                console.log(response)
                $("#ajaxPurchase").html(response);
            
            },
            error: function() {
                alert("Error");
            }
        });
    });

  //ajax for paid amount
    $(".paid").keyup(function(){
        var paid = $(".paid").val();
        var total = $(".total").val();
     //alert(total);
       //console.log(paid,total);
       var paidamount = total-paid;
       console.log(paidamount)
        $("#deu_amount").val(paidamount)
      // console.log(paidamount);
    });
});


//ajax food table

$(document).ready(function() {
    $("#foodTable_id").change(function() {
        var foodTable_id = $("#foodTable_id").val();
        //_var consumption= $(this).attr("consumption");
       // alert(foodTable_id)
        $.ajax({
            type: 'post',
            url: '/admin/ajax-foodMenu-table',
            data: {
                foodTable_id: foodTable_id,
                //consumption : consumption,
            },
            success: function(response) {
                console.log(response)
                $("#ajaxFoodTable").html(response);
               
            },
            error: function() {
                alert("Error");
            }
        });
    });

});

//ajax delete food
$(document).ready(function() {
    $(".delete_foodMenu_table").click(function() {
        var ingredient_id=$(this).attr("ingredient_id");
   // alert(ingredient_id)
        $.ajax({
            type: 'post',
            url: '/admin/delete-foodMenu-table',
            data: {
                ingredient_id: ingredient_id
            },
            success: function(response) {
                console.log(response)
                $("#ajaxFoodTable").html(response);
               
            },
            error: function() {
                alert("Error");
            }
        });
    });

});