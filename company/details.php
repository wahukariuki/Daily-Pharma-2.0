<?php
include '../inc/view_header.php';
include '../patients/connect.php';
if(isset($_GET["Drug_ID"])){
    $Drug_ID = intval($_GET["Drug_ID"]);

    $sql= "SELECT * FROM drugs WHERE Drug_ID = '$Drug_ID' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $pageTitle=$row['Drug_Name'];

          echo '
          <style>

          h1{
            text-align: center;
          }

          .Drug-container{
          display:flex;
          align-items:center;
          }
  
          .Drug-image{
          max-width:40%;
          flex:1;
          padding: 20px;
          border-radius: 10px;
          }
  
          .Drug-details{
          flex:2;
          padding:20px;
          }
  
          table {
          width: 80%;
          border-collapse: collapse;
          }
  
          th, td {
          padding: 8px 12px;
          text-align: left;
          }
  
          th {
          background-color: transparent;
          font-weight: bold;
          }
  
  
          tr:hover {
          background-color: #ccc;
          }
      
            </style>';

          echo '<br><br><br><br><br><br><button class="btn-login-popup" onclick="window.location.href=\'viewDrugs.php\'">BACK</button>';          
       

          echo '<br><br><h1>DRUG INFORMATION</h1>';

          echo '<div class="Drug-container">';

          echo '<div class="Drug-image">';
          echo  '<img  src="data:image/jpeg;base64,' . base64_encode($row["Drug_Image"]) . '" alt="' . $row["Drug_Name"] . '">';
          echo '</div>';

          echo '<div class="Drug-details">';
          echo '<table> <tr> <th>Drug ID:</th><td>'.$row['Drug_ID'].'</td></tr>';
          echo '<tr> <th>  Drug name:</th><td>'.$row['Drug_Name'].'</td></tr>';
          echo '<tr> <th>  Drug decscription:</th><td>'.$row['Drug_Description'].'</td></tr>';
          echo '<tr> <th>  Drug Quantity:</th><td>'.$row['Drug_Quantity'].'</td></tr>';
          echo '<tr> <th>  Manufacturing date:</th><td>'.$row['Drug_Manufacturing_Date'].'</td></tr>';
          echo '<tr> <th>  Drug Expiration date:</th><td>'.$row['Drug_Expiration_Date'].'</td></tr>';
          echo '<tr> <th>  Manufacturer ID:</th><td>'.$row['Drug_Company'].'</td></tr>';
          echo '<tr> <th>  Drug category:</th><td>'.$row['Drug_Category'].'</td></tr></table>';          
          echo '</div>';
        
        echo '</div>';
      }

}else {
    echo "No drug found with the provided ID.";
}

} else {
echo "Error in preparing the extracting drug data.";
}

// Close the database connection
$conn->close();
?>