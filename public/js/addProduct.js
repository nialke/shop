addProduct = function() {};

addProduct.prototype.showErrors = function(errorList) {
    $(".status-info").addClass("alert-danger");

    var errorsHtml = "<ul>";
    for (var i=0; i<errorList.length; i++) {
        console.log("event onsubmit: ");
        errorsHtml += "<li>" + errorList[i] + "</li>";
    }
    errorsHtml += "</ul>";

    $(".status-info").html(errorsHtml);
    $(".status-info").show();
};

addProduct.prototype.showSuccess= function() {
    $(".status-info").removeClass("alert-danger")
        .addClass("alert-success")
        .html("Dodano produkt do bazy")
        .show();

};

$(document).ready(function() {
    $("#send_addproduct").click(function(event) {
        event.preventDefault();

        var brand = $("#addproduct_brand").val();
        var model = $("#addproduct_model").val();
        var color = $("#addproduct_color").val();
        var description = $("#addproduct_description").val();
        var price = $("#addproduct_price").val();
        var amount = $("#addproduct_amount").val();
        var picture = $("#addproduct_picture").val();

        var addProductActions = new addProduct();
        $.ajax(
            "/shop/admin/AddProductRequest.php",
            {
                method: "GET",
                data: {
                    brand: brand,
                    model: model,
                    color: color,
                    description: description,
                    price: price,
                    amount: amount,
                    picture: picture
                }
            }
        ).done(function(serverResponse) {
            if (serverResponse.status == "error") {
                addProductActions.showErrors(serverResponse.message);
            }
            else if (serverResponse.status == "success") {
                addProductActions.showSuccess();
            }
        })

    })
});