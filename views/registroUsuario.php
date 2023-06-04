<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <title>Registro</title>
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
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
                                <input type="text" id="nombre" name="nombre" placeholder="Ej. FitterX98" class="form-control form-control-lg" required />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="">EMAIL</label>
                                <input type="email" id="email" name="email" placeholder="Ej. fitter@gmail.com" class="form-control form-control-lg" required />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="">CONTRASEÑA</label>
                                <input type="password" id="password" name="password" placeholder="Mínimo 8 carácteres" class="form-control form-control-lg" required />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="">CONFIRMAR CONTRASEÑA</label>
                                <input type="password" id="password2" name="password2" placeholder="Repite la contraseña" class="form-control form-control-lg" required />
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
                    <?php if (!empty($mensaje)) {
                        print('<div class="alert mt-3 alert-danger" role="alert">
  ' . $mensaje . ' <a href="#" class="alert-link">
</div>');
                    } ?>
                </div>

            </div>

            <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>

            <script src="../bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>

            <script>
                $(document).ready(function() {
                    $('#form').validate({
                        rules: {
                            nombre: {
                                required: true,
                                minlength: 5
                            },
                            password: {
                                required: true,
                                minlength: 8
                            },
                            password2: {
                                required: true,
                                minlength: 8,
                                equalTo: "#password"
                            },
                            email: {
                                required: true,
                                email: true
                            },
                        },
                        messages: {
                            nombre: {
                                required: "Por favor ingrese su nombre",
                                minlength: "El nombre deberá tener al menos 5 carácteres"
                            },
                            password: {
                                required: "Por favor ingresa una contraseña",
                                minlength: "La contraseña deberá tener al menos 8 carácteres"
                            },
                            password2: {
                                required: "Por favor ingresa de nuevo su contraseña",
                                minlength: "La contraseña deberá tener al menos 8 carácteres",
                                equalTo: "La contraseña debe coincidir con la ingresada anterior"
                            },
                            email: "Por favor ingresa un correo válido"

                        },
                        errorElement: "em",
                        
                        highlight: function(element, errorClass, validClass) {
                            $(element).parents(".col-sm-10").addClass("has-error").removeClass("has-success");
                        },
                        unhighlight: function(element, errorClass, validClass) {
                            $(element).parents(".col-sm-10").addClass("has-success").removeClass("has-error");
                        }
                    });
                });
            </script>


</body>

</html>