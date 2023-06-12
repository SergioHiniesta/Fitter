<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitter</title>
</head>

<body>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-y: hidden;
        }

        .video {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100vh;
            z-index: 1;
        }

        .container {
            height: 100vh;
            position: relative;
        }

        .banner {
            z-index: 2;
            height: 100vh;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contenido {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            animation-name: entrada;
            animation-duration: 2s;
        }
        @keyframes entrada{
            from{
                margin-top:40%;
                opacity: 0;
            }
            to{
                margin-top:0% ;
                opacity: 1;
            }
        }


        .banner h1 {
            color: white;
            font-size: 65px;
            text-align: center;
            font-family: fantasy;
            letter-spacing: 3px;
            font-weight: 300;
            margin-top: 450px;
            text-shadow: 3px 3px 8px #404040;
        }

        .boton {
            -webkit-appearance: button;
            -moz-appearance: button;
            appearance: button;
            background-color: #21889e;
            width: 150px;
            font-family: Helvetica;
            color:white;
            font-weight: 500;
            letter-spacing: 1px;
            padding: 16px 8px;
            text-align: center;
            border-radius: .5em;
            text-decoration: none;
            box-shadow: 2px 2px 8px #404040;
            font-weight: 500;
            margin-top: 50px;
        }
        .boton:hover{
            color: #21889e;
            background-color: white;
            font-weight: 700;
            transform: scale(1.1);
        }
        
        .botones{
            display: flex;
            gap: 25px;
        }

        .logo {
            top: 0;
            left: 0;
            position: absolute;
            width: 120px;
            margin: 20px;
            animation-name: entradaLogo;
            animation-duration: 2s;
        }
        @keyframes entradaLogo{
            from{
                left:-200px;
                opacity: 0;
            }
            to{
                left: 0;
                opacity: 1;
            }
        }

    </style>
    <div class="container">
        <video class="video" src="Fitter/FitterVideo.mp4" autoplay muted loop></video>

    </div>
    <div class="banner">
        <img class="logo" src="Fitter/images/Fitter-logo.png" alt="">
        <div class="contenido">
            <h1>EMPIEZA TU CAMBIO</h1>
            <div class="botones">
                <a href="Fitter/controller/registroController.php" class="boton"> REGISTRARSE</a>
                <a href="Fitter/controller/mainController.php" class="boton"> LOGIN</a>
            </div>
        </div>

    </div>

</body>

</html>