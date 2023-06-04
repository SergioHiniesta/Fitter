<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <title>Activación</title>
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
</head>

<body>

    <div class="container py-5 h-100">
        <form action="../controller/activarUsuarioController.php" method="POST" id="form">
            <div class=" row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="border-radius: 2rem;">
                        <div class=" card-body p-5 text-center">

                            <input type="hidden" type="email" id="email" name="email" value="<?php print $usuario["email"] ?>" />


                            <div class="form-outline mb-4">
                                <label class="form-label" for="">Código de activación</label>
                                <input type="text" id="codActivacion" name="codActivacion" class="form-control form-control-lg" />
                            </div>

                            <div class="row">
                                <div>
                                    <button class="btn btn-secondary w-100" type="submit">Activar cuenta</button>
                                </div>
                            </div>



                        </div>
                    </div>
                    <?php if (!empty($mensaje)) {
                        print('<div class="alert mt-3 alert-danger" role="alert">
  ' . $mensaje . ' <a href="#" class="alert-link">
</div>');
                    } ?>
                </div>


                <script src="../bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>

        </form>
    </div>


</body>

</html>