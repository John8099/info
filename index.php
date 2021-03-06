<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Brgy. Cabilauan Information System</title>
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="php/login.php" method="POST">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputUname">Username</label>
                                            <input class="form-control py-4" id="inputUname" name="uname" type="text" placeholder="Enter username" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" id="inputPassword" name="pass" type="password" placeholder="Enter password" />
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="showPass" type="checkbox" />
                                                <label class="custom-control-label" for="showPass">Show password</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
        $(document).ready(function() {
            let pass = $("#inputPassword")
            if (pass.attr("type") == "password") {
                $("#showPass").prop('checked', false);
            } else {
                $("#showPass").prop('checked', true);
            }
            $("#showPass").change(function() {
                if (this.checked) {
                    pass.prop("type", "text")
                } else {
                    pass.prop("type", "password")
                }
            });
        });
    </script>
</body>

</html>