<template>
    <div class="align">
        <div style="padding-top: 10px;"><input placeholder="Project Name" type="text" class="inpMen" v-model="data.projectname"/></div>
        <div style="padding-top: 10px;"><textarea placeholder="Description" type="text" class="inpDes" v-model="data.description"></textarea></div>
        <div style="padding-top: 10px;"><input placeholder="Contact Professional" type="text" class="inpMen" v-model="data.contactprofessional"/></div>
        <div style="padding-top: 10px;"><input placeholder="Tools Concerns" type="text" class="inpMen" v-model="data.toolsconcerns"/></div>
        <div style="padding-top: 10px;"><input placeholder="DSI" type="text" class="inpMen" v-model="data.dsi"/></div>
        <div style="padding-top: 10px;"><input placeholder="Estimated Load" type="number" class="inpMen" v-model="data.estload"/></div>
        <div style="padding-top: 10px;"><input placeholder="Start Date" type="date" class="inpMen" v-model="data.startdate"/></div>
        <div style="padding-top: 10px;"><input placeholder="End Date" type="date" class="inpMen" v-model="data.enddate"/></div>
        <div style="padding-top: 10px;"><input type="checkbox" v-model="data.status" value="true"><label> Status(check:true | uncheck:false)</label></div>
        <div style="padding-top: 10px;"><input placeholder="Comment Professional" type="text" class="inpMen" v-model="data.commentpro"/></div>
        <div style="padding-top: 10px;"><button @click="SubmitFunc" class="buttonSb">Submit</button></div>
    </div>
 </template>
 
 <script>
 import axios from 'axios';
 export default {
    data()
    {
        return{
            data:{projectname:"",description:"",contactprofessional:"",toolsconcerns:"",dsi:"",estload:0,startdate:"",enddate:"",status:false,commentpro:""}
        }
    },
    methods:{
        async SubmitFunc()
        {
           if (this.data.projectname && this.data.contactprofessional && this.data.toolsconcerns && this.data.dsi && this.data.startdate && this.data.enddate && this.data.commentpro) {
                axios.post(`${this.$api_url}/SubmitProject`,this.data)
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
 