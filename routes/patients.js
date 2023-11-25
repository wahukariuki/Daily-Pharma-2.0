const express = require('express')
const router = express.Router()
const mysql2 = require('mysql2')

//Creating a connection to our database
const connection = mysql2.createConnection({
    host: "localhost",
    user : "root",
    password: "",
    database: "dailypharma2" 
})

try {
    connection.connect()
} catch (e) {
    console.log("Connection to MySQL failed!")
    console.log(e)
}

//Get list of all patients
router.get('/', (req,res)=>{
    connection.query("SELECT `Patient_SSN`, `Patient_Name`, `Patient_Address`, `Patient_Email`, `Patient_Phone`, `Patient_Gender`, `Patient_DOB`, `Patient_Age`, `Status` FROM `patients`",  [], (error,results)=>{
        if (error) return res.json({error: error})
        res.json(results)
    })
    //res.json(users)
})

//Get patients by ssn
router.get('/ssn/:ssn', (req,res)=>{
    console.log(req.params.ssn)

    connection.query("SELECT `Patient_SSN`, `Patient_Name`, `Patient_Address`, `Patient_Email`, `Patient_Phone`, `Patient_Gender`, `Patient_DOB`, `Patient_Age`, `Status` FROM `patients` WHERE `Patient_SSN`= ? ",  [req.params.ssn], (error,results)=>{
        if (error) return res.json({error: error})
        res.json(results)
    })
    //res.json(users)
})


//Get patients by email
router.get('/email/:email', (req,res)=>{
    console.log(req.params.email)

    connection.query("SELECT `Patient_SSN`, `Patient_Name`, `Patient_Address`, `Patient_Email`, `Patient_Phone`, `Patient_Gender`, `Patient_DOB`, `Patient_Age`, `Status` FROM `patients` WHERE `Patient_Email`= ? ",  [req.params.email], (error,results)=>{
        if (error) return res.json({error: error})
        res.json(results)
    })
    //res.json(users)
})

//Get patients by gender
router.get('/gender/:gender', (req,res)=>{
    console.log(req.params.gender)

    connection.query("SELECT `Patient_SSN`, `Patient_Name`, `Patient_Address`, `Patient_Email`, `Patient_Phone`, `Patient_Gender`, `Patient_DOB`, `Patient_Age`, `Status` FROM `patients` WHERE `Patient_Gender`= ? ",  [req.params.gender], (error,results)=>{
        if (error) return res.json({error: error})
        res.json(results)
    })
    //res.json(users)
})


//Get patients by last login time




//Get patients by drug purchased
router.get('/drug/:drug', (req,res)=>{
    console.log(req.params.drug)

    if (!isNaN(parseInt(req.params.drug))) {
        connection.query(
            "SELECT p.`Patient_SSN`, p.`Patient_Name`, p.`Patient_Address`, p.`Patient_Email`, p.`Patient_Phone`, p.`Patient_Gender`, p.`Patient_DOB`, p.`Patient_Age`, p.`Status` FROM `patients` p INNER JOIN prescriptions pr ON p.Patient_SSN = pr.Patient_SSN INNER JOIN drugs d ON pr.Drug_ID = d.Drug_ID WHERE d.Drug_ID = ? AND pr.Prescribed = 'Y'",
            [req.params.drug],
            (error,results)=>{
            if (error) return res.json({error: error})
            res.json(results)
        })

      } else {
        connection.query(
            "SELECT p.`Patient_SSN`, p.`Patient_Name`, p.`Patient_Address`, p.`Patient_Email`, p.`Patient_Phone`, p.`Patient_Gender`, p.`Patient_DOB`, p.`Patient_Age`, p.`Status` FROM `patients` p INNER JOIN prescriptions pr ON p.Patient_SSN = pr.Patient_SSN INNER JOIN drugs d ON pr.Drug_ID = d.Drug_ID WHERE d.Drug_Name = ? AND pr.Prescribed = 'Y'",
            [req.params.drug],
            (error,results)=>{
            if (error) return res.json({error: error})
            res.json(results)
        })
      }
})

//Get patients by date of drug purchase






module.exports = router