<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
  <title>Perfil: <?php print($perfil["nombrePerfil"]) ?></title>
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
                </svg> <span class="ms-1 d-none d-sm-inline">Cerrar sesión</span>
              </a>
            </li>
          </ul>
          <hr>

        </div>
      </div>
      <!-- CONTENIDO -->

      <div class="col">
        <div class="row mt-5 mb-4">
          <div class="col-lg-4 d-flex flex-column align-items-center">
            <img src="<?php print($perfil["avatar"]) ?>" class="rounded-circle border" style="width: 100%; height: auto; max-width: 200px" alt="" />

            <?php 
              if($esUsuario == 1){
                print('<a class="btn btn-secondary mt-3" href="../controller/editarPerfilController.php" role="button">Editar perfil</a>');
              }else if($esSeguidor == 1){
                print('<a class="btn btn-secondary mt-3" href="../controller/dejarSeguirController.php?usuario='.$perfil["nombrePerfil"].'" role="button">Dejar de seguir</a>');
              }else if($esSeguidor == 0){
                print('<a class="btn btn-secondary mt-3" href="../controller/seguirController.php?usuario='.$perfil["nombrePerfil"].'" role="button">Seguir</a>');
              }

              
            ?>
          </div>
          
          <div class="col-lg-8 mt-4 px-3">
            <div class="row">
              <h2><?php print($perfil["nombrePerfil"]) ?></h2>
              <br />
              <p style="max-width: 500px">
                <?php print($perfil["descripcion"]) ?>
              </p>
            </div>
            <!-- <div class="row">
              <span class="text-secondary h5"> 999 Seguidores &nbsp; 999 Seguidos</span>
            </div> -->
          </div>
        </div>

        <hr>

        <!-- POSTS -->


        <ul id="posts" class=" d-flex align-items-center flex-column  py-5" style="padding-left: 0;">

        <?php
         for ($i = 0; $i < count($posts); $i++){
          print('<li class="card w-100 mb-4" style="max-width:700px;">
         <div class="row my-2 mx-1">
            <div class="col-3 ">
              <img src="'.$posts[$i]['avatar'].'" class="rounded-circle border" style="width: 100%; height:auto; max-width:70px;" alt="">
            </div>
            <div class="col-9">
              <a href="../controller/perfilController.php?usuario='.$posts[$i]['nombrePerfil'].'" class="link-secondary" style="text-decoration: none;">
                <h2>'.$posts[$i]['nombrePerfil'].'</h2>
              </a>
              <p>'.$posts[$i]['textoPost'].'</p>
            </div>
          </div>
          <div class="row">
            <img src="'.$posts[$i]['filePost'].'" class="img-fluid" alt="">
          </div>
          <div class="bg-secondary d-flex justify-content-center ">
            <a href="" class="" style="text-decoration: none; color:white;">
              <b>Comentarios</b>
            </a>
          </div>
        </li>');
          }?>

        
<!-- 
          <li class="card" style="max-width:800px;">
            <div class="row my-2 mx-1">
              <div class="col-3 ">
                <img src="../images/avatar/default.png" class="rounded-circle border" style="width: 100%; height:auto; max-width:100px;" alt="">
              </div>
              <div class="col-9">
                <a href="" class="link-secondary" style="text-decoration: none;">
                  <h2>Username</h2>
                </a>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis nobis libero
                  natus explicabo minima tempora minus? Quidem, tempora fugit ipsa obcaecati minima commodi
                  cum accusantium modi totam autem magnam dignissimos.</p>
              </div>
            </div>
            <div class="row">
              <img src="../images/postsImg/football-67701_1920.jpg" class="img-fluid" alt="">
            </div>
            <div class="bg-secondary d-flex justify-content-center ">
              <a href="" class="" style="text-decoration: none; color:white;">
                <b>Comentarios</b>
              </a>
            </div>
          </li> -->
        </ul>


      </div>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="../bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>

</body>

</html>