<?php
session_start();
require_once("../connect.php");
$ID_SSN="";
$User_type="";
$doctors="";
$patients="";
$pharmacies="";
$company="";
$drugs="";
if($_SERVER['REQUEST_METHOD']=='GET'){
    
        if(!isset($_GET["ID_SSN"]) || !isset($_GET["User_type"])){
            header("location: adminView.php");
            exit; 
        }

        $ID_SSN=$_GET["ID_SSN"];
        $User_type=$_GET["User_type"];
        $patients=$_GET["Patients"];
        $doctors=$_GET["doctors"];
        $pharmacies=$_GET["Pharmacies"];
        $company=$_GET["company"];

        $sql="SELECT * FROM api_access WHERE `ID/SSN`= '$ID_SSN' AND `User_type`='$User_type'";;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $sql2="UPDATE api_access SET `Doctors`='$doctors' AND `Patients`='$patients' AND `Pharmacies`='$pharmacies' AND `Company`='$company' WHERE `ID/SSN`= '$ID_SSN' AND `User_type`='$User_type'";
        if (!$row) {
            header("location: /adminView.php");
            exit();
        }
        $ID_SSN=$row["ID/SSN"];
        $User_type=$row["User-type"];
        $patients=$row["Patients"];
        $doctors=$row["doctors"];
        $pharmacies=$row["Pharmacies"];
        $company=$row["company"];
    }else{
        $ID_SSN=$_POST["ID/SSN"];
    $User_type=$_POST["User_type"];
    $patients=$_POST["Patients"];
        $doctors=$_POST["doctors"];
        $pharmacies=$_POST["Pharmacies"];
        $company=$_POST["company"];

        if(empty($ID_SSN)||empty($User_type)){
        if(empty($ID_SSN)||(empty($User_type))){
            $errorMessage = "Some of the files you left empty are required";
               // break;
        }
        $sql="UPDATE api_access SET `doctors`='$doctors',`patients`='$patients',`pharmacies`='$pharmacies',`company`='$company' WHERE `ID/SSN`= '$ID_SSN' AND `User_type`='$User_type'";
        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
           // break;
        }

        $successMessage = "API access granted updated correctly";

        header("location: apigrant.php");
        exit;
    } while (false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container my-5">
        <h2>Edit Patient</h2> 
        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";  
        }
        ?>
        <form action="apiedit.php" method="get">
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label">ID/SSN</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="ID/SSN" value="<?php echo $ID_SSN; ?>" readonly>

                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Usertype</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="user-type" value="<?php echo $User_type; ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">drugs</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="drugs" <?php if ($drugs == '1') echo 'checked';?>value="1">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">doctors</label>
                <div class="col-sm-6">
                    <input type="checkbox" class="form-control" name="doctors" <?php if ($doctors == '1') echo 'checked';?>value="1">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">patients</label>
                <div class="col-sm-6">
                    <input type="check-box" class="form-control" name="patients" <?php if ($patients == '1') echo 'checked';?>value="1">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">pharmacy</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="pharmacies" <?php if ($pharmacies== '1') echo 'checked';?>value="1">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">company</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="company" <?php if ($company == '1') echo 'checked';?>  value="1">
                </div>
            </div>
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
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="adminView.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    
</body>
</html>
        
