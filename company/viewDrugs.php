<!-- 
<?php
// // Assuming you have already established a database connection ($conn)

// // Fetch unique drug categories
// $uniqueCategoriesQuery = $conn->query("
// SELECT DISTINCT Drug_Category
// FROM drugs
// ;");

// $uniqueCategories = array();
// while ($row = $uniqueCategoriesQuery->fetch_assoc()) {
//     $uniqueCategories[] = $row['Drug_Category'];
// }
// ?>
//                 <div>
//                     <form method="POST" class="select-container company">
//                         <label for="selectedCategory">Categories: </label>
//                         <?php foreach ($uniqueCategories as $category) : ?>
//                             <button class="btn btn-primary company" type="submit" name="selectedCategory" value="<?php echo $category; ?>"><?php echo $category; ?></button>
//                         <?php endforeach; ?>
//                         <button class="btn btn-danger company" type="submit" name="selectedCategory" value="null">No Filter</button>
//                     </form>
//                 </div>


//                 <ul class="categorized-drugs">
//                     <?php
//                     // Assuming you want to display drugs of the selected category
//                     if (isset($_POST['selectedCategory'])) {
//                         $selectedCategory = $_POST['selectedCategory'];

//                         $query2 =  $conn->query("SELECT *
//                         FROM drugs d
//                         WHERE d.Drug_Category = '$selectedCategory'
//                         ;");

//                         $drugCategory = array();
//                         while ($row = $query2->fetch_assoc()) {
//                             $drugCategory[] = $row;
//                         }


//             foreach ($drugCategory as $eachDrug) {
//                 echo "<li class='items'>";
//                 echo '<img src="data:image/png;base64,' . base64_encode($eachDrug['Drug_Image']) . '" alt="' . $eachDrug['Drug_Name'] . '">';
//                 echo "<p class='items name'>" . strtoupper( $eachDrug["Drug_Name"] ). "</p>";
//                 echo "<a href='details.php?id=" . $eachDrug["Drug_ID"] . "'><p class='items link'>View Details</p></a>";
//                 echo "</li>";
//             }


//                     }
                    ?>
                </ul> -->

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
        <hr>
        <strong><center><h1>CATEGORIES</h1></center></strong>
        <ul>
        <?php $section = isset($_GET['cat']) ? $_GET['cat'] : null; ?>
            <li class="antibiotics" <?php if($section=="antibiotics"){echo "on";}?>><a href="viewDrugs.php?cat=antibiotics">Antibiotics</a></li>
            <li class="painrelievers"<?php if($section=="painrelievers"){echo "on";}?>><a href="viewDrugs.php?cat=painrelievers">Pain relievers</a></li>
            <li class="antifungal" <?php if($section=="antifungal"){echo "on";}?>><a href="viewDrugs.php?cat=antifungal">Antifungal</a></li>
            <li class="immunotherapy" <?php if($section=="immunotherapy"){echo "on";}?>><a href="viewDrugs.php?cat=immunotherapy">Immunotherapy</a></li>
            <li class="immunosuppressants" <?php if($section=="immunosuppressants"){echo "on";}?>><a href="viewDrugs.php?cat=immunosuppressants">Immunosuppressants</a></li>
            <li class="antiparasitic" <?php if($section=="antiparasitic"){echo "on";}?>><a href="viewDrugs.php?cat=antiparasitic">AntiParasitic</a></li>
        </ul>
    </div>
    <hr>

