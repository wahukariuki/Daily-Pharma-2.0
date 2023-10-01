<?php
include '../inc/view_header.php';
include '../patients/connect.php';
if(isset($_GET["Drug_ID"])){
    $Drug_ID=$_GET["Drug_ID"];
    $sql="SELECT * FROM drugs WHERE Drug_ID= ? ";
    $stmt=$conn->prepare($sql);
    if($stmt){

        $stmt->bind_param("i",$Drug_ID);
        $stmt->execute();
       $result= $stmt->get_result();
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
          $pageTitle=$row['Drug_Name'];
          echo'
          <style>
          .Drug-container{
            display:flex;
            align-items:center;
            margin: 20px;
          }
          .Drug-image{
            max-width:40%;
            flex:1;
            padding: 20px;
        }
          .Drug-details{
              flex:2;
              padding:20px;
          }

          </style>';

          echo '<br><br><br><br><br><br><a class="btn-login-popup" style="padding: 10px;margin:10px;" href="viewDrugs.php">Back to main</a>';
          
          echo '<br><br><br><hr>';       
          echo '<center><h1>DRUG INFORMATION</h1></center>';
          echo '<hr>';       

          echo '<div class="Drug-container">';
          echo '<div class="Drug-image">';
          echo  '<img  src="data:image/jpeg;base64,' . base64_encode($row["Drug_Image"]) . '" alt="' . $row["Drug_Name"] . '">';
          echo '</div>';
          echo '<div class="Drug-details">';
          echo ' <p> Drug ID:'.$row['Drug_ID'].'</p>';
          echo ' <p> Drug name:'.$row['Drug_Name'].'</p>';
          echo '<p> Drug decscription:'.$row['Drug_Description'].'</p>';
          echo '<p> Drug Quantity:'.$row['Drug_Quantity'].'</p>';
          echo '<p> Drug Manufacturing date:'.$row['Drug_Manufacturing_Date'].'</p>';
          echo '<p> Drug Expiration date:'.$row['Drug_Expiration_Date'].'</p>';
          echo '<p> Company Manufacturing the drug:'.$row['Drug_Company'].'</p>';
          echo '<p> Drug category:'.$row['Drug_Category'].'</p>';
          echo '</div>';
        
       // Close the div
    echo '</div>';
} else {
    echo "No drug found with the provided ID.";
}
} else {
echo "Error in preparing the SQL statement.";
}

// Close the database connection
$stmt->close();
$conn->close();
    
    
}
?>