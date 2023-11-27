<?php
include "../inc/view_header.php";
include "../functions.php";
?>

<style>
    .drug{
        list-style: decimal;
        font-size: 18px;
        letter-spacing: 1px;
        margin: 10px;
    }

    .drug a{
        text-decoration: none;
        color: black;
    }

    .drug a:hover{
        text-decoration: underline;
        color: black;
    }
</style>

    <!-- Above fold -->
    <div class="image-container" id="about">
        <div class="Overlay-image">
        </div>
        <div class="content">
            <div class="image-slide">
                <div class="image-desc active">
                    <h2>Manage your Drugs</h2>
                    <p> Upload and manage the drugs you create.</p>
                </div>
                <div class="image-desc">
                    <h2>Manage your Contracts with Pharmacies</h2>
                    <p>Make and stop contracts to supply various pharmacies.</p>
                </div>
            </div>
            <div class="arrow-buttons">
                <div class="arrow-left"><span class="material-symbols-outlined uil">arrow_back_ios_new</span></div>
                <div class="arrow-right"><span class="material-symbols-outlined uil">arrow_forward_ios</span></div>
            </div>
        </div>
    </div>


    <!-- Drugs -->
    <div class="item">
        <div class="title-text">
            <p>Features</p>
            <h1>What do you need?</h1>
        </div>

    </div>

    <div class="drug_section">
        <div class="sidebar">
            <ul class="category-list">
                <li class="category-item active" data-category="Manage-Drugs">MANAGE DRUGS</li>
                <li class="category-item" data-category="Manage-Contracts">MANAGE CONTRACTS</li>
                <li class="category-item" data-category="View-Drugs">VIEW ALL DRUGS IN THE SYSTEM</li>
                <li class="category-item" data-category="Api-details">API DETAILS</li>

                
            </ul>
        </div>

          <div class="main_content">
          

            <div class="category-content active" id="Manage-Drugs">
                <div class="container my-5">
                <h2>List of Drugs</h2>
<br>
                <a class="btn btn-primary" href="adddrugs.php" role="button">Add Drugs</a>
<br>
             <table class="table">
                <thead>
                    <tr>
                        <th>Drug ID</th>
                        <th>Drug Name</th>
                        <th>Drug Description</th>
                        <th>Drug Expiration Date</th>
                        <th>Drug Manufacturing Date</th>       
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require_once("../connect.php");

                    $sql = "
                    SELECT * 
                    FROM drugs d
                    WHERE d.Drug_Company = '$ID'
                    ;";
                        
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                         while ($row = $result->fetch_assoc()){
                        echo"
                        <tr>                                 
                           <td>$row[Drug_ID]</td>
                            <td>$row[Drug_Name]</td>
                            <td>$row[Drug_Description]</td>
                           <td>$row[Drug_Expiration_Date]</td>
                           <td>$row[Drug_Manufacturing_Date]</td>
                           <td>
                            <a class='btn btn-danger btn-sm' href='confirmDeleteDrug.php?id=" . $row["Drug_ID"] . "'>Delete</a>
                        </td>
                    
                         </tr>";
                         }
                     } else {
                        echo "<tr><td colspan='6'>No drugs in stock.</td></tr>";
                     }
                ?>
                </tbody>
             </table> 
        </div>
                    </div>

            <div class="category-content" id="Manage-Contracts">
                <div class="container my-5">
                    <h2>List of Contracts</h2>            
                    <br>
                    <a class="btn btn-primary" href="pharmacyList.php" role="button">Add New Contract</a>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>     
                                <th>Contract ID</th>
                                <th>Company</th>
                                <th>Pharmacy</th>
                                <th>Contract Supervisor</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php   
                            
                            require_once("../connect.php");

                            $result = $conn->query("
                            SELECT c.Contract_ID, cmp.Company_Name, p.Pharmacy_Name, s.Supervisor_Name, s.Supervisor_Email, c.Start_Date, c.End_Date, c.Status
                            FROM contracts c
                            INNER JOIN company cmp ON c.Company_ID = cmp.Company_ID
                            INNER JOIN supervisors s ON c.Supervisor_ID = s.Supervisor_ID
                            INNER JOIN pharmacy p ON c.Pharmacy_ID = p.Pharmacy_ID
                            WHERE c.Company_ID = '$ID'");

                            // Display the contracts data in the table
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["Contract_ID"] . "</td>";
                                    echo "<td>" . $row["Company_Name"] . "</td>";
                                    echo "<td>" . $row["Pharmacy_Name"] . "</td>";
                                    echo "<td>" . $row["Supervisor_Name"] . "</td>";
                                    echo "<td>" . $row["Start_Date"] . "</td>";
                                    echo "<td>" . $row["End_Date"] . "</td>";
                                    echo "<td>" . $row["Status"] . "</td>";
                                    echo "<td>";
                                    if ($row["Status"] == 'Active' ||$row["Status"] == 'active' || $row["Status"] ==  'ACTIVE') {
                                        echo "<a class='btn btn-danger btn-sm' href='terminate_contract.php?contractID=" . $row["Contract_ID"] . " &email= + " . $row["Supervisor_Email"] ."'>Terminate</a>";
                                    }
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
           
            <div class="category-content" id="View-Drugs">
                <div class="container my-5">
                    <div class="categories">
        <h1>Select a category</h1>
        
        <ul>
        <?php 
        $section = isset($_GET['cat']) ? $_GET['cat'] : null;
        
        $sql="SELECT DISTINCT Drug_Category FROM drugs";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // print_r ($row);
                foreach ($row as $key => $value) {
                    echo '
                    <li class="drug '.$value.'" <?php if($section=="'.$value.'"){echo "on";}?><a href="viewDrugs.php?cat='.$value.'">'.$value.'</a></li>
                    ';
                }
            } 
        }
        ?>
        </ul>
    </div>
                </div>
            </div>
            <div class="category-content" id="Api-details">
                <div class="container my-5">
                    <div class="token">
                        <h1>Token generation</h1>
                    <button id="generateTokenBtn">Genearate api token</button>
                    <div id="apiTokenResult"></div>
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                    <script>
                         $("#generateTokenBtn").on("click", function() {
                    
                    $.ajax({
                        url: "generate_api_token.php",  // Adjust the path based on your setup
                        method: "POST",
                        dataType: "json",
                        success: function(response) {
                            if (response.status === "success") {
                                
                                $("#apiTokenResult").html("<p>Generated API Token: " + response.apiToken + "</p>");
                            } else if (response.status === "registration_required") {
                                
                                $("#apiTokenResult").html(response.registrationForm);
                                $("#apiRegistrationForm").on("submit", function(event) {
                                    event.preventDefault();
                                    $.ajax({
                                        url: "apirequest.php",  
                                        method: "POST",
                                        data: $(this).serialize(),
                                        success: function(registrationResponse) {
                                            $("#apiTokenResult").html(registrationResponse);
                                        },
                                        error: function(error) {
                                            console.error("Error:", error);
                                            $("#apiTokenResult").html("<p>Error during registration.</p>");
                                        }
                                    });
                                });
                            } else {
                                // Other error occurred
                                $("#apiTokenResult").html("<p>Error generating API token.</p>");
                            }
                        },
                        error: function(error) {
                            console.error("Error:", error);
                            $("#apiTokenResult").html("<p>Error generating API token.</p>");
                        }
                    });
                });
        





                        
                

                       </script>
                    </div>
                   </div>
    </div>
    </div>



        </div> 
    </div>
    <script src="../overlay_script.js"></script>
    <script src="../image_slider.js"></script>
    <script src="../category_selector.js"></script>

    <?php include "../inc/footer.php";?>