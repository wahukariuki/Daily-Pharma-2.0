<?php 
include "../inc/session_header.php";

if (isset($_GET["id"])) {

    $drug = $_GET["id"];

    $sql = "SELECT * FROM drugs WHERE drug_id = '$drug'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>
        if (confirm('Are you sure you want to remove this drug from your list?')) {
            window.location.href = 'deleteDrug.php?pharID=" . $ID . "&ID=" . $drug . "';
        } else {
            window.location.href = 'companyView.php';
        }
    </script>";
    
    } 
    else{
        echo "<script>
            alert('Drug does not exist any more or there is an issue with their deletion. Please contact related company.')
            window.location.href = 'companyView.php';
            exit;
            </script>";
    }
}
?>
