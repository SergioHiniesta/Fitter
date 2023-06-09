<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">

    <title>Fitter-IA</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/global.css">
</head>

<body>
    <style>
        div.card {
            max-width: 75%;
            width: fit-content;
        }
    </style>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-3 px-0 bg-primary">

                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start position-fixed" id="menu">
                        <li class="">
                            <a href="../controller/mainController.php" class="">
                                <img src="../images/Fitter-logo.png" alt="" class="logo">
                            </a>
                        </li>

                        <li class="nav-item activo">
                            <a href="../controller/mainController.php" class="nav-link active align-middle px-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-house mb-2" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                                </svg>
                                <h6 class="ms-1 d-none d-sm-inline">Inicio</h6>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="../controller/perfilController.php?usuario=<?php session_start(); print($_SESSION["nombre"]) ?>" class="nav-link active  align-middle px-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-person mb-2" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                </svg>
                                <h6 class="ms-1 d-none d-sm-inline">Perfil</h6>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="../controller/explorarController.php" class="nav-link active  align-middle px-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-search mb-2" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                                <h6 class="ms-1 d-none d-sm-inline">Explorar</h6>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="../controller/eventosController.php" class="nav-link active  align-middle px-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-people mb-2" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                                </svg>
                                <h6 class="ms-1 d-none d-sm-inline">Eventos</h6>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="../views/fitterIA.php" class="nav-link active  align-middle px-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-cpu mb-2" viewBox="0 0 16 16">
                                    <path d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
                                </svg>
                                <h6 class="ms-1 d-none d-sm-inline">Fitter-IA</h6>
                            </a>
                        </li>

                        <li class="nav-item cerrarSesion">
                            <a href="../controller/cerrarSesion.php" class="nav-link active align-middle px-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-box-arrow-right mb-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg>
                                <h6 class="ms-1 d-none d-sm-inline">Salir</h6>
                            </a>
                        </li>
                    </ul>
                    <hr>

                </div>
            </div>
            <!-- CONTENIDO -->

            <div class="col">

                <div class="row">
                    <h1 class="text-secondary pt-3" for="">Fitter-IA</h1>
                    <div class="row">
                        <hr class="separadorTitulo">
                    </div>


                    <div class="row d-flex justify-content-center">
                        <div class="col m-3 " style="max-width: 1150px;">
                            <h4 class="text-secondary">Consejos:</h4>
                            <p>Esto es un chat con inteligencia artificial,te podrá servir de ayuda en temas de nutrición,
                                rutinas, contrastar información deportiva, etc. Cada persona es diferente por lo tanto recuerda que lo mejor
                                es acudir a un profesional para que evalue tus necesidades físicas. Disfruta de Fitter-IA y sigue luchando por tus objetivos! </p>

                            <div id="chat" class="row mb-3 d-flex align-items-center flex-column">

                            </div>

                            <form id="ia" style="padding: 0; margin:0;">

                                <input type="search" id="pregunta" class=" form-control rounded w-100" placeholder="Pregúntame lo que quieras" aria-label="Search" aria-describedby="search-addon" />

                                <button type="submit" id="enviar" class="btn btn-secondary mb-3 mt-3">Enviar</button>
                            </form>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="../bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#ia").on("submit", function(e) {
                e.preventDefault();
                $valor = $("#pregunta").val();
                $pregunta = '<div id="gregunta" class="card p-2 w-75 align-self-end m-1"><h5 class="text-secondary">Pregunta:</h5><p>' + $valor + '</p></div>';
                $("#chat").append($pregunta);
                $("#pregunta").val('');
                $loader = '<div class="spinner-border align-self-start text-secondary" id="loader" role="status"></div>';
                $("#chat").append($loader);

                $.ajax({
                    url: '../services/fitterIA.php',
                    type: 'POST',
                    data: 'text=' + $valor,
                    success: function(data) {
                        $respuesta = '<div id="respuesta" class="card p-2 w-75 align-self-start m-1"><h5 class="text-secondary">Fitter-IA:</h5><p>' + data + '</p></div>';
                        $("#chat").append($respuesta);
                        $("html, body").scrollTop($(document).height());
                        $("#loader").remove();
                    }
                });
            });
        });
    </script>
</body>

</html>