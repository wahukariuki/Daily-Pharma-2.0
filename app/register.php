<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Registration Page</title>
</head>
<body class="Register">

    <!--Header-->
    <header>
        <div class="logo">
            <a href="index.html">DailyPharma</a>
        </div>

        <nav class= navbar id="navbar">
            <a href="index.html">Home</a>
            <a href="index.html#service">About Us</a>
            <a href="index.html#feature">Features</a>
            <a href="index.html#testimonials">Testimonials</a>
            <a href="index.html#footer">Contact Us</a>
            <a href="login.html" class="btn-login-popup" >Login</a>
        </nav>

        <i class="uil uil-bars navbar-toggle" onclick="toggleOverlay()"></i>

        <div id="menu" onclick="toggleOverlay()">
            <div id="menu-content">
                <a href="index.html">Home</a>
                <a href="index.html#service">About Us</a>
                <a href="index.html#feature">Features</a>
                <a href="index.html#testimonials">Testimonials</a>
                <a href="index.html#footer">Contact Us</a>
                <a href="login.html">Login</a>
            </div>
        </div>
    </header>

    <!--Dynamic Register Form-->

    <div class="wrapper">

        <div class="title-text">
            <h1>Registration</h1>
        </div>

        <div class="users">
            <button class="patient_r">Patient</button>
            <button class="doctor_r">Doctor</button>
            <button class="pharmacy_r">Pharmacy</button>
            <button class="company_r">Company</button>
        </div>

        <div class="form">
            <form action="register.php" class="register_patient" method="post" name="register_patient">
            <input type="hidden" name="register_patient" value="1">

                <div class="input-box">
                    <label >SSN</label>
                    <input type="text" name="Patient_SSN" required>
                </div>
                <div class="input-box">
                    <label>Name</label>
                    <input type="text" name="Patient_Name" required>
                </div>
                <div class="input-box">
                    <label >Email</label>
                    <input type="email" name="Patient_Email" required>
                </div>
                <div class="input-box">
                    <label>Phone</label>
                    <input type="tel" name="Patient_Phone" required>
                </div>
                <div class="input-box">
                    <label for="gender">Gender</label>
                    <select name="Patient_Gender" id="gender">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                    </select>
                </div>
                <div class="input-box">
                    <label >Address</label>
                    <input type="text" name="Patient_Address" required>
                </div>
                <div class="input-box">
                    <label>Date of Birth</label>
                    <input type="date" name="Patient_DOB" required>
                </div>
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="Password" required>
                </div>
                <div class="input-box">
                    <label>Confirm </label>
                    <input type="password" name="Confirm_Password" required>
                </div>

                <div class="link">
                    Have an account? -> <a href="login.html">Login</a>
                </div>
                
                <button type="submit" class="registerbtn">Register</button>
            </form>
    
            <form action="register.php" class="register_doctor" method="post" name="register_doctor">
            <input type="hidden" name="register_doctor" value="1">

                <div class="input-box">
                    <label >SSN</label>
                    <input type="text" name="Doctor_SSN" required>
                </div>
                <div class="input-box">
                    <label>Name</label>
                    <input type="text" name="Doctor_Name" required>
                </div>
                <div class="input-box">
                    <label>Phone</label>
                    <input type="tel" name="Doctor_Phone" required>
                </div>
                <div class="input-box">
                    <label >Speciality</label>
                    <input type="text" name="Doctor_Speciality" required>
                </div>
                <div class="input-box">
                    <label>Experience</label>
                    <input type="date" name="Doctor_Experience" required>
                </div>
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="Password" required>
                </div>
                <div class="input-box">
                    <label>Confirm </label>
                    <input type="password" name="Confirm_Password" required>
                </div>

                
                <div class="link">
                    Have an account? -> <a href="login.html">Login</a>
                </div>
                <button type="submit" class="registerbtn">Register</button>
            </form>
    
            <form action="register.php" class="register_pharmacy" method="post" name="register_pharmacy">
            <input type="hidden" name="register_pharmacy" value="1">

                <div class="input-box">
                    <label>Name</label>
                    <input type="text" name="Pharmacy_Name">
                </div>
                <div class="input-box">
                    <label>Email</label>
                    <input type="email" name="Pharmacy_Email">
                </div>
                <div class="input-box">
                    <label>Phone</label>
                    <input type="tel" name="Pharmacy_Phone">
                </div>
                <div class="input-box">
                    <label >Address</label>
                    <input type="text" name="Pharmacy_Address">
                </div>
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="Password">
                </div>
                <div class="input-box">
                    <label>Confirm </label>
                    <input type="password" name="Confirm_Password">
                </div>


                <div class="link">
                    Have an account? -> <a href="login.html">Login</a>
                </div>
                <button type="submit" class="registerbtn">Register</button>
            </form>
    
            <form action="register.php" class="register_company" method="post" name="register_company">
            <input type="hidden" name="register_company" value="1">

                <div class="input-box">
                    <label>Name</label>
                    <input type="text" name="Company_Name">
                </div>
                <div class="input-box">
                    <label >Email</label>
                    <input type="email" name="Company_Email">
                </div>
                <div class="input-box">
                    <label >Email</label>
                    <input type="tel" name="Company_Phone">
                </div>
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="Password">
                </div>
                <div class="input-box">
                    <label>Confirm </label>
                    <input type="password" name="Confirm_Password">
                </div>

                <div class="link">
                    Have an account? -> <a href="login.html">Login</a>
                </div>
                <button type="submit" class="registerbtn">Register</button>
            </form>
        </div>
    </div>
    <script src="overlay_script.js"></script>
    <script src="registration_script.js"></script>

