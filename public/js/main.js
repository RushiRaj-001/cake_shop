const baseUrl = 'http://localhost/cake_shop/';

function addToCart(prod_id, prod_price, user_id) {
    $.ajax({
        url: baseUrl + "addToCart",
        type: "POST",
        data: { prod_id: prod_id, prod_price: prod_price, user_id: user_id },
        beforeSend: function () {

        },
        complete: function () {
        },
        success: function (response) {
            // alert(response);
            const Jsondata = JSON.parse(response);
            console.log("response", Jsondata);
            if (Jsondata.status == "success") {
                $("#cartcount").text(Jsondata.count);
                $("#addCount_" + prod_id).val(Jsondata.Qyt);
            } else {

            }

        },

    });
}

function minus(prod_id, user_id) {
    $.ajax({
        url: baseUrl + "decrement",
        type: "POST",
        data: { prod_id: prod_id, user_id: user_id },
        beforeSend: function () { },
        complete: function () { },
        success: function (response) {
            // alert(response)
            const Jsondata = JSON.parse(response);
            if (Jsondata.status == "success") {
                $("#addCount_" + prod_id).val(Jsondata.Qyt);
            } else {

            }
        }

    })

}
function removeItem(cartID, prod_id) {
    $.ajax({
        url: baseUrl + "removeItem",
        type: "POST",
        data: { cartID: cartID, prod_id: prod_id },
        beforeSend: function () { },
        complete: function () { },
        success: function (response) {
            // alert(response)
            const Jsondata = JSON.parse(response);
            if (Jsondata.status == "success") {
                $("#productRow_" + prod_id).remove();
            } else {

            }
        }

    })
}


$(".ticon").click(()=>{
  $(".menu").css({"left":"0","transition": "0.8s ease-out"});
  $(".section").css({"transition": "0.8s ease-out","margin":"5% 25%"});
})
$(".close-icon").click(()=>{
    $(".menu").css({"left":"-25%","transition": "0.8s ease-out"});
    $(".section").css({"transition": "0.8s ease-out","margin":"5% 10%"});
})





