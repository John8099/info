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
    <style>
        @page {
            size: auto;
            margin: 10px;
            margin-top: -40px;
        }

        #printHeader {
            display: none;
        }

        @media print {
            tr {
                border: 1pt solid black !important;
            }

            .table-bordered th,
            .table-bordered td {
                border: 1pt solid black !important;
            }

            #action,
            #action2,
            .card-header,
            .card-header a,
            #btnPrint {
                display: none;
            }

            img {
                width: 90.24px;
            }

            #printHeader {
                font-size: 16px;
                text-align: center;
                font-weight: bold;
                display: block;
            }

            .brgy {
                font-size: 20px;
                font-weight: normal;
            }
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <?php include "nav-title.php"; ?>
    <div id="layoutSidenav">
        <?php include "nav.php"; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid" style="margin-top:10px">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-clipboard-list mr-1"></i>
                            List of Blotter
                            <a href="add-blotter.php" class="btn btn-primary" style="float: right;">Add</a>
                        </div>
                        <div class="card-body">
                            <?php
                            $q;
                            $searchInput = "";
                            $dateFrom = "";
                            $dateTo = "";

                            if (isset($_GET["search"])) {
                                $searchFor = $_POST["searchFor"];

                                if ($searchFor == "complainant" || $searchFor == "respondent" || $searchFor == "witness") {
                                    $searchVal = $_POST["search"];
                                    $searchInput = $searchVal;
                                    $q = mysqli_query($con, "SELECT * FROM blotter WHERE $searchFor LIKE '%$searchVal%'");
                                } else if ($searchFor == "date") {
                                    $from = $_POST["from"];
                                    $to = $_POST["to"];

                                    $dateFrom = $from;
                                    $dateTo = $to;
                                    $q = mysqli_query($con, "SELECT * FROM blotter WHERE $searchFor BETWEEN '$from' AND '$to'");
                                }
                            } else {
                                $q = mysqli_query($con, "SELECT * FROM blotter");
                            }
                            ?>
                            <form method="POST" id="formSearch" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                                <div class="input-group">
                                    <select id="searchFor" name="searchFor" class="form-control" style="margin-right: 10px;">
                                        <?php
                                        $searchFilterVals = array(
                                            "complainant" => "Complainant",
                                            "respondent" => "Respondent",
                                            "witness" => "Witness",
                                            "date" => "Date"
                                        );
                                        if (!isset($_GET["search"])) :
                                        ?>
                                            <option value="">- Search for -</option>
                                            <?php
                                            foreach ($searchFilterVals as $val => $title) :
                                            ?>
                                                <option value="<?php echo $val ?>"><?php echo $title ?></option>
                                            <?php endforeach; ?>
                                        <?php
                                        else :
                                        ?>
                                            <option value="<?php echo $_GET['search'] ?>"><?php echo $searchFilterVals[$_GET["search"]] ?></option>
                                            <?php
                                            foreach ($searchFilterVals as $val => $title) :
                                                if ($val != $_GET["search"]) :
                                            ?>
                                                    <option value="<?php echo $val ?>"><?php echo $title ?></option>
                                        <?php
                                                endif;
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>

                                    <input class="form-control" type="text" name="search" id="inputSearch" value="<?php echo $searchInput ?>" placeholder="Search Value">
                                    <div id="date" class="input-group">
                                        <label for="inputFrom">From:</label>
                                        <input type="date" class="form-control" name="from" id="inputFrom" value="<?php echo $dateFrom ?>" style="margin: 0px 10px 0px 10px">
                                        <label for="inputTo">To:</label>
                                        <input type="date" class="form-control" name="to" id="inputTo" value="<?php echo $dateTo ?>" style="margin-left: 10px;">
                                    </div>

                                    <div id="buttons">
                                        <button class="btn btn-primary" type="button" id="btnSubmit" style="margin-left: 10px;">Search</button>
                                    </div>
                                    <button class="btn btn-danger" type="button" id="btnReset" style="margin-left: 10px;">Reset</button>

                                </div>
                            </form>
                            <button type="button" id="btnPrint" class="btn btn-warning" style="float: right;">Print</button>
                            <?php
                            if (mysqli_num_rows($q) > 0) :
                            ?>
                                <div class="table-responsive" style="margin-top: 10px;">
                                    <div class="header" id="printHeader">
                                        <center>
                                            <img src="../img/logo.png" alt="">
                                        </center>
                                        <p>
                                            REPUBLIC OF THE PHILIPPINES <br>
                                            PROVINCE OF ILOILO<br>
                                            MUNICIPALITY OF NEW LUCENA<br>
                                            BARANGAY CABILAUAN<br>
                                            <br>
                                            <br>
                                            <label class="brgy" style="font-weight: bold;">
                                                List of Borrowed Items
                                            </label>
                                        </p>
                                    </div>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Complainant</th>
                                                <th>Respondent</th>
                                                <th>Witness</th>
                                                <th>Complaint</th>
                                                <th style="width: 20%;" id="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_object($q)) :
                                            ?>
                                                <tr>
                                                    <td><?php echo date("M d, Y h:i:s A", strtotime(str_replace('-', '/', $row->date))) ?></td>
                                                    <td><?php echo $row->complainant ?></td>
                                                    <td><?php echo $row->respondent ?></td>
                                                    <td><?php echo $row->witness ?></td>
                                                    <td><?php echo $row->complaint ?></td>
                                                    <td id="action2">
                                                        <a href="edit-blotter.php?id=<?php echo $row->id ?>" class="btn btn-warning">Edit</a>
                                                        <a href="../php/delete.php?blotter&&id=<?php echo $row->id ?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            else :
                            ?>
                                <hr>
                                <div class="table-responsive" style="margin-top: 10px;text-align: center;">
                                    <h5>No results found.</h5>
                                </div>
                            <?php endif ?>
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
        $(document).ready(() => {
            let searchFor = $("#searchFor")
            let inputSearch = $("#inputSearch")
            let dates = $("#date")
            let buttons = $("#buttons")
            let btnReset = $("#btnReset")
            let formSearch = $("#formSearch");
            window.onload = hideOnFirstLoad(inputSearch, dates, buttons);

            searchFor.change(function() {
                searchForVal = searchFor.val()
                if (searchForVal == "respondent" || searchForVal == "witness" || searchForVal == "complainant") {
                    inputSearch.show()
                    dates.hide()
                    buttons.show()
                } else if (searchForVal == "date") {
                    inputSearch.hide()
                    dates.show()
                    buttons.show()
                } else {
                    inputSearch.hide()
                    dates.hide()
                    buttons.hide()
                }
            });

            btnReset.on("click", () => {
                $(this).closest('form').find("input[type=text], input[type=date]").val("");
                window.location.href = "blotter.php"
            })

            formSearch.submit(() => {
                formSearch.prop("action", `?search=${searchForVal}`)
            })

            $("#btnSubmit").on("click", () => {
                searchForVal = searchFor.val()

                if (searchForVal == "date") {
                    if ($("#inputFrom").val() == "" || $("#inputTo").val() == "") {
                        alert("Error!\nDate from or Date to should not be empty")
                    } else {
                        let fromVal = new Date($("#inputFrom").val());
                        let toVal = new Date($("#inputTo").val());
                        let dateDiff = (toVal.getTime() - fromVal.getTime()) / (1000 * 3600 * 24);

                        if (dateDiff.toString().includes("-")) {
                            alert("Error!\nDate from should not be later than Date to.")
                        } else {
                            formSearch.prop("action", `?search=${searchForVal}`)
                            formSearch.submit()
                        }
                    }
                } else {
                    if (inputSearch.val() == "") {
                        alert("Error!\nSearch value should not be empty.")
                    } else {
                        formSearch.prop("action", `?search=${searchForVal}`)
                        formSearch.submit()
                    }
                }
            })
        })

        $("#btnPrint").on("click", () => {
            window.print()
        })

        function hideOnFirstLoad(inputSearch, dates, buttons) {
            let location = window.location.href.split("=")
            let searchFilter = location[location.length - 1]

            if (searchFilter == "date") {
                inputSearch.hide()
                dates.show()
                buttons.show()
            } else if (searchFilter == "respondent" || searchFilter == "witness" || searchFilter == "complainant") {
                inputSearch.show()
                dates.hide()
                buttons.show()
            } else {
                inputSearch.hide()
                dates.hide()
                buttons.hide()
            }

        }
    </script>
</body>

</html>