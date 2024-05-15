<template>
    <div class="align">
        <div style="padding-top: 10px;"><input placeholder="Absence ID" type="number" class="inpMen" v-model="data.absence_id"/></div>
        <div style="padding-top: 10px;"><button @click="SubmitFunc" class="buttonSb">Validate</button></div>
    </div>
 </template>
 
 <script>
 import axios from 'axios';
 export default {
    data()
    {
        return{
            data:{absence_id:null},
        }
    },
    methods:{
        async SubmitFunc()
        {
           if (this.data.absence_id) {
                axios.post(`${this.$api_url}/AbscentAdminValidate`,this.data)
                .then(Response=>{
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
 