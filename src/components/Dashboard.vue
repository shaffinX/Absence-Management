<template>
  <div>
    <div class="row" style="width:100%;height:200vh">
      <div class="col-3">
        <nav-bar></nav-bar>
      </div>
      <div class="col-9">
        <MediaQuery query="(min-width: 1027px)">
          <div class="container">
            <h1 class="heading">Dashboard</h1>
            <div class="row" style="padding-left:10%;padding-top:5%">
              <div class="col">
                <div class="compBox" style="background-color:#3AAFB9">
                  <h1 style="font-weight:bold;font-size:medium;">Current Projects</h1>
                  <h1 style="font-weight:bold;font-size:50px;">{{currP}}</h1>
                </div>
              </div>
              <div class="col">
                <div class="compBox" style="background-color:#FC2F00">
                  <h1 style="font-weight:bold;font-size:medium;">Upcomming Vacations</h1>
                  <h1 style="font-weight:bold;font-size:50px;">{{currA}}</h1>
                </div>
              </div>
              <div class="col">
                <div class="compBox" style="background-color:#DB9465">
                  <h1 style="font-weight:bold;font-size:medium;">DSI Projects</h1>
                  <h1 style="font-weight:bold;font-size:50px;">{{dsiP}}</h1>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col" style="padding-top: 50px;">
                <h1 class="heading" style="font-size: 20px;">Main Projects</h1>
              </div>
            </div>
            <div class="table-wrapper">
              <table class="styled-table">
                <thead>
                  <tr>
                    <th>Project ID</th>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Contact Professional</th>
                    <th>Tools Concerns</th>
                    <th>DSI</th>
                    <th>Est Load</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Comment Professional</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="project in projects" :key="project.project_id">
                    <td>{{ project.project_id }}</td>
                    <td>{{ project.projectname }}</td>
                    <td>{{ project.description }}</td>
                    <td>{{ project.contactprofessional }}</td>
                    <td>{{ project.toolsconcerns }}</td>
                    <td>{{ project.dsi }}</td>
                    <td>{{ project.estload }}</td>
                    <td>{{ project.startdate }}</td>
                    <td>{{ project.enddate }}</td>
                    <td>{{ project.status }}</td>
                    <td>{{ project.commentpro }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </MediaQuery>
        <MediaQuery query="(max-width: 1026px)">
          <div class="row">
            <h1 class="heading2" style="text-align:center;">Dashboard</h1>
          </div>
            <div class="row" style="padding-top: 100px;">
              <div class="col" style="text-align:center">
                <div class="compBox2" style="background-color:#3AAFB9">
                  <h1 style="font-weight:bold;font-size:medium;">Current Projects</h1>
                  <h1 style="font-weight:bold;font-size:50px;">{{currP}}</h1>
                </div>
              </div>
            </div>
            <div class="row" style="padding-top: 40px;">
              <div class="col" style="text-align:center">
                <div class="compBox2" style="background-color:#FC2F00">
                  <h1 style="font-weight:bold;font-size:medium;">Upcomming Vacations</h1>
                  <h1 style="font-weight:bold;font-size:50px;">{{currA}}</h1>
                </div>
              </div>
            </div>
            <div class="row" style="padding-top: 40px;">
              <div class="col" style="text-align:center">
                <div class="compBox2" style="background-color:#DB9465">
                  <h1 style="font-weight:bold;font-size:medium;">DSI Projects</h1>
                  <h1 style="font-weight:bold;font-size:50px;">{{dsiP}}</h1>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col" style="padding-top: 50px;">
                <h1 class="heading" style="font-size: 15px;">Main Projects</h1>
              </div>
            </div>
            <div class="table-wrapper">
              <table class="styled-table">
                <thead>
                  <tr>
                    <th>Project ID</th>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Contact Professional</th>
                    <th>Tools Concerns</th>
                    <th>DSI</th>
                    <th>Est Load</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Comment Professional</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="project in projects" :key="project.project_id">
                    <td>{{ project.project_id }}</td>
                    <td>{{ project.projectname }}</td>
                    <td>{{ project.description }}</td>
                    <td>{{ project.contactprofessional }}</td>
                    <td>{{ project.toolsconcerns }}</td>
                    <td>{{ project.dsi }}</td>
                    <td>{{ project.estload }}</td>
                    <td>{{ project.startdate }}</td>
                    <td>{{ project.enddate }}</td>
                    <td>{{ project.status }}</td>
                    <td>{{ project.commentpro }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </MediaQuery>
      </div>
    </div>
  </div>    
</template>
  
  <script>
  import NavBar from './NavBar.vue';
  import MediaQuery from '../MediaQuery.vue';
  import axios from 'axios';
  import Cookies from 'js-cookie';
  export default {
    data() {
      return {
        projects: [],
        currP:0,
        currA:0,
        dsiP:0,
        x:{userid:Cookies.get('TokkenId')},
      };
    },
    methods:{
      async currProj()
        {
          await axios.get(`${this.$api_url}/ProjectDashboard`)
          .then(Response=>{
            this.currP=Response.data;
          })
          .catch(Error=>{console.log(Error);})
          await axios.post(`${this.$api_url}/AbscentDashboard`,this.x)
          .then(Response=>{
            this.currA=Response.data;
          })
          .catch(Error=>{console.log(Error);})
          await axios.get(`${this.$api_url}/DsiDashboard`)
          .then(Response=>{
            this.dsiP=Response.data;
          })
          .catch(Error=>{console.log(Error);})
          await axios.get(`${this.$api_url}/ProjectTableDash`).then((Response) => {
            this.projects = Response.data;
          });
        }
        
    },
    beforeMount() {
      this.currProj();
    },

    name: 'DashboardFile',
    components:{
      NavBar,
      MediaQuery
    }
  }
 
  </script>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->
  <style scoped>
    .heading{
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      text-align:center;font-size:40px;
      font-weight:bold;
      padding-top:5%

    }
    .heading2{
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      text-align:center;font-size:30px;
      font-weight:bold;
      padding-top:5%

    }
    .compBox{
      color:#fff;
      width:80%;
      height:200px;
      border-radius:20px;
      text-align:center;
      padding-top:40px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      cursor:pointer;
      transition: 0.3s ease-in-out;
    }
    .compBox:hover{
      transform:scaley(1.1);
    }
    .compBox2{
      color:#fff;
      width:80%;
      height:200px;
      border-radius:20px;
      text-align:center;
      padding-top:40px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      cursor:pointer;
      transition: 0.3s ease-in-out;
    }
    .compBox2:hover{
      transform:scaley(1.1);
    }

    .table-wrapper {
      overflow: scroll;
      width:100%;
      padding-top: 20px;
    }

  .styled-table {
    width: max-content;
    border-collapse: collapse;
    border-spacing: 0;

    color: black;
  }

  .styled-table th,
  .styled-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  .styled-table th {
    background-color: #f2f2f2;
    color: black;
  }

  .styled-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
    color: black;
  }

  .styled-table tbody tr:hover {
    background-color: #ddd;
    color: black;
  }

  
  </style>
  