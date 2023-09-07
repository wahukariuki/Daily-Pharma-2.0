<?php 
function displayDrugs($conn, $ID) {
    $sql = "SELECT * FROM drugs d WHERE d.Drug_Company = '$ID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            echo "<tr>";                               
            echo "<td>" . $row["Drug_ID"] . "</td>";
            echo "<td>" . $row["Drug_Name"] . "</td>";
            echo "<td>" . $row["Drug_Description"] . "</td>";
            echo "<td>" . $row["Drug_Expiration_Date"] . "</td>";
            echo "<td>" . $row["Drug_Manufacturing_Date"] . "</td>";
            echo "<td><a class='btn btn-danger btn-sm' href='confirmDeleteDrug.php?id=" . $row["Drug_ID"] . "'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No drugs in stock.</td></tr>";
    }
}

function confirmDeleteDrug($conn, $drugID, $ID){
    $sql = "SELECT * FROM drugs WHERE drug_id = '$drugID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>
        if (confirm('Are you sure you want to remove this drug from your list?')) {
            window.location.href = 'deleteDrug.php?userID=" . $ID . "&ID=" . $drugID . "';
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

function deleteDrug($conn, $drugID, $ID){
    if (isset($drugID) && isset($ID)) {

        $sql = "SELECT * FROM drugs WHERE Drug_Company = '$ID' AND Drug_ID = '$ID'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $deleteQuery = "DELETE FROM drugs WHERE Drug_Company = '$ID' AND Drug_ID = '$ID'";
    
            if ($conn->query($deleteQuery) === TRUE) {
                echo "<script>alert('Successful deletion of drug')
                window.location.href = 'companyView.php';
                </script>";
            } else {
                echo "<script>alert('Error in deletion of drug. Try Again')
                window.location.href = 'companyView.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Error occured during deletion. Please contact related company.')
                window.location.href = 'companyView.php';
                exit;
                </script>";
        }
    } else {
        header("Location: companyView.php");
        exit;
    }
}





?>