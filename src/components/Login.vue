<template>
  <div>
    <MediaQuery query="(max-width: 768px)">
      <div class="container" style="width:100%;height:100vh;">
        <div class="row">
          <div class="col" style="text-align: center;">
            <h1 class="Head">Login to Your Account</h1>
            <div style="padding-top: 20px;"><input class="inp" v-model="LoginDetails.email" placeholder="Email" type="text"/></div>
            <div style="padding-top: 20px;"><input class="inp" v-model="LoginDetails.password" placeholder="Password" :type="pasSh"/></div>
            <div style="padding-top: 20px;padding-left:50%"><button @click="showPass" class="showbtn">{{ sssh }}</button></div>
            <div style="padding-top: 20px;"><Button class="login-btn" @click="sendLogin">Login</Button></div>
          </div>
        </div>
      </div>
    </MediaQuery>
    <MediaQuery query="(min-width: 769px)">
      <div class="row" style="width:100%;height:100vh;">
        <div class="col-8" style="text-align: center;">
          <h1 class="Head">Login to Your Account</h1>
          <div style="padding-top: 20px;"><input class="inp" v-model="LoginDetails.email" placeholder="Email" type="text"/></div>
          <div style="padding-top: 20px;"><input class="inp" v-model="LoginDetails.password" placeholder="Password" :type="pasSh"/></div>
          <div style="padding-top: 20px;padding-left:50%"><button @click="showPass" class="showbtn">{{ sssh }}</button></div>
          <div style="padding-top: 20px;"><Button class="login-btn" @click="sendLogin">Login</Button></div>
        </div>
        <div class="col-4" style="text-align: right;padding: 0; margin: 0;">
          <div class="RightPanel">
            <img src="../assets/logo.svg" style="width:50%;"/>
            <h2 class="Head2">Project and Absence</h2>
            <h2 class="Head2">Manager</h2>
          </div>
        </div>
      </div>
    </MediaQuery>
      
  </div>
</template>

<script>
import './login.css';
import MediaQuery from '../MediaQuery.vue';
import cookie from 'js-cookie';
import axios from 'axios';
export default {
  name: 'LoginFile',
  data(){
    return{
      pasSh:"password",
      sssh:"show",
      LoginDetails:{
        email:"",password:""
      }
    }
  },
  components:{
    MediaQuery
  },
  methods:{
    async sendLogin()
    {
      axios.post(`${this.$api_url}/login`,this.LoginDetails)
      .then(Response=>{
        if(Response.data){
          cookie.set('TokkenName',Response.data.name, { expires: 1 });
          cookie.set('TokkenJob',Response.data.job, { expires: 1 });
          cookie.set('TokkenId',Response.data.id, { expires: 1 });
          this.$router.push('/');
        }
        else{
          alert('Incorrect Email or Password');
        }
      })
      .catch(Error=>{console.log(Error);})
        

    },
    async showPass()
    {
      if(this.pasSh==="password"){
        this.pasSh="text";
        this.sssh="hide";
      }
      else{
        this.pasSh="password";
        this.sssh="show";
      }
    }

  }
}
</script>

<style scoped>
/* You can add scoped styles here if needed */

.showbtn{
  width:50px;
  height:30px;
  background-color:#022333;
  border-radius:15px;
  border:none;
  color:#fff;
  transition:all 0.3s ease-in-out;
}
.showbtn:hover{
  transform:scale(1.1);
}

</style>
