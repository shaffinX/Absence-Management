<template>
    <div>
        <MediaQuery query="(max-width: 1026px)">
            <div class="nav2">
                <div class="row" style="padding-top:70%">
                    <div class="col" style="text-align:center">
                        <router-link to="/"><LuLayoutDashboard class="iconClass"/></router-link>
                    </div>
                </div>
                <div class="row" style="text-align:center;padding-top:20%">
                    <div class="col">
                        <router-link to="/Projects" style="text-decoration:none;"><h1 class="iconClass" style="padding-left:15%">P</h1></router-link>
                    </div>
                </div>
                <div class="row" style="text-align:center;padding-top:20%">
                    <div class="col">
                        <router-link to="/Holidays" style="text-decoration:none;"><h1 class="iconClass" style="padding-left:15%">H</h1></router-link>
                    </div>
                </div>
                <div class="row" style="text-align:center;padding-top:20%">
                    <div class="col">
                        <router-link to="/Tasks" style="text-decoration:none;"><h1 class="iconClass" style="padding-left:15%">T</h1></router-link>
                    </div>
                </div>
                <div class="row" style="text-align:center;padding-top:20%">
                    <div class="col">
                        <router-link to="/Team" style="text-decoration:none;"><FlFilledPeopleTeam class="iconClass"/></router-link>
                    </div>
                </div>
                <div class="row" style="text-align:center;padding-top:20%">
                    <div class="col">
                        <router-link to="/Members" style="text-decoration: none;"><CgProfile class="iconClass" v-if="mem2"/></router-link>
                    </div>
                </div>
                <div class="row" style="text-align:center;padding-top:20%">
                    <div class="col">
                        <button class="signoutbtn" @click="signout">S</button>
                    </div>
                </div>
                
            </div>
        </MediaQuery>
        <MediaQuery query="(min-width: 1027px)">
            <div class="nav">
                <div class="container">
                    <div class="row">
                        <div style="display:flex">
                            <img src="../assets/logo.svg" style="width:30%;padding-left:10%;padding-top:5%"/>
                            <h1 style="padding-left:5%;padding-top:10%;font-size:large">Project and Absence<br/>Management</h1>

                        </div>
                    </div>
                    <div class="row" style="padding-top:10%">
                        <div class="col">
                            <router-link to="/" style="text-decoration: none;"><h1 class="navs">DashBoard</h1></router-link>
                        </div>
                    </div>
                    <div class="row" style="padding-top:3%">
                        <div class="col">
                            <router-link to="/Projects" style="text-decoration: none;"><h1 class="navs">Projects</h1></router-link>
                        </div>
                    </div>
                    <div class="row" style="padding-top:3%">
                        <div class="col">
                            <router-link to="/Holidays" style="text-decoration: none;"><h1 class="navs">Holidays</h1></router-link>
                        </div>
                    </div>
                    <div class="row" style="padding-top:3%">
                        <div class="col">
                            <router-link to="/Tasks" style="text-decoration: none;"><h1 class="navs">Tasks</h1></router-link>
                        </div>
                    </div>
                    <div class="row" style="padding-top:3%">
                        <div class="col">
                            <router-link to="/Team" style="text-decoration: none;"><h1 class="navs">Team</h1></router-link>
                        </div>
                    </div>
                    <div class="row" style="padding-top:95%">
                        <div class="col">
                            <router-link to="/Members" style="text-decoration: none;"><h1 class="navs">{{ mem }}</h1></router-link>
                        </div>
                    </div>
                    <div class="row" style="padding-top:3%">
                        <div class="col" style="padding-left:10%;">
                            <button class="signoutbtn" @click="signout">Signout</button>
                        </div>
                    </div>

                </div>
            </div>
        </MediaQuery>
    </div>
    
    
</template>
<script>
    import MediaQuery from '../MediaQuery.vue';
    import { LuLayoutDashboard } from "@kalimahapps/vue-icons";
    import { CgProfile } from "@kalimahapps/vue-icons";
    import { RouterLink } from 'vue-router';
    import { FlFilledPeopleTeam } from "@kalimahapps/vue-icons";
    import cookie from 'js-cookie';
    export default {
        data(){
            return{
                mem:"",
                mem2:false,
            }
        },
        components: {
            MediaQuery,
            LuLayoutDashboard,
            CgProfile,
            RouterLink,
            FlFilledPeopleTeam
        },
        methods:{
            async signout(){
                cookie.remove('TokkenName');
                cookie.remove('TokkenJob');
                cookie.remove('TokkenId');
                this.$router.push('/Login');
            },
            async memberChk()
            {
                let job=cookie.get('TokkenJob');
                if(job==='admin'){
                    this.mem="Members";
                    this.mem2=true;
                }
            }
        },
        beforeMount() {
            this.memberChk();
        },
    }
</script>
<style>
    .nav{
        width:25%;
        min-height:103%;
        background-color:#002333;
        color:#fff;
        position:fixed;
    }
    .nav2{
        width:10%;
        min-height:103%;
        background-color:#002333;
        color:#fff;
        position:fixed;
    }

    .navs{
        color:#fff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size:large;
        padding-left:10%;
        font-weight: bold;
        transition: 0.3s ease-in-out;
        cursor:pointer;
    }
    .navs:hover{
        color:#e2e2e2;
    }
    .iconClass{
        width:70%;
        color:#fff;
        font-size: 50px;
    }
    .signoutbtn{
        width:30%;
        height:30px;
        border:none;
        border-radius:15px;
        color:#022333;
        background-color:#fff;
        font-weight:bold;
        transition: transform 0.3s ease-in-out;
    }
    .signoutbtn:hover{
        transform:scale(1.1);
    }
    @media(max-width:1026px){
        .signoutbtn{
            width:50%;
            height:30px;
            border:none;
            border-radius:15px;
            color:#022333;
            background-color:#fff;
            font-weight:bold;
            transition: transform 0.3s ease-in-out;
        }
        .signoutbtn:hover{
            transform:scale(1.1);
        }
    }
</style>