</body>
</html>
<?php
include "connect.php";

// Function to handle patient registration
function registerPatient($conn) {
    // Function to calculate age from date of birth
function calculateAge($dob) {
    $currentYear = date("Y");
    $birthYear = date("Y", strtotime($dob));
    return $currentYear - $birthYear;
}

// Initialize the error message
$error = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and retrieve form data
    $patientSSN = trim($_POST['Patient_SSN']);
    $patientName = trim($_POST['Patient_Name']);
    $patientAddress = trim($_POST['Patient_Address']);
    $patientEmail = trim($_POST['Patient_Email']);
    $patientPhone = trim($_POST['Patient_Phone']);
    $patientGender = trim($_POST['Patient_Gender']);
    $patientDOB = trim($_POST['Patient_DOB']);
    $password = trim($_POST['Password']);
    $confirmPassword = trim($_POST['Confirm_Password']);

    // Validate the form data (you can add more validation if needed)
    if (empty($patientSSN) || empty($patientName) || empty($patientAddress) || empty($patientEmail) || empty($patientPhone) || empty($patientGender) || empty($patientDOB) || empty($password) || empty($confirmPassword)) {
        $error = 'Please fill in all the required fields.';
    } elseif ($password !== $confirmPassword) {
        $error = 'Password and Confirm Password do not match.';
    }

    if (empty($error)) {
        // Calculate the patient's age
        $patientAge = calculateAge($patientDOB);

        // Prepare and execute the database insert statement
        $query = $conn->prepare("INSERT INTO `patients`(`Patient_SSN`, `Patient_Name`, `Patient_Address`, `Patient_Email`, `Patient_Phone`, `Patient_Gender`, `Patient_DOB`, `Patient_Age`, `Password`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param('isssissss', $patientSSN, $patientName, $patientAddress, $patientEmail, $patientPhone, $patientGender, $patientDOB, $patientAge, $password);
        if ($query->execute()) {
            echo "<script>alert('Successful Patient Registration'); window.location.href = 'login.html';</script>";
        } else {
            $error = 'Error registering the user. Please try again later.';
        }
        $query->close();
    } 
}

if(!empty($error)){
    // Display the error message as an alert
    echo "<script>alert('$error');</script>";
    echo "<script>window.location.href = 'register.php';</script>";
    exit;
}
}

// Function to handle doctor registration
function registerDoctor($conn) {

    function calculateExp($exp) {
        $currentYear = date("Y");
        $startYear = date("Y", strtotime($exp));
        return $currentYear - $startYear;
    }
    
    // Initialize the error message
    $error = '';
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
             // Sanitize and retrieve form data
        $doctorSSN = trim($_POST['Doctor_SSN']);
        $doctorName = trim($_POST['Doctor_Name']);
        $doctorPhone = trim($_POST['Doctor_Phone']);
        $doctorSpeciality = trim($_POST['Doctor_Speciality']);
        $doctorExperience = trim($_POST['Doctor_Experience']);
        $password = trim($_POST['Password']);
        $confirmPassword = trim($_POST['Confirm_Password']);
    
        // Validate the form data (you can add more validation if needed)
        if (empty($doctorSSN) || empty($doctorName) || empty($doctorPhone) || empty($doctorSpeciality) || empty($doctorExperience) || empty($password) || empty($confirmPassword)) {
            $error = 'Please fill in all the required fields.';
        } elseif ($password !== $confirmPassword) {
            $error = 'Password and Confirm Password do not match.';
        }
    
        if (empty($error)) {
            // Calculate the patient's age
            $doctorExp = calculateExp($doctorExperience);
    
            // Prepare and execute the database insert statement
            $query = $conn->prepare("INSERT INTO `doctors`(`Doctor_SSN`, `Doctor_Name`, `Doctor_Phone`, `Doctor_Speciality`, `Doctor_Experience`, `Password`) VALUES (?, ?, ?, ?, ?, ?)");
            $query->bind_param('ssssis', $doctorSSN, $doctorName, $doctorPhone, $doctorSpeciality, $doctorExperience, $password);
            if ($query->execute()) {
                echo "<script>alert('Successful Doctor Registration'); window.location.href = 'login.html';</script>";

            } else {
                $error = 'Error registering the user. Please try again later.';
            }
            $query->close();
        }
    } 
    
    if(!empty($error)){
        // Display the error message as an alert
        echo "<script>alert('$error');</script>";
        echo "<script>window.location.href = 'register.php';</script>";
        exit;
    }
    }