<br><br><br>

    <div class="details">
    <?php
    include '../patients/connect.php';
    $PageTitle="All drugs";
    $section=null;

    if(isset($_GET['cat'])){
        if($_GET['cat']=="antibiotics"){
            $PageTitle="antibiotics";
            $section="antibiotics";
            
            echo "<h1>".$section."</h1><br>";

            echo "<div class='category-container'>";

            $sql="SELECT * FROM drugs WHERE Drug_Category='antibiotic'";
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
        if($_GET['cat']=="painrelievers"){
            
        $PageTitle="pain relievers";
        $section="pain relievers";
        
        echo "<h1>".$section."</h1><br>";

        echo "<div class='category-container'>";
        //echo "<h1>".$PageTitle."</h1><br>";

            $sql="SELECT * FROM drugs WHERE Drug_Category='Pain reliever'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                //  $imageData= $row["Drug_Image"];
                    //header('Content-Type:image/jpeg');
                // echo $imageData;
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row["Drug_Image"]) . '" alt="' . $row["Drug_Name"] . '">';
                // echo '<img  src="data:image/png;base64,' . base64_encode($row["Drug_Image"]) . '" alt="' . $row["Drug_Name"] . '">';
                    echo '<p>' . $row["Drug_Name"] . '</p>';
                    echo '<a href="details.php?Drug_ID=' . $row["Drug_ID"] . '">View Details</a>';
                    echo '</div>';

            }
        }
        }
        if($_GET['cat']=="immunotherapy"){
        $PageTitle="immunotherapy";
        $section="Immunotherapy drugs";
        
        echo "<h1>".$section."</h1><br>";
        echo "<div class='category-container'>";

        $sql="SELECT * FROM drugs WHERE Drug_Category='Immunotherapy'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    //$imageData= $row["Drug_Image"];
                    //header('Content-Type:image/jpeg');
                    //echo $imageData;
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row["Drug_Image"]) . '" alt="' . $row["Drug_Name"] . '">';
                // echo '<img src="data:image/png;base64,' . base64_encode($row["Drug_Image"]) . '" alt="' . $row["Drug_Name"] . '">';
                // echo '<img src="' . $row["Drug_Image"] . '" alt="' . $row["Drug_Name"] . '">';
                    echo '<p>' . $row["Drug_Name"] . '</p>';
                    echo '<a href="details.php?Drug_ID=' . $row["Drug_ID"] . '">View Details</a>';
                    echo '</div>';

            }
        }
        }
        if($_GET['cat']=="immunosuppressants"){
        $PageTitle="immunosuppressants";
        $section="immunosuppressants";
        
        echo "<h1>".$section."</h1><br>";

        echo "<div class='category-container'>";
            $sql="SELECT * FROM drugs WHERE Drug_Category='Immunosuppressants'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                /* $imageData= $row["Drug_Image"];
                    header('Content-Type:image/jpeg');
                    echo $imageData;*/
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row["Drug_Image"]) . '" alt="' . $row["Drug_Name"] . '">';
                    //echo '<img src="data:image/png;base64,' . base64_encode($row["Drug_Image"]) . '" alt="' . $row["Drug_Name"] . '">';
                    //echo '<img src="' . $row["Drug_Image"] . '" alt="' . $row["Drug_Name"] . '">';
                    echo '<p>' . $row["Drug_Name"] . '</p>';
                    echo '<a href="details.php?Drug_ID=' . $row["Drug_ID"] . '">View Details</a>';
                    echo '</div>';

            }
        }
        }
        if($_GET['cat']=="antiparasitic"){
        $PageTitle="antiparasitic";
        $section="Antiparasitic drugs";
        
        echo "<h1>".$section."</h1><br>";

        echo "<div class='category-container'>";
        $sql="SELECT * FROM drugs WHERE Drug_Category='Antiparasitic'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    //$imageData= $row["Drug_Image"];
                    //header('Content-Type:image/jpeg');
                    //echo $imageData;
                    //echo '<img src="' . $row["Drug_Image"] . '" alt="' . $row["Drug_Name"] . '">';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row["Drug_Image"]) . '" alt="' . $row["Drug_Name"] . '">';
                // echo '<img src="data:image/png;base64,' . base64_encode($row["Drug_Image"]) . '" alt="' . $row["Drug_Name"] . '">';
                    echo '<p>' . $row["Drug_Name"] . '</p>';
                    echo '<a href="details.php?Drug_ID=' . $row["Drug_ID"] . '">View Details</a>';
                    echo '</div>';

            }
        }
        }
        if($_GET['cat']=="antifungal"){
        $PageTitle="antifungal";
        $section="Antifungal drugs";
        echo "<h1>".$section."</h1><br>";        
        echo "<div class='category-container'>";
        $sql="SELECT * FROM drugs WHERE Drug_Category='Antifungal'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                // $imageData= $row["Drug_Image"];
                    //header('Content-Type:image/jpeg');
                    //echo $imageData;
                //  echo '<img src="' . $row["Drug_Image"] . '" alt="' . $row["Drug_Name"] . '">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row["Drug_Image"]) . '" alt="' . $row["Drug_Name"] . '">';
                // echo '<img src="data:image/png;base64,' . base64_encode($row["Drug_Image"]) . '" alt="' . $row["Drug_Name"] . '">';
                    echo '<p>' . $row["Drug_Name"] . '</p>';
                    echo '<a href="details.php?Drug_ID=' . $row["Drug_ID"] . '">View Details</a>';
                    echo '</div>';

            }
        }
        }
    }

    ?>
    </div>
</body>
</html>