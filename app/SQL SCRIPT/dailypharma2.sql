-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 08:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dailypharma2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(10) NOT NULL,
  `Admin_Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Admin_Name`, `Password`, `Status`) VALUES
(1, 'John', 'password1', 'Pending'),
(2, 'Jane', 'password2', 'Deactivated'),
(3, 'Lance', '123yy', 'active'),
(4, 'admin1', '11111', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `api_access`
--

CREATE TABLE `api_access` (
  `ID/SSN` int(11) NOT NULL,
  `User_type` varchar(100) NOT NULL,
  `Drugs` varchar(100) NOT NULL,
  `Patients` varchar(100) NOT NULL,
  `Doctors` varchar(100) NOT NULL,
  `Pharmacies` varchar(100) NOT NULL,
  `Company` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `api_access_request`
--

CREATE TABLE `api_access_request` (
  `ID/SSN` int(11) NOT NULL,
  `User_type` varchar(100) NOT NULL,
  `Resouce_requested` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Company_ID` int(10) NOT NULL,
  `Company_Name` varchar(50) NOT NULL,
  `Company_Email` varchar(50) NOT NULL,
  `Company_Phone` int(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Company_ID`, `Company_Name`, `Company_Email`, `Company_Phone`, `Password`, `Status`) VALUES
(1, 'ABC Pharmaceuticals', 'abcpharma@gmail.com', 1234567890, 'password123', 'Active'),
(2, 'XYZ Pharmaceuticals', 'xyzpharma@gmail.com', 2147483647, 'password456', 'active'),
(3, 'PQR Pharmaceuticals', 'pqrpharma@gmail.com', 1112223333, 'password789', 'Pending'),
(4, 'DEF Pharmaceuticals', 'defpharma@gmail.com', 2147483647, 'passwordabc', 'active'),
(5, 'GHI Pharmaceuticals', 'ghipharma@gmail.com', 2147483647, 'passwordxyz', 'active'),
(6, 'Strathmore University', 'arnold.oketch@strathmore.edu', 705378979, '123123', 'active'),
(7, 'Pharmagen', 'pharmagen@med.com', 9876543, 'passwordxyz', 'Pending'),
(8, 'HealthMeds', 'healthmeds@gmail.org', 45789654, 'passwordxyz', 'Pending'),
(9, 'Pharmaco Inc.', 'pharmaco.inc@yahoo.net', 2147483647, 'passwordxyz', 'Pending'),
(10, 'Strathmore University', 'arnold.oketch@strathmore.edu', 705378979, '123123', 'Pending'),
(11, 'Pfizer', 'torienmwaura@gmail.com', 793467875, '12345', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `Contract_ID` int(10) NOT NULL,
  `Pharmacy_ID` int(10) NOT NULL,
  `Company_ID` int(10) NOT NULL,
  `Supervisor_ID` int(10) NOT NULL,
  `Start_Date` date DEFAULT current_timestamp(),
  `End_Date` date DEFAULT current_timestamp(),
  `Status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`Contract_ID`, `Pharmacy_ID`, `Company_ID`, `Supervisor_ID`, `Start_Date`, `End_Date`, `Status`) VALUES
(1, 1, 1, 1, '2023-01-01', '2023-12-31', 'Active'),
(2, 2, 2, 2, '2023-03-15', '2024-03-14', 'Pending'),
(3, 3, 3, 3, '2023-06-01', '2024-05-31', 'Active'),
(4, 4, 4, 4, '2023-09-15', '2024-09-14', 'Pending'),
(5, 5, 5, 5, '2024-01-01', '2024-12-31', 'Active'),
(8, 5, 1, 6, '2023-07-20', '2024-01-20', 'Pending'),
(9, 9, 1, 5, '2023-07-21', '2024-01-21', 'Pending'),
(10, 9, 2, 5, '2023-07-21', '2024-01-21', 'Pending'),
(11, 1, 2, 3, '2023-07-27', '2024-01-27', 'Pending'),
(12, 6, 8, 15, '2023-07-28', '2024-01-28', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `Doctor_SSN` int(10) NOT NULL,
  `Doctor_Name` varchar(20) NOT NULL,
  `Doctor_Phone` int(20) NOT NULL,
  `Doctor_Speciality` varchar(20) NOT NULL,
  `Doctor_Experience` int(3) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Doctor_SSN`, `Doctor_Name`, `Doctor_Phone`, `Doctor_Speciality`, `Doctor_Experience`, `Password`, `Status`) VALUES
(1, 'doctor1', 1111111, 'Pedeatrician', 2022, '11111', 'active'),
(24, 'Dr. Michael', 2147483647, 'Pediatrics', 10, 'password1', 'Active'),
(25, 'Dr. Sarah', 1112223333, 'Orthopedic', 11, 'password2', 'Pending'),
(26, 'Dr. Christopher', 1112223333, 'Orthopedic', 5, 'password3', 'Pending'),
(27, 'Dr. Olivia', 147483647, 'Neurosurgeon', 3, 'password4', 'Pending'),
(42, 'Rewel', 12103923, 'Residency', 1, '123yy', 'active'),
(43, 'Dr. Emily', 2147483647, 'Dermatology', 8, 'password6', 'active'),
(44, 'Dr. Daniel', 1112223333, 'Cardiology', 15, 'password7', 'active'),
(45, 'Dr. Jessica', 1112223333, 'Gastroenterology', 7, 'password8', 'active'),
(46, 'Dr. Andrew', 147483647, 'Psychiatry', 9, 'password9', 'active'),
(47, 'Dr. James', 12103923, 'Family Medicine', 12, 'password10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `Drug_ID` int(10) NOT NULL,
  `Drug_Name` varchar(50) NOT NULL,
  `Drug_Description` varchar(200) DEFAULT NULL,
  `Drug_Category` varchar(100) NOT NULL,
  `Drug_Image` longblob DEFAULT NULL,
  `Drug_Quantity` int(4) NOT NULL,
  `Drug_Expiration_Date` date DEFAULT NULL,
  `Drug_Manufacturing_Date` date DEFAULT NULL,
  `Drug_Company` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`Drug_ID`, `Drug_Name`, `Drug_Description`, `Drug_Category`, `Drug_Image`, `Drug_Quantity`, `Drug_Expiration_Date`, `Drug_Manufacturing_Date`, `Drug_Company`) VALUES
(1, 'Aspirin', 'Pain reliever and fever reducer', 'Analgesic', NULL, 100, '2024-12-31', '2022-01-15', 0),
(2, 'Ibuprofen', 'Nonsteroidal anti-inflammatory drug', 'Analgesic', NULL, 75, '2024-11-30', '2022-03-10', 0),
(3, 'Acetaminophen', 'Commonly used for pain and fever', 'Analgesic', NULL, 90, '2024-10-31', '2022-02-20', 0),
(4, 'Naproxen', 'Pain relief and anti-inflammatory', 'Analgesic', NULL, 60, '2024-09-30', '2022-05-25', 0),
(5, 'Codeine', 'Prescription pain medication', 'Analgesic', NULL, 30, '2024-08-31', '2022-04-15', 0),
(6, 'Amoxicillin', 'Antibiotic used to treat bacterial infections', 'Antibiotic', NULL, 50, '2023-09-30', '2021-05-20', 0),
(7, 'Ciprofloxacin', 'Broad-spectrum antibiotic', 'Antibiotic', NULL, 40, '2023-07-31', '2021-06-05', 0),
(8, 'Azithromycin', 'Used for respiratory and skin infections', 'Antibiotic', NULL, 65, '2023-06-30', '2021-08-10', 0),
(9, 'Doxycycline', 'Effective against various infections', 'Antibiotic', NULL, 80, '2023-05-31', '2021-07-15', 0),
(10, 'Penicillin', 'First antibiotic discovered', 'Antibiotic', NULL, 55, '2023-04-30', '2021-09-20', 0),
(11, 'Lisinopril', 'Blood pressure medication', 'Antihypertensive', NULL, 75, '2023-11-30', '2020-12-10', 0),
(12, 'Amlodipine', 'Used to treat high blood pressure', 'Antihypertensive', NULL, 70, '2023-10-31', '2020-11-05', 0),
(13, 'Losartan', 'Angiotensin receptor blocker', 'Antihypertensive', NULL, 60, '2023-08-31', '2020-10-15', 0),
(14, 'Hydrochlorothiazide', 'Diuretic and antihypertensive', 'Antihypertensive', NULL, 85, '2023-07-31', '2020-09-20', 0),
(15, 'Metoprolol', 'Beta-blocker for high blood pressure', 'Antihypertensive', NULL, 95, '2023-06-30', '2020-08-25', 0),
(16, 'Atorvastatin', 'Cholesterol-lowering medication', 'Antilipidemic', NULL, 60, '2023-08-31', '2021-03-05', 0),
(17, 'Simvastatin', 'HMG-CoA reductase inhibitor', 'Antilipidemic', NULL, 55, '2023-07-31', '2021-04-10', 0),
(18, 'Ezetimibe', 'Lowers cholesterol absorption', 'Antilipidemic', NULL, 45, '2023-06-30', '2021-02-15', 0),
(19, 'Fenofibrate', 'Reduces triglycerides and cholesterol', 'Antilipidemic', NULL, 75, '2023-05-31', '2021-01-20', 0),
(20, 'Rosuvastatin', 'Statins for cholesterol control', 'Antilipidemic', NULL, 70, '2023-04-30', '2021-06-25', 0),
(21, 'Sertraline', 'Selective serotonin reuptake inhibitor', 'Antidepressant', NULL, 80, '2023-10-31', '2021-07-15', 0),
(22, 'Fluoxetine', 'Used to treat depression and anxiety', 'Antidepressant', NULL, 90, '2023-09-30', '2021-09-05', 0),
(23, 'Escitalopram', 'SSRI for mood disorders', 'Antidepressant', NULL, 70, '2023-08-31', '2021-08-20', 0),
(24, 'Bupropion', 'Atypical antidepressant', 'Antidepressant', NULL, 60, '2023-07-31', '2021-08-05', 0),
(25, 'Venlafaxine', 'Serotonin-norepinephrine reuptake inhibitor', 'Antidepressant', NULL, 50, '2023-06-30', '2021-07-25', 0),
(26, 'Metformin', 'Oral medication for type 2 diabetes', 'Antidiabetic', NULL, 100, '2023-12-31', '2020-11-15', 0),
(27, 'Insulin Glargine', 'Long-acting insulin', 'Antidiabetic', NULL, 85, '2023-11-30', '2020-10-10', 0),
(28, 'Sitagliptin', 'Dipeptidyl peptidase-4 inhibitor', 'Antidiabetic', NULL, 70, '2023-10-31', '2020-09-05', 0),
(29, 'Gliclazide', 'Sulfonylurea for diabetes', 'Antidiabetic', NULL, 75, '2023-09-30', '2020-08-20', 0),
(30, 'Empagliflozin', 'SGLT2 inhibitor', 'Antidiabetic', NULL, 65, '2023-08-31', '2020-07-25', 0),
(31, 'Cetirizine', 'Second-generation antihistamine', 'Antihistamine', NULL, 120, '2024-10-31', '2022-06-12', 0),
(32, 'Diphenhydramine', 'Commonly used for allergies', 'Antihistamine', NULL, 100, '2024-09-30', '2022-04-25', 0),
(33, 'Loratadine', 'Non-drowsy allergy relief', 'Antihistamine', NULL, 80, '2024-08-31', '2022-03-20', 0),
(34, 'Fexofenadine', 'Effective against hay fever', 'Antihistamine', NULL, 60, '2024-07-31', '2022-02-15', 0),
(35, 'Desloratadine', 'Long-lasting allergy relief', 'Antihistamine', NULL, 40, '2024-06-30', '2022-01-10', 0),
(36, 'Aripiprazole', 'Atypical antipsychotic', 'Antipsychotic', NULL, 70, '2023-12-31', '2020-12-15', 0),
(37, 'Risperidone', 'Used to treat schizophrenia', 'Antipsychotic', NULL, 65, '2023-11-30', '2020-11-10', 0),
(38, 'Olanzapine', 'Second-generation antipsychotic', 'Antipsychotic', NULL, 75, '2023-10-31', '2020-10-05', 0),
(39, 'Quetiapine', 'For bipolar disorder and schizophrenia', 'Antipsychotic', NULL, 85, '2023-09-30', '2020-09-20', 0),
(40, 'Haloperidol', 'Typical antipsychotic', 'Antipsychotic', NULL, 95, '2023-08-31', '2020-08-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `drug_prices`
--

CREATE TABLE `drug_prices` (
  `id` int(11) NOT NULL,
  `Drug_ID` int(11) NOT NULL,
  `Pharmacy_ID` int(11) NOT NULL,
  `Drug_Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drug_prices`
--

INSERT INTO `drug_prices` (`id`, `Drug_ID`, `Pharmacy_ID`, `Drug_Price`) VALUES
(41, 1, 1, 10.99),
(42, 2, 2, 15.50),
(45, 4, 2, 20.20),
(46, 5, 1, 12.60),
(47, 6, 2, 18.99),
(48, 7, 1, 7.50),
(49, 8, 2, 30.00),
(52, 10, 2, 9.50),
(53, 3, 6, 69.69),
(55, 4, 6, 69.00),
(57, 13, 6, 69.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(10) NOT NULL,
  `Patient_SSN` int(10) NOT NULL,
  `Drug_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `Patient_SSN`, `Drug_ID`) VALUES
(3, 25, 3),
(5, 151097, 7),
(8, 151097, 2),
(9, 151097, 2),
(11, 123, 1),
(13, 151097, 5),
(14, 1, 7),
(15, 1, 7),
(16, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `Patient_SSN` int(10) NOT NULL,
  `Patient_Name` varchar(20) NOT NULL,
  `Patient_Address` varchar(50) NOT NULL,
  `Patient_Email` varchar(50) NOT NULL,
  `Patient_Phone` int(20) NOT NULL,
  `Patient_Gender` varchar(10) NOT NULL,
  `Patient_DOB` date NOT NULL,
  `Patient_Age` int(3) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`Patient_SSN`, `Patient_Name`, `Patient_Address`, `Patient_Email`, `Patient_Phone`, `Patient_Gender`, `Patient_DOB`, `Patient_Age`, `Password`, `Status`) VALUES
(1, 'patient1', 'Manhattan', 'patient1@gmail.com', 2147483647, 'Male', '2015-07-08', 8, '11111', 'active'),
(2, 'patient2', 'Manhattan', 'patient2@gmail.com', 22222222, 'Female', '2010-06-08', 13, '22222', 'active'),
(11, 'Arnold Oguda', 'Ole Sangale Road, Madaraka Estate', 'arnold.oketch@strathmore.edu', 705378979, 'Male', '2023-08-30', 0, '123', 'active'),
(23, 'Jane', '456 Elm St', 'janesmith@yahoo.com', 2147483647, 'Female', '1992-05-10', 31, 'password1', 'Active'),
(24, 'John', '789 Oak St', 'johnsmith@gmail.com', 2147483647, 'Male', '1990-09-15', 33, 'password2', 'Pending'),
(25, 'Sarah', '123 Maple Ave', 'sarahjones@hotmail.com', 2147483647, 'Female', '1985-12-03', 38, 'password3', 'Pending'),
(26, 'Michael', '321 Pine St', 'michaeldavis@gmail.com', 2147483647, 'Male', '1995-07-20', 28, 'password4', 'Pending'),
(27, 'Emily', '567 Birch Rd', 'emilywilson@yahoo.com', 2147483647, 'Female', '1988-02-18', 33, 'password5', 'Pending'),
(28, 'David', '987 Cedar Ln', 'davidbrown@gmail.com', 2147483647, 'Male', '1993-11-29', 28, 'password6', 'Pending'),
(29, 'Jennifer', '654 Walnut Dr', 'jennifermartin@hotmail.com', 2147483647, 'Female', '1991-06-05', 30, 'password7', 'Pending'),
(30, 'Daniel', '876 Spruce St', 'danieldavis@yahoo.com', 2147483647, 'Male', '1987-09-12', 34, 'password8', 'Pending'),
(31, 'Jessica', '234 Oak St', 'jessicawilson@gmail.com', 2147483647, 'Female', '1996-04-17', 27, 'password9', 'active'),
(32, 'Christopher', '543 Maple Ave', 'christopherbrown@hotmail.com', 2147483647, 'Male', '1994-08-22', 29, 'password10', 'active'),
(33, 'Sophia', '789 Pine St', 'sophiadavis@yahoo.com', 2147483647, 'Female', '1989-03-25', 32, 'password11', 'active'),
(34, 'Andrew', '876 Birch Rd', 'andrewmartin@gmail.com', 2147483647, 'Male', '1992-10-30', 28, 'password12', 'active'),
(35, 'Olivia', '432 Cedar Ln', 'oliviabrown@hotmail.com', 2147483647, 'Female', '1990-01-07', 31, 'password13', 'active'),
(36, 'James', '678 Walnut Dr', 'jameswilson@yahoo.com', 2147483647, 'Male', '1986-06-13', 35, 'password14', 'active'),
(37, 'Ava', '987 Spruce St', 'avadavis@gmail.com', 2147483647, 'Female', '1995-03-20', 27, 'password15', 'active'),
(38, 'Emma', '345 Elm St', 'emmamartin@hotmail.com', 2147483647, 'Female', '1993-12-25', 28, 'password16', 'active'),
(123, 'patient1', 'Ole Sangale Road, Madaraka Estate', 'patient1@gmail.com', 123456789, 'Male', '1998-02-03', 25, '123456789', 'active'),
(6666, 'Arnold Oguda', 'Ole Sangale Road, Madaraka Estate', 'arnold.oketch@strathmore.edu', 705378979, 'Male', '2023-08-31', 0, '123', 'active'),
(12345, 'Arnold Oguda', 'Ole Sangale Road, Madaraka Estate', 'arnold.oketch@strathmore.edu', 705378979, 'Male', '2005-02-08', 18, 'mypassword@123', 'active'),
(22222, 'Arnold Oguda', 'Ole Sangale Road, Madaraka Estate', 'arnold.oketch@strathmore.edu', 705378979, 'Male', '2023-09-02', 0, '22222', 'active'),
(56789, 'Arnold Oguda', 'Ole Sangale Road, Madaraka Estate', 'arnold.oketch@strathmore.edu', 705378979, 'Female', '2023-03-09', 0, 'aaaaa', 'active'),
(151097, 'Conslata Barasa', 'Qwetu Hostels', 'conslata.barasa@strathmore.edu', 705378979, 'Female', '2003-04-05', 20, 'deez', 'active'),
(444444, 'Arnold Oguda', 'Ole Sangale Road, Madaraka Estate', 'arnold.oketch@strathmore.edu', 705378979, 'Male', '2019-01-29', 4, '1212', 'active'),
(5555555, 'Arnold Oguda', 'Ole Sangale Road, Madaraka Estate', 'arnold.oketch@strathmore.edu', 705378979, 'Male', '2022-06-07', 1, '1212', 'active'),
(5555556, 'Arnold Oguda', 'Ole Sangale Road, Madaraka Estate', 'arnold.oketch@strathmore.edu', 705378979, 'Male', '2022-06-07', 1, '1212', 'active'),
(44545445, 'Arnold Oguda', 'Ole Sangale Road, Madaraka Estate', 'arnold.oketch@strathmore.edu', 705378979, 'Male', '2023-07-19', 0, '1212', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `Pharmacy_ID` int(10) NOT NULL,
  `Pharmacy_Name` varchar(50) NOT NULL,
  `Pharmacy_Email` varchar(50) NOT NULL,
  `Pharmacy_Phone` int(20) NOT NULL,
  `Pharmacy_Address` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`Pharmacy_ID`, `Pharmacy_Name`, `Pharmacy_Email`, `Pharmacy_Phone`, `Pharmacy_Address`, `Password`, `Status`) VALUES
(1, 'ABC Pharmacy', 'abcpharmacy@gmail.com', 1234567890, '123 Main St', 'password123', 'Active'),
(2, 'XYZ Pharmacy', 'xyzpharmacy@gmail.com', 2147483647, '456 Elm St', 'password456', 'Pending'),
(3, 'EFG Pharmacy', 'efgpharmacy@gmail.com', 1112223333, '789 Oak St', 'password789', 'active'),
(4, 'LMN Pharmacy', 'lmnpharmacy@gmail.com', 2147483647, '321 Pine St', 'passwordabc', 'active'),
(5, 'PQR Pharmacy', 'pqrpharmacy@gmail.com', 2147483647, '654 Walnut Dr', 'passwordxyz', 'active'),
(6, 'Arnold Oguda', 'arnold.oketch@strathmore.edu', 705378979, 'Ole Sangale Road, Madaraka Estate', '123', 'active'),
(7, 'Arnold Oguda', 'arnold.oketch@strathmore.edu', 705378979, 'Ole Sangale Road, Madaraka Estate', '12345', 'Pending'),
(9, 'Pharmacist1', 'Pharmacist1@gmail.com', 11111111, 'Manhattan', '11111', 'active'),
(10, 'Arnold Oguda', 'arnold.oketch@strathmore.edu', 705378979, 'Ole Sangale Road, Madaraka Estate', '123123', 'Pending'),
(11, 'Arnold Oguda', 'arnold.oketch@strathmore.edu', 705378979, 'Ole Sangale Road, Madaraka Estate', '123', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `Prescription_ID` int(10) NOT NULL,
  `Patient_SSN` int(10) NOT NULL,
  `Doctor_SSN` int(10) NOT NULL,
  `Drug_ID` int(10) NOT NULL,
  `Prescription_Amount` varchar(50) NOT NULL,
  `Prescription_Dosage` varchar(50) NOT NULL,
  `Prescription_Instructions` varchar(200) DEFAULT NULL,
  `Prescribed` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`Prescription_ID`, `Patient_SSN`, `Doctor_SSN`, `Drug_ID`, `Prescription_Amount`, `Prescription_Dosage`, `Prescription_Instructions`, `Prescribed`) VALUES
(1, 23, 24, 1, '100 mg', '2 times daily', 'Take with water', 'N'),
(2, 23, 25, 2, '500 mg', '1 time daily', 'Take with food', 'N'),
(3, 23, 26, 3, '75 mg', '1 time daily', 'Take after meals', 'Y'),
(4, 23, 27, 4, '20 mg', '1 time daily', 'Take in the evening', 'N'),
(5, 23, 42, 5, '50 mg', '2 times daily', 'Take with or without food', 'N'),
(6, 23, 24, 6, '5 mg', '1 time daily', 'Take at the same time each day', 'N'),
(7, 23, 25, 7, '10 mg', '1 time daily', 'Take with or without food', 'N'),
(8, 23, 26, 8, '20 mg', '1 time daily', 'Take with or without food', 'N'),
(9, 23, 27, 9, '100 mg', '1 time daily', 'Take after meals', 'N'),
(10, 23, 42, 10, '10 mg', '1 time daily', 'Take with water', 'Y'),
(11, 24, 24, 1, '100 mg', '2 times daily', 'Take with water', 'Y'),
(12, 24, 25, 2, '500 mg', '1 time daily', 'Take with food', 'Y'),
(13, 24, 26, 3, '75 mg', '1 time daily', 'Take after meals', 'Y'),
(14, 24, 27, 4, '20 mg', '1 time daily', 'Take in the evening', 'Y'),
(15, 24, 42, 5, '50 mg', '2 times daily', 'Take with or without food', 'Y'),
(16, 25, 24, 6, '5 mg', '1 time daily', 'Take at the same time each day', 'Y'),
(17, 25, 25, 7, '10 mg', '1 time daily', 'Take with or without food', 'Y'),
(18, 25, 26, 8, '20 mg', '1 time daily', 'Take with or without food', 'Y'),
(19, 25, 27, 9, '100 mg', '1 time daily', 'Take after meals', 'Y'),
(20, 25, 42, 10, '10 mg', '1 time daily', 'Take with water', 'Y'),
(21, 151097, 47, 2, '50mg', '1*3', '', 'Y'),
(22, 23, 47, 9, '50mg', '1*3', '', 'Y'),
(24, 1, 1, 12, '1000mg', '1*3', '', 'Y'),
(25, 1, 1, 13, '1000mg', '1*3', 'Please take with warm water. And avoid taking with milk', 'Y'),
(26, 2, 1, 11, '500mg', ' 2 time daily', '', 'Y'),
(28, 1, 1, 13, '50mg', '1*3', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `Supervisor_ID` int(10) NOT NULL,
  `Supervisor_Name` varchar(50) NOT NULL,
  `Supervisor_Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`Supervisor_ID`, `Supervisor_Name`, `Supervisor_Email`) VALUES
(1, 'John Doe', 'john.doe@example.com'),
(2, 'Jane Smith', 'jane.smith@example.com'),
(3, 'David Johnson', 'david.johnson@example.com'),
(4, 'Sarah Wilson', 'sarah.wilson@example.com'),
(5, 'Michael Brown', 'michael.brown@example.com'),
(6, 'Emily Davis', 'emily.davis@example.com'),
(7, 'Robert Taylor', 'robert.taylor@example.com'),
(8, 'Jessica Anderson', 'jessica.anderson@example.com'),
(9, 'Christopher Lee', 'christopher.lee@example.com'),
(10, 'Amanda Martinez', 'amanda.martinez@example.com'),
(11, 'Daniel Thomas', 'daniel.thomas@example.com'),
(12, 'Olivia Clark', 'olivia.clark@example.com'),
(13, 'William Rodriguez', 'william.rodriguez@example.com'),
(14, 'Sophia Lewis', 'sophia.lewis@example.com'),
(15, 'Matthew Hernandez', 'matthew.hernandez@example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `api_access`
--
ALTER TABLE `api_access`
  ADD PRIMARY KEY (`ID/SSN`,`User_type`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Company_ID`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`Contract_ID`),
  ADD KEY `contracts_ibfk_1` (`Pharmacy_ID`),
  ADD KEY `contracts_ibfk_2` (`Company_ID`),
  ADD KEY `contracts_ibfk_3` (`Supervisor_ID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`Doctor_SSN`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`Drug_ID`),
  ADD KEY `drug-company-fk1` (`Drug_Company`);

--
-- Indexes for table `drug_prices`
--
ALTER TABLE `drug_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Drug_ID` (`Drug_ID`),
  ADD KEY `Pharmacy_ID` (`Pharmacy_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `orders_ibfk_1` (`Patient_SSN`),
  ADD KEY `orders_ibfk_2` (`Drug_ID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`Patient_SSN`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`Pharmacy_ID`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`Prescription_ID`),
  ADD KEY `prescriptions_ibfk_1` (`Patient_SSN`),
  ADD KEY `prescriptions_ibfk_2` (`Doctor_SSN`),
  ADD KEY `pres_fk_3` (`Drug_ID`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`Supervisor_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `Company_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
