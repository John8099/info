<?php
include "../php/server.php";
session_start();
if (!$_SESSION['id']) {
    header("Location: ../");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Brgy. Cabilauan Information System</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include "nav-title.php"; ?>
    <div id="layoutSidenav">
        <?php include "nav.php"; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container" style="margin-top:10px">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-users mr-1"></i>
                            Add Admin
                        </div>
                        <div class="card-body">
                            <form action="../php/add-admin.php" method="POST">
                                <div class="form-group">
                                    <label class="mb-1" for="inputFname">First name </label>
                                    <input class="form-control py-4" id="inputFname" name="fname" type="text" placeholder="Enter First name" required />
                                </div>

                                <div class="form-group">
                                    <label class="mb-1" for="inputLname">Last name</label>
                                    <input class="form-control py-4" id="inputLname" name="lname" type="text" placeholder="Enter Last name" required />
                                </div>
                                <div class="form-group">
                                    <label class="mb-1" for="inputCnum">Contact Number</label>
                                    <input class="form-control py-4" id="inputCnum" name="cnum" type="text" placeholder="Enter Contact Number" />
                                </div>
                                <div class="form-group">
                                    <label class="mb-1" for="inputUname">Username</label>
                                    <input class="form-control py-4" id="inputUname" name="uname" type="text" placeholder="Enter Username" />
                                </div>
                                <div class="form-group">
                                    <label class="mb-1" for="inputPassword">Password</label>
                                    <input class="form-control py-4" id="inputPassword" name="pass" type="password" placeholder="Enter Password" />
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="showPass" type="checkbox" />
                                        <label class="custom-control-label" for="showPass">Show password</label>
                                    </div>
                                    <div style="margin-left:auto">
                                        <button type="button" class="btn btn-danger" onclick="return(window.history.back())">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
    <script>
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
    </script>
</body>

</html>