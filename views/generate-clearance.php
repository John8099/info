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
                            <i class="fas fas fa-book-open mr-1"></i>
                            Generate Clearance
                        </div>
                        <div class="card-body">
                            <form method="POST" id="formClearance">
                                <div class="form-group">
                                    <label class="mb-1">Clearance Type <font color="red">*</font></label>
                                    <select class="form-control" name="clearance" id="inputClearance" required>
                                        <option value="">- Select Clearance -</option>
                                        <option value="bldg_permit">Building Permit</option>
                                        <option value="brgy_clearance">Brgy. Clearance</option>
                                        <option value="tricycle">Clearance for Tricycle</option>
                                        <option value="good_moral">Clearance for Good Moral</option>
                                        <option value="elec_wiring">Installation of Electrical Wiring</option>
                                        <option value="firearms">Renewal of Firearms</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="mb-1">Full name <font color="red">*</font></label>
                                    <input class="form-control py-4" name="full_name" id="inputFullName" type="text" placeholder="Enter Full name" required />
                                </div>

                                <div class="form-group">
                                    <label class="mb-1">Age <font color="red">*</font></label>
                                    <input class="form-control py-4" name="age" id="inputAge" type="number" placeholder="Enter Age" required />
                                </div>

                                <div class="form-group">
                                    <label class="mb-1">Civil Status <font color="red">*</font></label>
                                    <select class="form-control" name="civil_stat" id="inputCivil" required>
                                        <option value="">- Select Civil Status -</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="widowed">Widowed</option>
                                    </select>
                                </div>

                                <div id="tricycle">
                                    <div class="form-group">
                                        <label class="mb-1">Brand <font color="red">*</font></label>
                                        <input class="form-control py-4" name="brand" id="inputBrand" type="text" placeholder="Enter Brand" />
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-1">Unit <font color="red">*</font></label>
                                        <input class="form-control py-4" name="unit" id="inputUnit" type="number" placeholder="Enter Unit" />
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-1">Chassis Number <font color="red">*</font></label>
                                        <input class="form-control py-4" name="chassis_num" id="inputChassisNum" type="text" placeholder="Enter Chassis Number" />
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-1">Plate Number <font color="red">*</font></label>
                                        <input class="form-control py-4" name="plate_num" id="inputPlateNum" type="text" placeholder="Enter Plate Number" />
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-1">Operating In <font color="red">*</font></label>
                                        <input class="form-control py-4" name="operating_in" id="inputOperatingIn" type="text" placeholder="Enter Operating In" />
                                    </div>

                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <div class="custom-control custom-checkbox"></div>
                                    <div style="margin-left:auto">
                                        <button type="button" class="btn btn-danger" onclick="return(window.history.back())">Cancel</button>
                                        <button type="button" id="btnPrint" class="btn btn-primary">Print</button>
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
        $(document).ready(() => {
            let tricycle = $("#tricycle")
            tricycle.hide()

            let btnPrint = $("#btnPrint")
            let inputClearance = $("#inputClearance")
            let formClearance = $("#formClearance")
            let action = `../php/clearance-print.php?`

            formClearance.submit(() => {
                formClearance.prop("action", action + `${$("#inputClearance").val()}`)
            })

            btnPrint.on("click", () => {
                let inputFullName = $("#inputFullName").val()
                let inputAge = $("#inputAge").val()
                let inputCivil = $("#inputCivil").val()

                formClearance.prop("action", action + `${$("#inputClearance").val()}`)

                if (inputClearance.val() == "tricycle") {
                    let inputBrand = $("#inputBrand").val()
                    let inputUnit = $("#inputUnit").val()
                    let inputChassisNum = $("#inputChassisNum").val()
                    let inputPlateNum = $("#inputPlateNum").val()
                    let inputOperatingIn = $("#inputOperatingIn").val()

                    if (inputFullName != "" && inputAge != "" && inputCivil != "" && inputBrand != "" && inputUnit != "" && inputChassisNum != "" && inputPlateNum != "" && inputOperatingIn != "") {
                        formClearance.submit()
                    } else {
                        alert("Error!\nPlease fill up all required fields.")
                        return
                    }
                } else {
                    if (inputFullName != "" && inputAge != "" && inputCivil != "") {
                        formClearance.submit()
                    } else {
                        alert("Error!\nPlease fill up all required fields.")
                        return
                    }
                }
            })
            inputClearance.change(function() {
                let clearance = inputClearance.val()
                if (clearance == "tricycle") {
                    tricycle.show()
                } else {
                    tricycle.hide()
                }
            });
        })
    </script>
</body>

</html>