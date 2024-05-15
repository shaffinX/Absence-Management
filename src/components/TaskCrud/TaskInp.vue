<template>
    <div class="align">
        <div style="padding-top: 10px;"><input placeholder="Task Name" type="text" class="inpMen" v-model="data.taskname"/></div>
        <div style="padding-top: 10px;"><textarea placeholder="Description" type="text" class="inpDes" v-model="data.descriptionstain"></textarea></div>
        <div style="padding-top: 10px;"><input placeholder="Start Date" type="date" class="inpMen" v-model="data.startdate"/></div>
        <div style="padding-top: 10px;"><input placeholder="Project ID" type="number" class="inpMen" v-model="data.projectid"/></div>
        <div style="padding-top: 10px;"><input placeholder="Person Name" type="text" class="inpMen" v-model="data.name"/></div>
        <div style="padding-top: 10px;"><button @click="SubmitFunc" class="buttonSb">Submit</button></div>
    </div>
 </template>
 
 <script>
 import axios from 'axios';
 export default {
    data()
    {
        return{
            data:{taskname:"",descriptionstain:"",startdate:"",projectid:null,name:""}
        }
    },
    methods:{
        async SubmitFunc()
        {
           if (this.data.taskname && this.data.descriptionstain && this.data.startdate && this.data.projectid && this.data.name) {
                axios.post(`${this.$api_url}/TaskCreate`,this.data)
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
 