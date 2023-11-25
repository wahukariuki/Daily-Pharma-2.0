const express = require('express')
const router = express.Router()
const mysql2 = require('mysql2')

const users = []

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

//Get list of all doctors
router.get('/', (req,res)=>{
    connection.query("SELECT `Doctor_SSN`, `Doctor_Name`, `Doctor_Phone`, `Doctor_Speciality`, `Doctor_Experience`,`Status` FROM `doctors`",  [], (error,results)=>{
        if (error) return res.json({error: error})
        res.json(results)
    })
    //res.json(users)
})

//Get doctors by ssn
router.get('/ssn/:ssn', (req,res)=>{
    console.log(req.params.ssn)
    connection.query("SELECT `Doctor_SSN`, `Doctor_Name`, `Doctor_Phone`, `Doctor_Speciality`, `Doctor_Experience`,`Status` FROM `doctors` WHERE `Doctor_SSN` = ? ",
    [req.params.ssn],
    (error,results)=>{
        if (error) return res.json({error: error})
        res.json(results)
    })
    //res.json(users)
})

//Get doctors by speciality
router.get('/speciality/:speciality', (req,res)=>{
    console.log(req.params.speciality)
    connection.query("SELECT `Doctor_SSN`, `Doctor_Name`, `Doctor_Phone`, `Doctor_Speciality`, `Doctor_Experience`,`Status` FROM `doctors` WHERE `Doctor_Speciality` = ? ",
    [req.params.speciality],
    (error,results)=>{
        if (error) return res.json({error: error})
        res.json(results)
    })
    //res.json(users)
})

//Get doctors by experience
router.get('/experience/:experience', (req,res)=>{
    console.log(req.params.experience)
    connection.query("SELECT `Doctor_SSN`, `Doctor_Name`, `Doctor_Phone`, `Doctor_Speciality`, `Doctor_Experience`,`Status` FROM `doctors` WHERE `Doctor_Experience` = ? ",
    [req.params.experience],
    (error,results)=>{
        if (error) return res.json({error: error})
        res.json(results)
    })
    //res.json(users)
})

//Get users by last login time

module.exports = router
