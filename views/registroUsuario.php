<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <title>Registro</title>
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../css/styles.css"></head>
</head>

<body>  

    <div class="container py-5 h-100">
        <form action="../controller/registroController.php" method="POST" id="form">
            <div class=" row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="border-radius: 2rem;">
                        <div class=" card-body p-5 text-center">


                            <div class="form-outline mb-4">
                                <label class="form-label" for="">NOMBRE USUARIO</label>
                                <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="">EMAIL</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="">CONTRASEÑA</label>
                                <input type="password" id="password" name="password" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="">CONTRASEÑA</label>
                                <input type="password" id="password2" class="form-control form-control-lg" />
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mt-2">
                                    <button class="btn btn-secondary w-100" type="submit">Crear cuenta</button>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <a class="boton btn btn-secondary w-100" href="../controller/loginUsuarioController.php" role="button">Login</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

    </div>

    <script src="../bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>

</body>

</html>