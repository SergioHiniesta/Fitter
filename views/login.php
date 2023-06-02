<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../css/styles.css"></head>

<body>

    <div class="container py-5 h-100">
        <form action="../controller/loginUsuarioController.php" method="POST" id="form">
            <div class=" row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="border-radius: 2rem;">
                        <div class=" card-body p-5 text-center">

                            <div class="form-outline mb-4">
                                <label class="form-label" for="">EMAIL</label>
                                <input type="email" id="" name="email" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="">CONTRASEÑA</label>
                                <input type="password" id="" name="password" class="form-control form-control-lg" />
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mt-2">
                                    <button class="btn w-100 btn-secondary btn-block" type="submit">Login</button>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <a class="btn w-100  btn-secondary " href="../controller/registroController.php" role="button">Registrarse</a>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
        </form>
    </div>


    <script src="../bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>