<template>
    <div class="align">
        <div style="padding-top: 10px;"><input placeholder="User Id" type="number" class="inpMen" v-model="data.userid"/></div>
        <div style="padding-top: 10px;"><input placeholder="Password" type="text" class="inpMen" v-model="data.password"/></div>
        <span v-if="data.password.length < 8" style="color: red;">Password must be at least 8 characters long</span>
        <div style="padding-top: 10px;">
            <input placeholder="Job" type="radio" v-model="data.job" value="user" style="width:20px;height:20px"/><label style="padding-left:10px;padding-right:10px;font-size:18px"> User</label>
            <input placeholder="Job" type="radio" v-model="data.job" value="admin" style="width:20px;height:20px"/><label style="padding-left:10px;font-size:18px"> Admin</label>
        </div>
        
        <div style="padding-top: 10px;"><button @click="SubmitFunc" class="buttonSb">Update</button></div>
    </div>
 </template>
 
 <script>
 import axios from 'axios';
 export default {
    data()
    {
        return{
            data:{userid:null,job:"",password:""}
        }
    },
    methods:{
        async SubmitFunc()
        {
           if (this.data.userid && this.data.job && this.data.password.length>=8) {
                axios.post(`${this.$api_url}/UpdateUser`,this.data)
                .then(Response=>{
                    console.log(Response.data);
                    if(Response.data === 1){
                        location.reload();
                    }
                    else{
                        alert("operation failed!");
                    }
                })
                .catch(err=>{
                    console.log(err);
                })
           }
           else{
            alert("Input! Fill all fields");
           }
            
        }
    }
  
 }
 
 </script>
 
 <style>
    .align{
        text-align: center;
    }
    .inpMen{
        width:50%;
        border: 2px solid #022333;
        height:40px;
        border-radius: 20px;
        padding-left: 20px;
    }
    .inpDes
    {
        width:50%;
        border: 2px solid #022333;
        height:80px;
        border-radius: 20px;
        padding-left: 20px;
    }
    .buttonSb{
        width:50%;
        border: none;
        background-color: #022333;
        height:40px;
        border-radius: 20px;
        color:white;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
    }
    .buttonSb:hover{
        transform: scale(1.05);
    }

    @media(max-width: 800px){
        .align{
            text-align: center;
        }
        .inpMen{
            width:100%;
            border: 2px solid #022333;
            height:40px;
            border-radius: 20px;
            padding-left: 20px;
        }
        .inpDes
        {
            width:100%;
            border: 2px solid #022333;
            height:80px;
            border-radius: 20px;
            padding-left: 20px;
        }
        .buttonSb{
            width:100%;
            border: none;
            background-color: #022333;
            height:40px;
            border-radius: 20px;
            color:white;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }
        .buttonSb:hover{
            transform: scale(1.05);
        }
    }

 </style>
 