<?php include "../inc/view_header.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug catalog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="categories">
    <button class="btn-login-popup" onclick="window.location.href='companyView.php'">BACK</button>
    <br><br>

        <hr>
        <strong><center><h1>CATEGORIES</h1></center></strong>
        <ul>
        <?php $section = isset($_GET['cat']) ? $_GET['cat'] : null;
        
        $sql="SELECT DISTINCT Drug_Category FROM drugs";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // print_r ($row);
                foreach ($row as $key => $value) {
                    echo '
                    <li class="drug '.$value.'" <?php if($section=="'.$value.'"){echo "on";}?><a href="viewDrugs.php?cat='.$value.'">'. $value.'</a></li>
                    ';
                }
            } 
        }
        
        ?>

        </ul>
    </div>
    <hr>

<br><br><br>

    <div class="details">
    <?php
    include '../connect.php';
    $PageTitle="All drugs";
    $section=null;

    $sql="SELECT DISTINCT Drug_Category FROM drugs";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // print_r ($row);
            foreach ($row as $key => $value) {

                if(isset($_GET['cat'])){
                    if($_GET['cat']== $value ){
                        $PageTitle=$value;
                        $section = $value;

                echo '    
                        <h1>'.$section.'</h1><br>
                        <div class="category-container">
                ';
                        $sql="SELECT * FROM drugs WHERE Drug_Category = '$value' ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="product">';
                            // $imageData= $row["Drug_Image"];
                                //header('Content-Type:image/jpeg');
                                //echo $imageData;
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($row["Drug_Image"]) . '" alt="' . $row["Drug_Name"] . '">';
                            // echo '<img src="data:image/png;base64,' . base64_encode($row["Drug_Image"]) . '" alt="' . $row["Drug_Name"] . '">';
                                echo '<p>' . $row["Drug_Name"] . '</p>';
                                echo '<a href="details.php?Drug_ID=' . $row["Drug_ID"] . '">View Details</a>';
                                echo '</div>';
                            }
                        }
                    }
                
                }
            }    
        }
    }
    ?>
    </div>

    <div class="item"></div>

</body>
</html>