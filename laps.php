<!DOCTYPE html>
<html>

<head>
    <?php
    include 'includes/link.php';
    ?>
    <link rel="stylesheet" href="css/estilo_laps.css">
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
    <title>GN | LAPS</title>
    <style>
        body {
            background-color: #1b1f27;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        form {
            background-color: #000;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: 30px auto;
            max-width: 600px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #fff;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 20px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .message {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: 30px auto;
            max-width: 600px;
        }

        #message-container {
            color: #fff;
            font-size: 150px;
            padding: 20px;
            margin: 30px 10%;
            /* max-width: 600px; */
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $usuario = $_SESSION['usuario'];
    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
    }
    include 'conexao.php';
    $sql = "SELECT `nivel_usuario` FROM `usuarios` WHERE `mail_usuario` = '$usuario' and `status` = 'Ativo'";
    $buscar = mysqli_query($conexao, $sql);
    $array = mysqli_fetch_array($buscar);
    $nivel = $array['nivel_usuario'];
    if ($nivel == 3) {
        header('Location: acesso-negado.php');
        exit();
    }
    ?>
    <?php
    include 'date.php';
    include 'includes/menu_lateral.php';
    ?>
    <section class="home-section">
        <?php
        include 'includes/header.php';
        ?>
        <div class="text"></div>
        <br>
        <h1>Digite a Senha do LAPS</h1>
        <form id="message-form">
            <label for="message-input">Senha LAPS:</label>
            <input type="text" id="message-input" name="message" maxlength="12">
            <span id="char-limit-msg" style="color: red;"></span>
            <input type="submit" value="Enviar">
        </form>
        <div id="message-container">
            <!-- A última mensagem será exibida aqui automaticamente -->
        </div>
        <script>
            const messageInput = document.getElementById('message-input');
            const charLimitMsg = document.getElementById('char-limit-msg');
            messageInput.addEventListener('input', function() {
                const inputLength = this.value.length;
                if (inputLength > 12) {
                    charLimitMsg.textContent = 'A senha deve ter no máximo 12 caracteres.';
                } else {
                    charLimitMsg.textContent = '';
                }
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Carrega a última mensagem do banco de dados quando a página é carregada
                $("#message-container").load("get_last_message.php");
                // Envia a mensagem quando o formulário for enviado
                $("#message-form").submit(function(event) {
                    event.preventDefault();
                    var message = $("#message-input").val();
                    if (message != "") {
                        $.ajax({
                            type: "POST",
                            url: "save_message.php",
                            data: {
                                message: message
                            },
                            success: function(data) {
                                // Exibe a mensagem enviada pelo usuário
                                $("#message-input").val("");
                                $("#message-container").html(data);
                            }
                        });
                    }
                });
                // Atualiza a última mensagem a cada 5 segundos
                setInterval(function() {
                    $("#message-container").load("get_last_message.php");
                }, 5000);
            });
        </script>
    </section>
    <!-- Scripts -->
    <script src="script.js"></script>
</body>

</html>