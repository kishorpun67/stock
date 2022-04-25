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
    $(".categories").on('click', function() {
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

function addFood(item_id, price, name, is_bar, is_caffe, is_kitchen) {
    // console.log(item_id, price, name, is_bar, is_caffe, is_kitchen)
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
            // console.log(response)
            $("#add_item_table").html(response);
        },
        error: function() {
            alert("Error");
        }
    });
}
// delet food cart item 
function deleteCartItem(cart_id) {
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
}

function qtyMinus(cart_id) {
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

function qtyPlus(cart_id) {
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




// delet food cart item 
function deleteCartItem(cart_id) {
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
}

function discountFunction(e) {
    var total = $("#sub_total").val();
    var discount = e.value;
    var grand_total = (total - discount)
    $("#grand_total").val(grand_total)
    $("#total_amount").text(grand_total)
}

function quantityMinus(cart_id) {
    var qty = "qtyMinus"
    var order_id = $("#order_id").val()
    $.ajax({
        type: 'post',
        url: '/admin/update-order-item-quantity',
        data: {
            cart_id: cart_id,
            order_id: order_id,
            qty: qty,

        },
        success: function(response) {
            // alert(response)
            $('#ajaxModifyOrder').html(response);
        },
        error: function() {
            alert("Error");
        }
    });
}

function quantityPlus(cart_id) {
    var qty = "qtyPlus"
    var order_id = $("#order_id").val()
    $.ajax({
        type: 'post',
        url: '/admin/update-order-item-quantity',
        data: {
            cart_id: cart_id,
            order_id: order_id,
            qty: qty,


        },
        success: function(response) {
            // alert(response)
            $('#ajaxModifyOrder').html(response);
        },
        error: function() {
            alert("Error");
        }
    });
}

function deleteOrderDetail(cart_id) {
    var order_id = $("#order_id").val()
    $.ajax({
        type: 'post',
        url: '/admin/delete-order-item-quantity',
        data: {
            cart_id: cart_id,
            order_id: order_id,
        },
        success: function(response) {
            // alert(response)
            $('#ajaxModifyOrder').html(response);
        },
        error: function() {
            alert("Error");
        }
    });
}
``

function addCustomer(table_id) {
    var no_customer = $(`#no_of_customer-${table_id}`).val()
        // console.log(table_id, no_customer)
    $.ajax({
        type: 'post',
        url: '/admin/ajax-add-customer',
        data: {
            table_id: table_id,
            no_customer: no_customer,
        },
        success: function(response) {
            console.log(response)

            $(`#data-${response.table_ids}`).empty();
            $(`#table_id`).val(response.table_ids);


            response.data.forEach(element => {
                $(`#data-${response.table_ids}`).append(
                    `<tr> <td>${element.no_customer}</td>
                    <td><a href="javascript:" onclick="deleteCustomerTable(${element.id}, ${response.table_ids})"  ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>`

                )
            });
            $(`#available_seat-${response.table_ids}`).text(`Avaliable : ${response.available_seat}`)
        },
        error: function() {
            alert("Error");
        }
    });
    // console.log(cart_id, no_customer)
}

// delete customer table 
function deleteCustomerTable(customer_id, table_id) {
    // alert(id)
    $.ajax({
        type: 'post',
        url: '/admin/ajax-delete-customer-table',
        data: {
            customer_id: customer_id,
            table_id: table_id,
        },
        success: function(response) {
            $(`#data-${response.table_ids}`).empty();
            $(`#table_id`).val(response.table_ids);

            response.data.forEach(element => {
                $(`#data-${response.table_ids}`).append(
                    `<tr> <td>${element.no_customer}</td>
                    <td><a href="javascript:" onclick="deleteCustomerTable(${element.id}, ${response.table_ids})"  ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>`
                )
            });
            $(`#available_seat-${response.table_ids}`).text(`Avaliable : ${response.available_seat}`)
        },
        error: function() {
            alert("Error");
        }
    });
}

//kishor i did this
$(document).ready(function() {

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


    $(".order_item").click(function() {
        var order_id = $(this).attr('order_id')
        $("#order_id").val(order_id);
        $("#orders_id").val(order_id);

    })
    $(".modify_order").click(function() {
        var order_id = $("#order_id").val()
        console.log(order_id)
        if (order_id != "") {
            $.ajax({
                type: 'get',
                url: '/admin/ajax-get-modify-order',
                data: {
                    order_id: order_id,
                },
                success: function(response) {
                    // console.log(response)
                    // alert(response)
                    $('#ajaxModifyOrder').html(response);
                },
                error: function() {
                    alert("Error");
                }
            });
        } else {
            alert('Please Select Order');
        }
    })
    $(".test_order_details").click(function() {
        var order_id = $("#order_id").val()
        if (order_id != "") {

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
        } else {
            alert('Please Select Order');
        }
    })
    $(".kot_order_details").click(function() {
        var order_id = $("#order_id").val()
            // alert(order_id)
        if (order_id != "") {

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
        } else {
            alert('Please Select Order');
        }
    })
    $(".bot_order_details").click(function() {
        var order_id = $("#order_id").val()
        if (order_id != "") {

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
        } else {
            alert('Please Select Order');
        }
    })
    $(".order_innovice").click(function() {
        var order_id = $("#order_id").val()
        if (order_id != "") {

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
        } else {
            alert('Please Select Order');
        }
    })
    $(".order_bill").click(function() {
        var order_id = $("#order_id").val()
        console.log(order_id)
        if (order_id != "") {

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
        } else {
            alert('Please Select Order');
        }
    })
    $(".kitchen_status").click(function() {
        var order_id = $("#order_id").val()
        if (order_id != "") {

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
        } else {
            alert('Please Select Order');
        }
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
                if (response.message == "exsist") {
                    alert('Item already exsist!')
                } else {
                    $("#ajaxPurchase").html(response);

                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

});
//Delete purchase cart
function deletePurchaseCart(ingredient_id) {
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
}

function purchaseCalculate(e, ingredientCart_id) {
    var quantity = e.value;
    // alert(ingredientCart_id);
    console.log(ingredientCart_id);

    $.ajax({
        type: 'post',
        url: '/admin/check-current-amount',
        data: {
            ingredientCart_id: ingredientCart_id,
            quantity: quantity
        },
        success: function(response) {
            console.log(response)
            if (response.message == "exsist") {
                alert('Item already exsist!')
            } else {
                $("#ajaxPurchase").html(response);

            }

        },
        error: function() {
            alert("Error");
        }
    });
}

function purchasePaid(e) {
    var paid = e.value;
    var total = $(".total").val();
    //alert(total);
    //console.log(paid,total);
    var paidamount = total - paid;
    console.log(paidamount)
    $("#deu_amount").val(paidamount)
        // console.log(paidamount);
}
//ajx check current amount in ajx purchase table  
$(document).ready(function() {
    //check current amount
    $(".ingredientCart_id").change(function() {
        var ingredientCart_id = $(this).attr('ingredientCart_id');
        var quantity = $(this).val();
        // alert(ingredientCart_id);
        //console.log(chkCurrentAmount);

        $.ajax({
            type: 'post',
            url: '/admin/check-current-amount',
            data: {
                ingredientCart_id: ingredientCart_id,
                quantity: quantity
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
                if (response.message == "exsist") {
                    alert('Item already exsist!')
                } else {
                    $("#ajaxFoodTable").html(response);
                }

            },
            error: function() {
                alert("Error");
            }
        });
    });

});

//ajax delete foodmenutable
function deleteFoodMenTable(ingredient_id) {
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
}