<?php
session_start();
require_once("../connect.php");
$ID_SSN="";
$User_type="";
$Resource="";
if($_SERVER['REQUEST_METHOD']=='GET'){
    
        if(!isset($_GET["ID_SSN"])){
            header("location:adminView");
            exit
        
        if(!isset($_GET["User_type"])){
            header("location: adminView.php");
        exit; 
        }
        $ID_SSN=$_GET["ID_SSN"];
        $User_type=$_GET["User_type"];
        $Resource=$_GET["resource_type"];
        $sql="SELECT * FROM api_access_request WHERE ID/SSN= 'ID_SSN' AND User_type='uset_type'"
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $sql2="UPDATE api_access SET Drugs='allowed' WHERE ID/SSN= '$ID_SSN' AND User_type='$User_type'";
        if (!$row) {
            header("location: /adminView.php");
            exit();
        }
        $ID_SSN=$row["ID/SSN"];
        $User_type=$row["User-type"];
        $Resource=$row["resouce_type"];

        
        

    
}else{
    $ID_SSN=$_POST["ID/SSN"]
    $User_type=$_POST["User_type"];
$Resource=$_POST["resource_type"];

if(empty($ID_SSN))||(empty($User_type)||(empty($Resource))){
        $errorMessage = "All fields are required";
            break;
    }
    $sql="UPDATE api_access_request SET resource_type='$Resource' WHERE  ID/SSN= 'ID_SSN' AND User_type='uset_type'";
    $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        $successMessage = "API access granted updated correctly";

        header("location: apigrant.php");
        exit;
    } while (false);
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API GRANT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
<form action="apigrant.php" method="post">
<div class="row mb-3">
    
                <label class="col-sm-3 col-form-label">ID/SSN</label>
                <div class="col-sm-6">
                <input type="text"class="form-control" name="ID/SSN" value="<?php echo $SSN; ?>" readonly>
                </div>
            </div>
  
    <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Usertype</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="user-type" value="<?php echo $User_type; ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">resource</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="resource_type" value="<?php echo $Resource; ?>">
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
</div>
</body>
</html>