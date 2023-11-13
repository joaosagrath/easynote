$(document).ready(function() {
    $("#login").focus(function() {
        $("#avancar").show();
		$("#entrar").hide();
        $("#errorMessage").hide(); // Oculta a mensagem de erro ao focar no campo de login
    });

    $("#password").focus(function() {
        $("#errorMessage").hide(); // Oculta a mensagem de erro ao focar no campo de login
        $("#entrar").show();
    });

    $("#password").keyup(function(event) {
        if (event.keyCode === 13) {
            $("#entrar").click();
        }
    });

    $("#avancar").click(function() {
        var loginValue = $("#login").val();
        $.ajax({
            type: 'POST',
            url: 'check_login.php',
            data: {
                'login': loginValue
            },
            success: function(response) {
                if (response === 'success') {
                    $("#login").hide();
                    $("#avancar").hide();
                    $("#password").show();
                    $("#entrar").show();
                } else {
                    // Substitua o alert por isso
                    $("#avancar").hide();
                    $("#errorMessage").text('Operador não encontrado. Verifique seu login.').show();
                }
            }
        });
    });

    $("#entrar").click(function() {
        var loginValue = $("#login").val();
        var senhaValue = $("#password").val();

        $.ajax({
            type: 'POST',
            url: 'check_password.php',
            data: {
                'login': loginValue,
                'senha': senhaValue
            },
            success: function(response) {
                if (response === 'success') {
                    // Senha correta, redirecionar para dashboard/dashboard.php
                    window.location.href = 'dashboard/dashboard.php';
                } else {
                    $("#entrar").hide();
                    // Senha incorreta, exibir mensagem de erro
                    $("#errorMessage").text('Senha incorreta. Tente novamente.').show();
                }
            }
        });
    });
});

window.onload = function() {
	var login = document.getElementById("login");
	login.focus()
}