delivery = function() {};

delivery.prototype.showErrors = function(errorList) {
    $(".status-info").addClass("alert-danger")
        .removeClass("alert-success");
console.log("tu jest", errorList);
    var errorsHtml = "<ul>";

    for (var i=0; i<errorList.length; i++) {
        errorsHtml += "<li>" + errorList[i] + "</li>";
    }
    errorsHtml += "</ul>";

    $(".status-info").html(errorsHtml)
        .show();
};

delivery.prototype.showSuccess = function() {
    $(".status-info").addClass("alert-success")
        .removeClass("alert-danger")
        .html("Zamówienie zostało złożone")
        .show();
    $(".form").hide();
};

$(document).ready(function(){
    $("#send_delivery").click(function(event) {
        event.preventDefault();

        var nameSurname = $("#delivery_name_surname").val();
        var street = $("#delivery_street").val();
        var house = $("#delivery_house").val();
        var flat = $("#delivery_flat").val();
        var postcode = $("#delivery_postcode").val();
        var city = $("#delivery_city").val();
        var delivery_method = $("#delivery_method").val();
        var product_id = $("#delivery_product_id").val();
        console.log(delivery_method);

        var deliveryActions = new delivery();

        $.ajax("/shop/account/DeliveryRequest.php",
            {
                method: "POST",
                data: {
                    name_surname: nameSurname,
                    street: street,
                    house: house,
                    flat: flat,
                    postcode: postcode,
                    city: city,
                    delivery_method: delivery_method,
                    productId: product_id
                }
            }
        )
        .done(function (serverResponse) {
            console.log(" działa", serverResponse);
            if (serverResponse.status == "error") {
                deliveryActions.showErrors(serverResponse.message);
            } else if (serverResponse.status == "success") {
                deliveryActions.showSuccess();
            }
        })
    });
});