// Function to handle pharmacy registration
function registerPharmacy($conn) {

// Initialize the error message
$error = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
         // Sanitize and retrieve form data
    $pharmacyName = trim($_POST['Pharmacy_Name']);
    $pharmacyAddress = trim($_POST['Pharmacy_Address']);
    $pharmacyEmail = trim($_POST['Pharmacy_Email']);
    $pharmacyPhone = trim($_POST['Pharmacy_Phone']);
    $password = trim($_POST['Password']);
    $confirmPassword = trim($_POST['Confirm_Password']);

    // Validate the form data (you can add more validation if needed)
    if (empty($pharmacyName) || empty($pharmacyAddress) || empty($pharmacyEmail) || empty($pharmacyPhone) || empty($password) || empty($confirmPassword)) {
        $error = 'Please fill in all the required fields.';
    } elseif ($password !== $confirmPassword) {
        $error = 'Password and Confirm Password do not match.';
    }

    if (empty($error)) {
        // Prepare and execute the database insert statement
        $query = $conn->prepare("INSERT INTO `pharmacy`(`Pharmacy_Name`, `Pharmacy_Email`, `Pharmacy_Phone`, `Pharmacy_Address`, `Password`) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param('ssiss', $pharmacyName, $pharmacyEmail, $pharmacyPhone, $pharmacyAddress, $password);
        if ($query->execute()) {
            $pharmacyID = mysqli_insert_id($conn);
            echo "<script>alert('Successful Pharmacy Registration.\nYour Pharmacy ID: $pharmacyID'); window.location.href = 'register.php';</script>";
        } else {
            $error = 'Error registering the user. Please try again later.';
        }
        $query->close();
    }
} 

if(!empty($error)){
    echo "<script>alert('$error');</script>";
    echo "<script>window.location.href = 'register.php';</script>";
    exit;
}
}

// Function to handle company registration
function registerCompany($conn) {

// Initialize the error message
$error = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
         // Sanitize and retrieve form data
         
    $companyName = trim($_POST['Company_Name']);
    $companyEmail = trim($_POST['Company_Email']);
    $companyPhone = trim($_POST['Company_Phone']);
    $password = trim($_POST['Password']);
    $confirmPassword = trim($_POST['Confirm_Password']);

    // Validate the form data (you can add more validation if needed)
    if (empty($companyName) || empty($companyEmail) || empty($companyPhone) || empty($password) || empty($confirmPassword)) {
        $error = 'Please fill in all the required fields.';
    } elseif ($password !== $confirmPassword) {
        $error = 'Password and Confirm Password do not match.';
    }

    if (empty($error)) {
        // Prepare and execute the database insert statement
        $query = $conn->prepare("INSERT INTO `company`(`Company_Name`, `Company_Email`, `Company_Phone`, `Password`) VALUES  (?, ?, ?, ?)");
        $query->bind_param('ssis', $companyName, $companyEmail, $companyPhone, $password);
        if ($query->execute()) {
            $companyID = mysqli_insert_id($conn);
            echo "<script>alert('Successful Company Registration.\nYour Company ID: $companyID'); window.location.href = 'login.html';</script>";
            ;
        } else {
            $error = 'Error registering the user. Please try again later.';
        }
        $query->close();
    }
}

if(!empty($error)){
    // Display the error message as an alert
    echo "<script>alert('$error');</script>";
    echo "<script>window.location.href = 'register.php';</script>";
    exit;
}
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["register_patient"])) {
        registerPatient($conn);
    } elseif (isset($_POST["register_doctor"])) {
        registerDoctor($conn);
    } elseif (isset($_POST["register_pharmacy"])) {
        registerPharmacy($conn);
    } elseif (isset($_POST["register_company"])) {
        registerCompany($conn);
    }
}

?>

