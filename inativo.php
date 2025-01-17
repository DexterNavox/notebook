<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="x-ua-compatible" content="IE=11">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Não Autorizado</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="images/cropped-favicon.png" type="image/x-icon">
    <link href="fonts/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="bootstrap-icons.css">

    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">

</head>

<style>
    body {
        background-color: #003760;
    }

    svg {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -250px;
        margin-left: -400px;
    }

    .message-box {
        height: 200px;
        width: 380px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -100px;
        margin-left: 50px;
        color: #FFF;
        font-family: Roboto;
        font-weight: 300;
    }

    .message-box h1 {
        font-size: 60px;
        line-height: 46px;
        margin-bottom: 40px;
    }

    .buttons-con .action-link-wrap {
        margin-top: 40px;
    }

    .buttons-con .action-link-wrap a {
        background: #ec8209;
        padding: 8px 25px;
        border-radius: 4px;
        color: #FFF;
        font-weight: bold;
        font-size: 14px;
        transition: all 0.3s linear;
        cursor: pointer;
        text-decoration: none;
        margin-right: 10px
    }

    .buttons-con .action-link-wrap a:hover {
        background: #5A5C6C;
        color: #fff;
    }

    #Polygon-1,
    #Polygon-2,
    #Polygon-3,
    #Polygon-4,
    #Polygon-4,
    #Polygon-5 {
        animation: float 1s infinite ease-in-out alternate;
    }

    #Polygon-2 {
        animation-delay: .2s;
    }

    #Polygon-3 {
        animation-delay: .4s;
    }

    #Polygon-4 {
        animation-delay: .6s;
    }

    #Polygon-5 {
        animation-delay: .8s;
    }

    @keyframes float {
        100% {
            transform: translateY(20px);
        }
    }

    @media (max-width: 450px) {
        svg {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -250px;
            margin-left: -190px;
        }

        .message-box {
            top: 50%;
            left: 50%;
            margin-top: -100px;
            margin-left: -190px;
            text-align: center;
        }
    }
</style>


<svg width="380px" height="500px" viewBox="0 0 837 1045" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">

    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <path d="M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z" id="Polygon-1" stroke="#FF7900" stroke-width="30" sketch:type="MSShapeGroup"></path>
        <path d="M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z" id="Polygon-2" stroke="#FF7900" stroke-width="25" sketch:type="MSShapeGroup"></path>
        <path d="M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z" id="Polygon-3" stroke="#FF7900" stroke-width="20" sketch:type="MSShapeGroup"></path>
        <path d="M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z" id="Polygon-4" stroke="#FF7900" stroke-width="20" sketch:type="MSShapeGroup"></path>
        <path d="M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z" id="Polygon-5" stroke="#FF7900" stroke-width="15" sketch:type="MSShapeGroup"></path>
    </g>
</svg>

<div class="message-box">
    <a href="">
        <img src="images/logo-light.png" height="45">
    </a>

    <p></p>

    <p>Desculpe, você não está autorizado a acessar a página que solicitou.</p>
    <p>Se você acha que isso é um engano, entre em contato com o administrador do sistema.</p>
    <div>
        <div class="action-link-wrap">
            <a href="javascript:history.back()" class="btn btn-secondary">Voltar para onde estava</a>
            <a href="home.php" class="btn btn-secondary">Ir para Home</a>
        </div>
    </div>
</div>


</body>

</html>