<template>
    <div class="row" style="width: 100%;">
        <div class="col-3">
            <nav-bar></nav-bar>
        </div>
        <div class="col-9">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1 class="heading">Tasks</h1>
                    </div>
                </div>
                <div style="display: flex;">
                    <div style="padding-right: 10px;"><button class="buttonCr" @click="showTable">{{ butX}}</button></div>
                    <div style="padding-right: 10px;"><button class="buttonCr" @click="showTableD"><FlFilledDelete/></button></div>
                    <div style="padding-right: 10px;"><button class="buttonUp" @click="showTableU">Update</button></div>
                </div>
                <div class="row" style="padding-bottom: 20px;">
                    <task-inp v-if="inpM"></task-inp>
                    <task-upd v-if="inpU"></task-upd>
                    <task-del v-if="inpD"></task-del>
                </div>
                <div class="table-wrapper">
                    <table class="styled-table">
                    <thead>
                        <tr>
                        <th>Task ID</th>
                        <th>Task Name</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>Project ID</th>
                        <th>Person Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="task in tasksss" :key="task.task_id">
                        <td>{{ task.task_id }}</td>
                        <td>{{ task.taskname }}</td>
                        <td>{{ task.descriptionstain }}</td>
                        <td>{{ task.startdate }}</td>
                        <td>{{ task.projectid }}</td>
                        <td>{{ task.username }}</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 </template>
 
 <script>
 import NavBar from "./NavBar.vue";
 import axios from 'axios';
 import Cookies from "js-cookie";
 import TaskInp from './TaskCrud/TaskInp.vue';
 import TaskUpd from './TaskCrud/TaskUpd.vue';
 import TaskDel from './TaskCrud/TaskDel.vue';
 import { FlFilledDelete } from "@kalimahapps/vue-icons";
 export default {
    components:{
        NavBar,
        TaskInp,
        TaskUpd,
        TaskDel,
        FlFilledDelete
    },
    data(){
        return{
            tasksss:[],
            inpM: false,
            inpU: false,
            inpD: false,
            butX: "+",
            x:{user_id:Cookies.get('TokkenId')}
        }
    },
    methods:{
        async taskget()
        {
            await axios.get(`${this.$api_url}/TaskSend`,this.x)
            .then(Response=>{
                this.tasksss = Response.data;
            })
            .catch(err=>console.log(err));

        },
        showTable() {
            this.inpM = !this.inpM
            this.inpD = false;
            this.inpU = false;
            if (this.butX === "+") {
                this.butX = "-"
            }
            else {
                this.butX = "+"
            }
        },
        showTableU() {
            this.inpU = !this.inpU
            this.inpD = false;
            this.inpM = false;
        },
        showTableD() {
            this.inpD = !this.inpD
            this.inpU = false;
            this.inpM = false;
        },
    },
    beforeMount() {
        this.taskget();
    }

 }
 
 </script>
 
 <style>


 </style>
 