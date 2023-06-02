<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <title>Editar perfil: <?php print($datosPerfil["nombrePerfil"]) ?></title>
    <link rel="stylesheet" href="" />
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/global.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-primary">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start position-fixed" id="menu">
                        <li class="nav-item">
                            <a href="/" class="">
                                <img src="../images/Fitter-logo.png" alt="" class="logo">
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="../controller/mainController.php" class="nav-link active  align-middle px-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                                </svg> <span class="ms-1 d-none d-sm-inline">Inicio</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="../controller/perfilController.php?usuario=<?php print($_SESSION["nombre"]) ?>" class="nav-link active  align-middle px-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                </svg><span class="ms-1 d-none d-sm-inline">Perfil</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="../controller/explorarController.php" class="nav-link active  align-middle px-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg><span class="ms-1 d-none d-sm-inline">Explorar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../controller/cerrarSesion.php" class="nav-link active  align-middle px-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg> <h6 class="ms-1 d-none d-sm-inline">Cerrar sesión</h6>
                            </a>
                        </li>
                    </ul>
                    <hr>

                </div>
            </div>
            <!-- CONTENIDO -->

            <div class="col">
                <div class="row">
                    
                    <div class="col-8-lg px-5 d-flex flex-column">
                        
                        <h1 class="text-secondary mb-4 mt-3" for="">Editar perfil</h1>

                        <form action="../controller/editarPerfilController.php" method="POST" enctype="multipart/form-data" autocomplete="off">

                        <img src="<?php print($datosPerfil["avatar"])?>" class="rounded-circle border mb-3" style="width: 100%; height: auto; max-width: 200px" alt="" />
                        <br>
                        <label class="h4 text-secondary" for="">Avatar</label>
                        <input style="max-width: 400px;" type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
                        <label class="h4 mt-4 text-secondary" for="">Descripción</label>
                        <textarea class="form-control" name="descripcion" style="max-width: 600px;" id="" rows="3"><?php print($datosPerfil["descripcion"])?></textarea>

                        <button type="submit" class="btn btn-secondary mb-3 mt-3">Actualizar perfil</button>

                        </form>

                        <?php var_dump($mensaje)?>
                    </div>

                    <div class="col-4-lg"></div>
                </div>






            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="../bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>

</body>

</html>