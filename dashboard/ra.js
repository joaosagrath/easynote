function maskCPF(input) {
            let value = input.value;
            value = value.replace(/\D/g, "");
            value = value.replace(/(\d{3})(\d)/, "$1.$2");
            value = value.replace(/(\d{3})(\d)/, "$1.$2");
            value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
            input.value = value;
        }

$(document).ready(function(){
    var loginValue; // Declaração da variável loginValue

    $("#ra").focus(function(){
        $("#avancar").show();
		$("#cpf").hide();
		$("#validar").hide();
        $("#errorMessage").hide();
    });

    $("#password").focus(function(){
        $("#errorMessage").hide();
    });
	
	
	$("#ra").keyup(function(event){
        if(event.keyCode === 13){
            $("#avancar").click();
        }
    });

    $("#password").keyup(function(event){
        if(event.keyCode === 13){
            $("#entrar").click();
        }
    });

    $("#avancar").click(function(){
		loginValue = $("#ra").val(); // Atribuição do valor de loginValue

		// Verifique se o campo RA está vazio
		if (loginValue.trim() === "") {
			$("#errorMessage").text('Por favor, digite seu RA.').show();
			return; // Sai da função se o RA estiver vazio
		}

		$.ajax({
			type: 'POST',
			url: 'CheckLogin.php',
			data: {'ra': loginValue},
			
			success: function(response){
				
				if(response === 'ativado'){
					$("#ra").hide();
					$("#avancar").hide();
					$("#password").show();
					$("#entrar").show();
				}else if (response === 'semSenha') {
					$("#avancar").hide();
					$("#cpf").show();
					$("#validarSenha").show();
				}else if (response === 'ativo'){
					$("#avancar").hide();
					$("#cpf").show();
					$("#validar").show();
				} else if (response === 'suspenso'){
					$("#errorMessage").text('RA não autorizado.').show();
					
				}else{
					
					$("#errorMessage").text('RA não encontrado. Verifique seu login.').show();
				}
			}
		});
	});


    $("#entrar").click(function(){
        var raValue = $("#ra").val();
        var senhaValue = $("#password").val();
        $.ajax({
            type: 'POST',
            url: 'CheckPassword.php',
            data: {'ra': raValue, 'senha' : senhaValue},
            success: function(response){
				if(response.trim() == 'success'){
                    // Senha correta, redirecionar para dashboard/dashboard.php
                    window.location.href = 'mobile.php?ra=' + loginValue;
                } else {					
					$("#errorMessage").text('Senha incorreta. Tente novamente.').show();
				}
            }
        });
    });
	
	$("#validar").click(function(){
		var raValue = $("#ra").val();
        var cpfValue = $("#cpf").val();
        $.ajax({
            type: 'POST',
            url: 'CheckCPF.php',
            data: {'ra': raValue, 'cpf': cpfValue},
            success: function(response){
				
                if(response === 'success'){
                    // CPF correta, redirecionar para dashboard/dashboard.php
                    window.location.href = 'aluno.php?ra=' + loginValue;
                } else {
                    $("#errorMessage").text('CPF incorreto. Tente novamente.').show();
                }
            }
        });
    });
	
	$("#validarSenha").click(function(){
		var raValue = $("#ra").val();
        var cpfValue = $("#cpf").val();
        $.ajax({
            type: 'POST',
            url: 'CheckCPF.php',
            data: {'ra': raValue, 'cpf': cpfValue},
            success: function(response){
				
				//alert(cpfValue);
				
                if(response === 'success'){
                    // CPF correta, redirecionar para dashboard/dashboard.php
                    window.location.href = 'RedefinirSenha.php?ra=' + loginValue;
                } else {
                    $("#errorMessage").text('CPF incorreto. Tente novamente.').show();
                }
            }
        });
    });
	
});
