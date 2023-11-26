<?php
session_start();
require_once("../connect.php");
$ID="";
$User_type="company";
$Resource_type="not_allowed";
$Password="";

//$Password="";
if($_SERVER['REQUEST_METHOD']=='GET'){
    
    if(!isset($_GET["ID"])){
        header("location:login.html");
        exit;
    }
    if(!isset($_GET["password"])){
        header("location:login.html");
        exit;
    }
$ID=$_GET["ID"];
$ID=$_GET["password"];
$sql="SELECT * FROM company WHERE ID='$ID'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sql2="INSERT INTO api_access_request(ID/SSN,User_type,Resuorce_requested)
VALUES('$ID','$User_type','$Resource_type')";
$result2 = $connection->query($sql2);

if (!$result2) {
    $errorMessage = "Invalid Query: " . $connection->error;
    break;
}

$sql3="INSERT INTO api_access(ID/SSN,User_type,Drugs,Patients,Doctors,Pharmacies,Company,Password)
VALUES('$ID','$User_type','not_allowed','not_allowed','not_allowed','not_allowed','not_allowed')";
$result3 = $connection->query($sql3);

if (!$result3) {
    $errorMessage = "Invalid Query: " . $connection->error;
    break;
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container my-5">
        <h2>API_REQUEST</h2>

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
        <form action="api_request.php" method="get">
        <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ID" value="<?php echo $ID; ?>" readonly>
                </div>
                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Usertype</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="User_type" value="<?php echo $User_type; ?>readonly">
                </div>
                </div> 

                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $Password; ?>">
                </div>
                </div>
                <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                </div>
                    <button type="submit" class="btn btn-primary" role="button">request</button>
                </div>
        </form>

</body>
</html>