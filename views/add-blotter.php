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
                            <i class="fas fa-plus mr-1"></i>
                            Add Blotter
                        </div>
                        <div class="card-body">
                            <form action="../php/add-blotter.php" method="POST">
                                <div class="form-group">
                                    <label class="mb-1" for="inputName">Complainant/s </label>
                                    <input class="form-control py-4" id="inputName" name="name" type="text" placeholder="Enter Complainant/s" required/>
                                </div>

                                <div class="form-group">
                                    <label class="mb-1" for="inputrespondent">Respondent/s</label>
                                    <input class="form-control py-4" id="inputrespondent" name="respondent" type="text" placeholder="Enter Respondent/s" required/>
                                </div>
                                <div class="form-group">
                                    <label class="mb-1" for="inputwitness">Witness</label>
                                    <input class="form-control py-4" id="inputwitness" name="witness" type="text" placeholder="Enter Witness"/>
                                </div>
                                <div class="form-group">
                                    <label class="mb-1" for="inputcomplaint">Complaint</label>
                                    <textarea name="complaint" class="form-control py-4" id="inputcomplaint" cols="30" rows="10" placeholder="Enter Complaint" required></textarea>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <div class="custom-control custom-checkbox"></div>
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
</body>

</html>