const express=require('express');
const router=express.Router();
const bycrypt=require('bcrypt');
const jwt=require('jsonwebtoken');
const db=require('api_data');
const dbApiAccess=require('api_access');
const dbApiAccessRequest=require('api_access-request');

router.post('/register',async(req,res) =>{
    try{
        const{id_ssn,User_type,password}=req.body;
        const hashedPassword = await bcrypt.hash(Password, 10);
        const insertApiAccessQuery=`INSERT INTO api_access(id_ssn, User_type, Drugs, Patients, Doctors, Pharmacies, Company, Password, token, specific_token) 
        VALUES(?, ?, 'pending', 'pending', 'pending', 'pending', 'pending', ?, 'pending', 'pending')`;
        dbApiAccess.query(insertApiAccessQuery,[id_ssn,User_type,hashedPassword],(errApiAccess)=>
        {
            if(errApiAccess){
                console.errot('Error inserting data into api_access table:', errApiAccess);
                res.status(500).json({error:'Internal server error'});
            }else{
                const insertApiAccessRequestQuery = `
          INSERT INTO api_access_request (ID_SSN, User_type, Resource_requested)
          VALUES (?, ?, 'pending')
        `;
        dbApiAccessRequest.query(insertApiAccessRequestQuery,[id_ssn,User_type],(errApiAccessRequest)=>{
            if(errApiAccessRequest){
                console.error('Error inserting data into api_access_request table',errApiAccessRequest);
                res.status(500).json({error:'Internal server'});

            }else{
                res.status(201).json({message:'User registered succesfully'});
            }
        });
            }
        });
    }catch (error) {
        console.error(error);
        res.status(500).json({ error: 'Internal server error' });
      }
});
module.exports = router;