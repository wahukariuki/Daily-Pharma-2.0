<?php
session_start();

require_once "connect.php";

// Check if the user is logged in
if (!isset($_SESSION["userid"]) || !isset($_SESSION["user"])) {
    // Redirect to the login page if the user is not logged in
    header("Location: ../login.html");
    exit;
}

$user = $_SESSION["user"];
$ID = $_SESSION["userid"];
$username = $_SESSION["username"];


if (isset($_SESSION["user"])) {

    if ($_SESSION["user"] == "Patient") {
        //read the row of the selected client from the database table 
$sql = $conn->prepare("SELECT * FROM patients WHERE `Patient_SSN` = ?");
$sql->bind_param("i", $ID);
$sql->execute();
$row = $sql->get_result()->fetch_assoc();

if (!$row) {
    header("location: patientView.php");
    exit;
}

$ID = $row["Patient_SSN"];
$name = $row["Patient_Name"];
$email = $row["Patient_Email"];
$phone = $row["Patient_Phone"];
$gender = $row["Patient_Gender"];
$dob = $row["Patient_DOB"];
$age = $row["Patient_Age"];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Patient Profile</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
        <div class="logo">
            <a href="index.html">DailyPharma</a>
        </div>

        <div class="navbar">
            <nav class= navbar id="navbar">
                <a href="index.html">Home</a>
                <a href="#about">Features</a>
                <a href="#footer">Contact Us</a>
                <a href="logout.php" class="btn-login-popup" >Logout</a>                
            </nav>
        </div>

        <i class="uil uil-bars navbar-toggle" onclick="toggleOverlay()"></i>

        <div id="menu" onclick="toggleOverlay()">
            <div id="menu-content">
                <a href="index.html">Home</a>
                <a href="#about">Features</a>
                <a href="#footer">Contact Us</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>

    <div class= "container my-5">
        <h2>Patient Information</h2>
        <div class="item"></div>
        <form method ="post">
        <div class="row mb-3">
                <label class="col-sm-3 col-form label">SSN</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Patient_SSN" value="<?php echo $ID?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Patient_Name" value="<?php echo $name?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Patient_Phone" value="<?php echo $phone?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Patient_Email" value="<?php echo $email?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Gender</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Patient_Gender" value="<?php echo $gender?>" readonly >
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">DOB</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Patient_DOB" value="<?php echo $dob?>"readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Age</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Patient_Age" value="<?php echo $age?>"readonly>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
        
    }elseif ($_SESSION["user"] == "Doctor") {
    //read the row of the selected client from the database table 
$sql = $conn->prepare("SELECT * FROM doctors WHERE `Doctor_SSN` = ?");
$sql->bind_param("i", $ID);
$sql->execute();
$row = $sql->get_result()->fetch_assoc();

if (!$row) {
    header("location: doctorView.php");
    exit;
}


$ID = $row["Doctor_SSN"];
$name = $row["Doctor_Name"];
$phone = $row["Doctor_Phone"];
$speciality = $row["Doctor_Speciality"];
$exp = $row["Doctor_Experience"];
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Doctor Profile</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
        <div class="logo">
            <a href="index.html">DailyPharma</a>
        </div>

        <div class="navbar">
            <nav class= navbar id="navbar">
                <a href="index.html">Home</a>
                <a href="#about">Features</a>
                <a href="#footer">Contact Us</a>
                <a href="logout.php" class="btn-login-popup" >Logout</a>                
            </nav>

        </div>

        <i class="uil uil-bars navbar-toggle" onclick="toggleOverlay()"></i>

        <div id="menu" onclick="toggleOverlay()">
            <div id="menu-content">
                <a href="index.html">Home</a>
                <a href="#about">Features</a>
                <a href="#footer">Contact Us</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>

    <div class= "container my-5">
        <h2>Doctor Information</h2>
        <div class="item"></div>
        <form method ="post">
        <div class="row mb-3">
                <label class="col-sm-3 col-form label">SSN</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Doctor_SSN" value="<?php echo $ID?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Doctor_Name" value="<?php echo $name?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Speciality</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Doctor_Speciality" value="<?php echo $speciality?>" readonly >
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Experience</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Doctor_Experience" value="<?php echo $exp?>"readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Doctor_Phone" value="<?php echo $phone?>" readonly>
                </div>
            </div>
        </form>
    </div>
</body> 
</html>   
    <?php }elseif ($_SESSION["user"] == "Pharmacy") {
        //read the row of the selected client from the database table 
$sql = $conn->prepare("SELECT * FROM pharmacy WHERE `Pharmacy_ID` = ?");
$sql->bind_param("i", $ID);
$sql->execute();
$row = $sql->get_result()->fetch_assoc();

if (!$row) {
    header("location: pharmacyView.php");
    exit;
}


$ID = $row["Pharmacy_ID"];
$name = $row["Pharmacy_Name"];
$email = $row["Pharmacy_Email"];
$phone = $row["Pharmacy_Phone"];
$address = $row["Pharmacy_Address"];

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Pharmacy Profile</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
        <div class="logo">
            <a href="index.html">DailyPharma</a>
        </div>

        <div class="navbar">
            <nav class= navbar id="navbar">
                <a href="index.html">Home</a>
                <a href="#about">Features</a>
                <a href="#footer">Contact Us</a>
                <a href="logout.php" class="btn-login-popup" >Logout</a>                
            </nav>
        </div>

        <i class="uil uil-bars navbar-toggle" onclick="toggleOverlay()"></i>

        <div id="menu" onclick="toggleOverlay()">
            <div id="menu-content">
                <a href="index.html">Home</a>
                <a href="#about">Features</a>
                <a href="#footer">Contact Us</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>

    <div class= "container my-5">
        <h2>Pharmacy Information</h2>
        <div class="item"></div>
        <form method ="post">
        <div class="row mb-3">
                <label class="col-sm-3 col-form label">ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Pharmacy_ID" value="<?php echo $ID?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Pharmacy_Name" value="<?php echo $name?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Pharmacy_Phone" value="<?php echo $phone?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Pharmacy_Email" value="<?php echo $email?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Pharmacy_Address" value="<?php echo $address?>" readonly >
                </div>
        </form>
    </div>
</body>
</html>
        
    <?php }elseif ($_SESSION["user"] == "Company") {
        //read the row of the selected client from the database table 
$sql = $conn->prepare("SELECT * FROM company WHERE `Company_ID` = ?");
$sql->bind_param("i", $ID);
$sql->execute();
$row = $sql->get_result()->fetch_assoc();

if (!$row) {
    header("location: companyView.php");
    exit;
}


$ID = $row["Company_ID"];
$name = $row["Company_Name"];
$email = $row["Company_Email"];
$phone = $row["Company_Phone"];
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPLATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Company Profile</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
        <div class="logo">
            <a href="index.html">DailyPharma</a>
        </div>

        <div class="navbar">
            <nav class= navbar id="navbar">
                <a href="index.html">Home</a>
                <a href="#about">Features</a>
                <a href="#footer">Contact Us</a>
                <a href="logout.php" class="btn-login-popup" >Logout</a>                
            </nav>

        </div>

        <i class="uil uil-bars navbar-toggle" onclick="toggleOverlay()"></i>

        <div id="menu" onclick="toggleOverlay()">
            <div id="menu-content">
                <a href="index.html">Home</a>
                <a href="#about">Features</a>
                <a href="#footer">Contact Us</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>
    <div class= "container my-5">
        <h2>Company Information</h2>
        <div class="item"></div>

        <form method ="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">ID</label>
                <div class="col-sm-6">
                <input type="number" class="form-control" name="Company_ID" value="<?php echo $ID; ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Company_Name" value="<?php echo $name?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Company_Email" value="<?php echo $email?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Company_Phone" value="<?php echo $phone?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <a class="btn btn-primary" href="companyView.php" role="button">Back</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
        
<?php } }?>