<template>
    <div class="align">
        <div style="padding-top: 10px;"><input placeholder="Name" type="text" class="inpMen" v-model="data.name"/></div>
        <div style="padding-top: 10px;"><input placeholder="Email" id="email" type="email" class="inpMen" v-model="data.email"/></div>
        <div style="padding-top: 10px;"><input placeholder="Password" type="text" class="inpMen" v-model="data.password"/></div>
        <span v-if="data.password.length < 8" style="color: red;">Password must be at least 8 characters long and a special character</span>
        <div style="padding-top: 10px;">
            <input placeholder="Job" type="radio" v-model="data.job" value="user" style="width:20px;height:20px"/><label style="padding-left:10px;padding-right:10px;font-size:18px"> User</label>
            <input placeholder="Job" type="radio" v-model="data.job" value="admin" style="width:20px;height:20px"/><label style="padding-left:10px;font-size:18px"> Admin</label>
        </div>
        
        <div style="padding-top: 10px;"><button @click="SubmitFunc" class="buttonSb">Create</button></div>
    </div>
 </template>
 
 <script>
 import axios from 'axios';
 export default {
    data()
    {
        return{
            data:{name:"",email:"",job:"",password:""}
        }
    },
    methods:{
        async validatePassword() {
            const regex = /^(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,30}$/;
            if(regex.test(this.data.password)){
                return 1;
            }
            else{
                return 0;
            }
        },
        async SubmitFunc()
        {
           if (this.data.name && this.data.email && this.data.job && this.data.password) {
                const isValidPassword = await this.validatePassword();
                if(isValidPassword){
                    axios.post(`${this.$api_url}/CreateUser`,this.data)
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
                    alert("error! Password must contain atleast 1 special character");
                }
                
           }
           else{
            alert("error! fill all fields and fill correctly");
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
 