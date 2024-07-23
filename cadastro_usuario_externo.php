<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro|GN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo_cadastro_usuario _externo.css">
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
</head>

<body>

    <div class="container" style="width:500px; margin-top:40px;">
        <center>
            <img src="assets/user.png" alt="logo" width="100px" style="margin-bottom:10px;">
            <h4>Cadastro de usuário</h4>
        </center>

        <form id="cadastro-form" action="_insert_usuario_externo.php" method="post">
            <div class="form-group">
                <label>Nome do usuário</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome completo" autocomplete="off" required>
                <span id="erro-nome" class="text-danger"></span> <!-- Elemento para exibir a mensagem de erro -->
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="mail" class="form-control" placeholder="Seu e-mail" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input id="txtSenha" type="password" name="senha" class="form-control" placeholder="Sua senha" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Confirmar senha</label>
                <input type="password" name="senha2" class="form-control" placeholder="Confirme sua senha" autocomplete="off" required oninput="validaSenha(this)">
                <small>Precisa ser igual a senha digitada acima.</small>
            </div>
            <div style="text-align:right;">
                <a href="index.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
                <button class=" btn btn-sm btn-success" type="submit" id="botao">Cadastrar</button>
            </div>
        </form>

    </div>

    <script src="https://kit.fontawesome.com/cae6919cdb.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nomeInput = document.querySelector('input[name="nome"]');
            const erroNome = document.getElementById('erro-nome');
            const form = document.getElementById('cadastro-form');

            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Evita o envio do formulário

                const nome = nomeInput.value.trim();

                // Expressão regular para verificar se o campo contém apenas letras, espaços e um mínimo de dois caracteres
                const regexNome = /^[a-zA-Z\s]{2,}$/;

                if (!regexNome.test(nome)) {
                    erroNome.textContent = 'Por favor, digite um nome válido.';
                    nomeInput.classList.add('erro');
                } else {
                    // Nome válido, você pode prosseguir com a ação desejada, como o envio do formulário
                    form.submit();
                }
            });
        });
    </script>

    <script>
        function validaSenha(input) {
            const senha = input.value;
            const regexSenha = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,20}$/;

            if (!regexSenha.test(senha)) {
                input.setCustomValidity(
                    'A senha deve conter de 8 a 20 caracteres, pelo menos um número, um caractere especial ($,#,@,!,etc), uma letra minúscula e uma letra maiúscula.'
                );
            } else {
                input.setCustomValidity('');
            }
        }
    </script>
</body>

</html>