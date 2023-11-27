require('dotenv').config()

const express = require('express')
const path = require('path')
const bcrypt = require('bcrypt')
const mysql2 = require('mysql2')
const jwt = require('jsonwebtoken')
const app = express()

const patientRoute = require('./routes/patients')
const doctorRoute = require('./routes/doctors')
const pharmacyRoute = require('./routes/pharmacy')
const companyRoute = require('./routes/company')
const drugRoute = require('./routes/drugs')
app.use('/patients', patientRoute)
app.use('/doctors', doctorRoute)
app.use('/pharmacy', pharmacyRoute)
app.use('/company', companyRoute)
app.use('/drugs', drugRoute)

const users = []
let refreshTokens = []

app.use(express.static(path.join(__dirname, 'public'))) // Acess the right folder
app.use(express.json()) // Alloww express to send json


app.listen(3000 , ()=>{
    console.log("API up and running")
})

//Beginning to add the databse
app.get('/users', authenticateToken ,(req,res)=>{
    res.json(users.filter(user => user.name == req.user.name ))
})

app.post('/users', async (req,res)=>{
    // const user = { name: req.body.name, password: req.body.password}
    // users.push(user) 
    // res.status(201).send()
    try{
        await bcrypt.genSalt()
        const hashedPassword = await bcrypt.hash(req.body.password, 10)
        let user = { name : req.body.name, password : hashedPassword}
        users.push(user)
        res.sendStatus(201).send()
    }catch{
        res.sendStatus(500).send()
    }    
})

app.post('/users/login', async (req,res)=>{
    //User Authentication
    const user = users.find(user => user.name == req.body.name)
    if (user == null) return res.sendStatus(400).send("Cannot find user")
    try{
        if(await bcrypt.compare(req.body.password, user.password)){

            const accessToken = generateAccessToken(user)
            const refreshToken = jwt.sign(user, process.env.REFRESH_TOKEN_SECRET)
            refreshTokens.push(refreshToken)
            res.json({accessToken : accessToken, refreshToken : refreshToken})

        }else{
            res.send("NOT ALLOWED")
        }
    }catch{
        res.sendStatus(500).send()
    }     
})

app.post('/token',(req,res)=>{
    const refreshToken = req.body.token
    if (refreshToken == null) return res.sendStatus(401)
    if (!refreshTokens.includes(refreshToken)) return res.sendStatus(401)
    jwt.verify(refreshToken, process.env.REFRESH_TOKEN_SECRET, (err,user)=>{
        if(err) return res.sendStatus(403)
        const accessToken = generateAccessToken({name : user.name})
        res.json({accessToken : accessToken})

    })
})

app.delete('/logout',(req,res)=>{
    refreshTokens = refreshTokens.filter(token => token!=req.body.token)
    res.sendStatus(204)
})

function authenticateToken(req,res,next){
    const authHeader = req.headers['authorization']
    const token = authHeader && authHeader.split(' ')[1]
    if(token == null) return res.sendStatus(401)
    jwt.verify(token, process.env.ACCESS_TOKEN_SECRET, (err,user)=>{
        if (err) return res.sendStatus(403)
        req.user = user
        next()
    })
}

function generateAccessToken(user){
    return jwt.sign(user, process.env.ACCESS_TOKEN_SECRET, {expiresIn : '1m'})
}

//Adding access system