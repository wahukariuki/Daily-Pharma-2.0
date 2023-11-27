<?php
session_start();
require_once("../connect.php");
if (isset($_SESSION['ID'])) {
    $ID = $_SESSION['ID'];
    $sql = "SELECT * FROM api_access_request WHERE `ID/SSN` = $ID AND resource_requested='allowed'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $general_apiToken = bin2hex(random_bytes(32));
        $sqlUpdate = "UPDATE api_access SET token= '$apiToken' WHERE `ID/SSN` = $userId";
        $conn->query($sqlUpdate);
        $response = [
            'status' => 'success',
            'apiToken' => $general_apiToken
        ];}else {
            
            $response = [
                'status' => 'registration_required',
                'message' => 'User registration is required to generate an API token.'
            ];header('Location: apiRequest.php');
            exit();
        }

    
    $sql2="SELECT * FROM api_access WHERE `ID/SSN` = $ID AND Pharmacies='allowed' AND Doctors='allowed' AND drugs='allowed'  "
    $result2 = $conn->query($sql2);
    if($result->num_rows>0){
        $specific_apiToken = bin2hex(random_bytes(32));
        $sqlUpdate = "UPDATE api_access SET specific_token= '$apiToken_specific' WHERE `ID/SSN` = $userId";

    }else{
        $error_msg="You are not authorized to this type of token";
        echo $error_msg;

    }
}
    
    
    header('Content-Type: application/json');
    echo json_encode($response);

?>