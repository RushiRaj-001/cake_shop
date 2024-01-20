const baseUrl = 'http://localhost/cake_shop/';


function addToCart(prod_id, prod_price, user_id) {
    $.ajax({
        url: baseUrl + "addToCart",
        type: "POST",
        data: { prod_id: prod_id, prod_price: prod_price, user_id: user_id },
        beforeSend: function () {
            // Before sending AJAX request
        },
        complete: function () {
            // After completing AJAX request
        },
        success: function (response) {
            const Jsondata = JSON.parse(response);
            // console.log("response", Jsondata);
            // alert(response);

            $('#payamount').text(Jsondata.totalItemPrice);
            $('#finalPrice').text(Jsondata.totalItemPrice + 40);
            if (Jsondata.status == "success") {
                $("#cartcount").text(Jsondata.count);
                $("#totaladdCount" + prod_id).val(Jsondata.Qyt);
            } else {
                // Handle error case
            }
        },
    });
}

function decrement(prod_id, user_id) {
    $.ajax({
        url: baseUrl + "decrement",
        type: "POST",
        data: { prod_id: prod_id, user_id: user_id },
        beforeSend: function () {
            // Before sending AJAX request
        },
        complete: function () {
            // After completing AJAX request

        },
        success: function (response) {
            const Jsondata = JSON.parse(response);
            // console.log("response", Jsondata);
            // alert(response);
            $('#payamount').text(Jsondata.totalItemPrice);
            $('#finalPrice').text(Jsondata.totalItemPrice + 40);

            if (Jsondata.status == "success") {
                $("#totaladdCount" + prod_id).val(Jsondata.Qyt);
            } else {
                // Handle error case
            }
        },
    });
}


function removeItem(cartID, prod_id) {
    $.ajax({
        url: baseUrl + "removeItem",
        type: "POST",
        data: { cartID: cartID, prod_id: prod_id },
        beforeSend: function () { },
        complete: function () {

        },
        success: function (response) {
            // alert(response)
            const Jsondata = JSON.parse(response);
            // console.log("response", Jsondata);
            $('#payamount').text(Jsondata.totalItemPrice);
            $('#finalPrice').text(Jsondata.totalItemPrice + 40);
            if (Jsondata.status == "success") {
                $("#productRow_" + prod_id).remove();
            } else {

            }
        }

    })
}

function getLocationInfo() {
    const pincode = document.getElementById('pincode').value;

    if (pincode.trim() !== '') {
        const url = `https://api.postalpincode.in/pincode/${pincode}`;

        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);

                    if (data[0].Status === 'Success') {
                        const state = data[0].PostOffice[0].State;
                        const city = data[0].PostOffice[0].District;
                        console.log(state);
                        document.getElementById('state').value = state;
                        document.getElementById('city').value = city;
                    } else {
                        document.getElementById('state').value = 'Invalid PIN code';
                        document.getElementById('city').value = '';
                    }
                } else {
                    console.log('Error fetching data. Status:', xhr.status);
                    document.getElementById('state').value = 'Error fetching data';
                    document.getElementById('city').value = '';
                }
            }
        };

        xhr.open('GET', url, true);
        xhr.send();
    } else {
        alert('Please enter a PIN code');
    }
}

$(".ticon").click(() => {
    $(".menu").css({ "left": "0", "transition": "0.8s ease-out" });
    $(".section").css({ "transition": "0.8s ease-out", "margin": "5% 25%" });
})
$(".close-icon").click(() => {
    $(".menu").css({ "left": "-25%", "transition": "0.8s ease-out" });
    $(".section").css({ "transition": "0.8s ease-out", "margin": "5% 10%" });
})



function addAddress() {
    const username = $('#username').val();
    const phone = $('#phone').val();
    const email = $('#email').val();
    const address = $('#address').val();
    const pincode = $('#pincode').val();
    const city = $('#city').val();
    const state = $('#state').val();
    const total_price = $('#total_price').val();

    $.ajax({
        url: baseUrl + "addAddress",
        type: "POST",
        data: {
            username: username,
            phone: phone,
            email: email,
            address: address,
            pincode: pincode,
            city: city,
            state: state,
            total_price: total_price
        },
        beforeSend: function () { },
        complete: function () {

        },
        success: function (response) {

        }

    })
}


function proceedToPay() {
    const paymentMethod = $("input[name='paymentMethod']:checked").val();

    if(paymentMethod==='COD')
    {
        $.ajax({
            url: baseUrl + "proceedToPay",
            type: "POST",
            data: { paymentMethod: paymentMethod,},
            beforeSend: function () { },
            complete: function () {
    
            },
            success: function (response) {
             
            }
    
        })
    }

}




