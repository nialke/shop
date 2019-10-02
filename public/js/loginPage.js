var userLogin = function() {};
userLogin.prototype.showErrors = function(errorList) {

    $(".status-info").addClass("alert-danger");
    $(".status-info").removeClass("alert-success");

    var errorsHtml = "<ul>";

    for (var i = 0; i < errorList.length; i++) {
        errorsHtml += "<li>" + errorList[i] + "</li>";
    }

    errorsHtml += "</ul>";
    $(".status-info").html(errorsHtml);
    $(".status-info").show()
};
userLogin.prototype.showSuccess= function() {
    $(".status-info").removeClass("alert-danger")
        .html("Poprawnie zalogowano")
        .show()
        .addClass("alert-success");

    location.href="/shop/";
};

$(document).ready(function () {
    $("#send_login").click(function (event) {
        event.preventDefault();

        var nick =  $("#login_nick").val();
        var password = $("#login_password").val();

        var loginActions = new userLogin();

        $.ajax(
            "/shop/loginRequest.php",
            {
                method: "POST",
                data: {
                    nick: nick,
                    password: password
                }
            }
        ).done(function (serverResponse) {
            if (serverResponse.status=="error") {
                loginActions.showErrors(serverResponse.errors);
            } else if (serverResponse.status=="success") {
                loginActions.showSuccess();
            }
        });
    });
});

