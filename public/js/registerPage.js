var userRegister = function() {};

userRegister.prototype.showErrors = function(errorList) {
    $(".status-info").addClass("alert-danger")
        .removeClass("alert-success");

    var errorsHtml = "<ul>";

    for (i=0; i<errorList.length; i++) {
        errorsHtml += "<li>" + errorList[i] + "</li>";
    }

    errorsHtml += "</ul>";

    $(".status-info").html(errorsHtml);
    $(".status-info").show();
};

userRegister.prototype.showSuccess = function() {
    $(".status-info").addClass("alert-success")
        .removeClass("alert-danger")
        .html("Poprawnie zarejestrowano")
        .show();

    location.href="/shop/";
};

$(document).ready(function() {
    $("#send_register").click(function(event) {
        event.preventDefault();

        var nick = $("#register_nick").val();
        var password = $("#register_password").val();

        var registerActions = new userRegister();

        $.ajax(
            "/shop/registerRequest.php",
            {
                method: "POST",
                data: {
                    nick: nick,
                    password: password
                }
            }
        ).done(function (serverResponse) {
            if (serverResponse.status == "error") {
                registerActions.showErrors(serverResponse.errors);
            } else if (serverResponse.status == "success") {
                registerActions.showSuccess();
            }
        });
    });
});