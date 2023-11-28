const express=require('express');
const cors=require('cors');
const app=express();
const bodyParser = require('body-parser');
const authRoutes = require('./api_auth');
app.use(cors());
app.use(bodyParser.json());
app.get('/',(req,res)=>{
    res.sendFile(__dirname+'/regiater.html');

});
app.use('/api',authRoutes);
const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});