
var ready = $(document).ready(function () {
    $('.hidden_items').hide();
    var count = parseInt($('#cart_count').html());
    var cartItems = [];
    var cart_total = 0;
    // var productJson = 'products.json';

    $(document).on('click', '.clickHere', addToCart);
    $(document).on('click', '.myPlus', increaseQuantity);
    $(document).on('click', '.myMinus', decreaseQuantity);


    function addToCart() {
        count += 1;
        $('#cart_count').html(count);


        var td = $(this).parent('div');
        $(this).hide();

        var hidden_items = td.find('.hidden_items');
        hidden_items.show();

        var input = hidden_items.find('input');
        var quantity = parseInt(input.val()) + 1;
        input.val(quantity);

        var name = td.find('.product_name').text().trim();
        var image = td.find('img').attr('src');
        var priceText = td.text();
        var priceMatch = priceText.match(/price[:\s]*([0-9]+)/i);
        var price = priceMatch ? parseInt(priceMatch[1]) : 0;
        let total_price = price * quantity;
        let item = cartItems.find(p => p.name === name);
        let id_text = td.find('.product_name').attr('id');
        let id = id_text.match(/product_[:\s]*([0-9]+)/i)[1];


        if (item) {
            item.quantity = quantity;
            item.total_price = total_price;
            item.id = id;
        } else {
            cartItems.push({id, name, image, price, quantity, total_price});
        }

        updateCartModal();
        // console.log(cart_total);

    }


    function increaseQuantity() {
        count += 1;
        $('#cart_count').html(count);

        let td = $(this).closest('div').parent('div');
        var input = td.find('input');
        let quantity = parseInt(input.val()) + 1;
        let id_text = td.find('.product_name').attr('id');
        let id = id_text.match(/product_[:\s]*([0-9]+)/i)[1];
        let ajaxRequest = new XMLHttpRequest();


        ajaxRequest.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                product_quantity = ajaxRequest.response;
            }
        }

        ajaxRequest.open("GET", "/check?id=" + id, true);
        ajaxRequest.send();

        product_quantity = td.find('.product_quantity').html();
        if (quantity <= product_quantity) {
            input.val(quantity);
            let name = td.find('.product_name').text().trim();
            let item = cartItems.find(p => p.name === name);
            if (item) {
                price = item.price;
                total_price = price * quantity;
                item.total_price = total_price;
                item.quantity = quantity;
                item.id = id;
                updateCartModal();
            }
        } else {
            alert('you cannot more product');
        }
    }


    function decreaseQuantity() {
        let td = $(this).closest('div').parent('div');
        let input = td.find('input');
        let quantity = parseInt(input.val());

        if (count > 0 && quantity > 0) {
            count -= 1;
            $('#cart_count').html(count);
            quantity -= 1;
            input.val(quantity);

            let name = td.find('.product_name').text().trim();
            let item = cartItems.find(p => p.name === name);
            let id_text = td.find('.product_name').attr('id');

            let id = id_text.match(/product_[:\s]*([0-9]+)/i)[1];

            if (item) {
                price = item.price;
                total_price = price * quantity;
                item.total_price = total_price;
                item.quantity = quantity;
                item.id = id;


                updateCartModal();
            }
        } else {
            alert("Can't remove more items");
        }
    }

    // $(document).on('click', function () {
    //     const index = $(this).closest('[data-index]').data('index');
    //     newArray.splice(index, 1);
    //     updateCartModal();
    // });


    function updateCartModal() {
        $('#added_items').html('');
        cart_total = 0;
        $('#save_order_form').find('.product_div_form').remove();

        cartItems.forEach(function (item, key) {

            if (item.quantity > 0) {
                $('#added_items').append(`

                        <div class="border mb-2 p-2 d-flex align-items-center sosana">
                            <img src="${item.image}" width="100" height="100" class="me-3">
                        <div style="font-size: 14px;">
                            <p><strong>Product:</strong> ${item.name}</p>
                            <p><strong>Price:</strong> ${item.price}</p>
                            <p><strong>Quantity:</strong> ${item.quantity}</p>
                            <p><strong>Total Price:</strong> ${item.total_price}</p>
                        </div>
                    `);

                // Append hidden inputs to form
                $("#save_order_form").append(`
                    <div class="product_div_form">
                        <input type="hidden" name="products[${key}][name]" value="${item.name}">
                        <input type="hidden" name="products[${key}][quantity]" value="${item.quantity}">
                        <input type="hidden" name="products[${key}][total_price]" value="${item.total_price}">
                        <input type="hidden" name="products[${key}][product_id]" value="${item.id}">
                        <input type="hidden" name="products[${key}][price]" value="${item.price}">

                    </div>
                `);

            }
            cart_total += item.total_price;

        });

        $('#added_items').append(`
               <div style="font-size: 14px;">
                            <p class="sum-cart-total"><strong>Cart Total:</strong> ${cart_total}</p>
                        </div>
                `);


        var cartTotalText = $('.sum-cart-total').text();
        var sumCartTotal = cartTotalText.replace(/\D/g, '');  // "4010"
        $('.sum-input-cart-total').val(sumCartTotal);
        console.log(sumCartTotal);
    }


    $("#save_order_form").append(`
                <input type="hidden" name="cart_total" class="sum-input-cart-total" value="${cart_total}">
    `);

    $('#shopping_cart').click(function () {
        $('.modal').show();
    });

    $('.close').click(function () {
        $('.modal').hide();
    });

    $('.saveOrder').click(function () {
        let arrayData = [];

        $('.sosana').each(function () {
            let product = $(this).closest('.sosana');
            let productData = {
                name: product.find('.product_name').val(),
                total_price: product.find('.product_total_price').val(),
                quantity: product.find('.product_quantity').val()
            };
            arrayData.push(productData);
        });

        var myCarousel = document.querySelector('#carouselExampleCaptions');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 2000,
            wrap: false
        });

        myCarousel.addEventListener('slide.bs.carousel', function () {
        });


        // $.ajax({
        //     type: 'POST',
        //     url: 'saveOrders.php',
        //     data: JSON.stringify({ request_products: arrayData }),
        //     success: function (response) {
        //         // Optional: display success message in a div
        //         alert('Order saved successfully!');
        //         console.log(response);
        //     },
        //     error: function (xhr, status, error) {
        //         console.error('Error:', error);
        //     }
        // });
    });




    // $.getJSON(productJson, function(data) {
    //     const products = data.products;
    //     const table = $('table');
    //     no_of_products = products.length;
    //     no_of_rows = no_of_products/4;
    //
    //
    //     $start_number=0;
    //     $end_number = 4;
    //     console.log(no_of_rows);
    //     for(i=0 ; i<no_of_rows ; i++) {
    //         sliced_products = products.slice($start_number, $end_number);
    //         $start_number = $end_number;
    //         $end_number += 4
    //         table.append(`<tr id ="tr_${i}"></tr>`);
    //
    //         sliced_products.forEach(function (product) {
    //
    //             table.find('#tr_'+i).append(`
    //
    //       <td>
    //             <img src="${product.image}" class="img-fluid"> <br>
    //             <p id="product_${product.id}" class="product"> ${product.name} </p>
    //             price: ${product.price} <br>
    //             <button class=" btn btn-dark mb-3 w-auto clickHere" type="button" >Add To Cart</button>
    //             <br>
    //
    //             <div class="hidden_items quantity-input " style="display: none;">
    //                 <button class=" mb-auto w-auto fa fa-minus myMinus quantity-input"></button>
    //                 <input type="text" value="0" class="mb-auto text-center quantity-input">
    //                 <button class=" mb-auto w-auto fa fa-plus myPlus quantity-input"></button>
    //             </div>
    //       </td>
    //
    // `);
    //
    //
    //         });
    //     }
    });



