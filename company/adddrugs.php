<?php

include "../inc/session_header.php";

$drug_name  = "";
$drug_company = "";
$drug_desc  = "";
$drug_quantity = "";
$drug_expiry  = "";
$drug_manuf  = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $drug_name = $_POST["Drug_Name"];
    $drug_company = $_POST["Drug_Company"];
    $drug_desc = $_POST["Drug_Description"];
    $drug_quantity = $_POST["Drug_Quantity"];
    $drug_expiry = $_POST["Drug_Expiration_Date"];
    $drug_manuf = $_POST["Drug_Manufacturing_Date"];


    do {

        $sql = "
        INSERT INTO `drugs`(`Drug_Name`, `Drug_Description`, `Drug_Quantity`, `Drug_Expiration_Date`, `Drug_Manufacturing_Date`, `Drug_Company`)
         VALUES('$drug_name', '$drug_desc', '$drug_quantity', '$drug_expiry',  '$drug_manuf', '$drug_company')";
        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $conn->error;
            break;
        }

        $drug_name  = "";
        $drug_company = "";
        $drug_desc  = "";
        $drug_quantity = "";
        $drug_expiry  = "";
        $drug_manuf  = "";

        $successMessage = "Drug added successfully";
        header("Location: companyView.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Company View - Add New Drug</title>
    <link rel="stylesheet" href="../bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container my-5">
        <h2>New Drug</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post" action="adddrugs.php">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Drug Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Drug_Name" value="<?php echo $drug_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Drug Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Drug_Description" value="<?php echo $drug_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Drug Quantity</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="Drug_Quantity" value="<?php echo $drug_company; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Drug Expiration Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="Drug_Expiration_Date" value="<?php echo $drug_formula; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Drug Manufacturing Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="Drug_Manufacturing_Date" value="<?php echo $drug_price; ?>">
                </div>
            </div>

            <input type="hidden" name="Drug_Company" value="<?php echo $ID ;?>">

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </form>
    </div>
</body>
</html>
