<template>
  <div class="row" style="width: 100%;">
    <div class="col-3">
      <nav-bar></nav-bar>
    </div>
    <div class="col-9">
      <MediaQuery query="(min-width: 1080px)">
        <div class="container">
          <div class="row">
            <h1 class="heading">Main Projects</h1>
          </div>
          <div class="row" style="padding-top: 50px;padding-bottom: 50px;">
            <div style="display: flex;">
              <div style="padding-right: 10px;"><button class="buttonCr" @click="showTable">{{ butX }}</button></div>
              <div style="padding-right: 10px;"><button class="buttonCr" @click="showTableD"><FlFilledDelete/></button></div>
              <div style="padding-right: 10px;"><button class="buttonUp" @click="showTableU">Update</button></div>
            </div>
          </div>
          <div class="row" style="padding-bottom: 20px;">
            <input-proj v-if="inpM"></input-proj>
            <upd-proj v-if="inpU"></upd-proj>
            <DelProj v-if="inpD"></DelProj>
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
      <MediaQuery query="(max-width: 1079px)">
        <div class="container">
          <h1 class="heading2">Main Projects</h1>
          <div class="row" style="padding-top: 50px;padding-bottom: 50px;">
            <div style="display: flex;">
              <div style="padding-right: 10px;"><button class="buttonCr" @click="showTable">{{ butX }}</button></div>
              <div style="padding-right: 10px;"><button class="buttonCr" @click="showTableD"><FlFilledDelete/></button></div>
              <div style="padding-right: 10px;"><button class="buttonUp" @click="showTableU">Update</button></div>
            </div>
          </div>
          <div class="row" style="padding-bottom: 20px;">
            <input-proj v-if="inpM"></input-proj>
            <upd-proj v-if="inpU"></upd-proj>
            <DelProj v-if="inpD"></DelProj>
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
    </div>
  </div>
</template>

<script>
import NavBar from "./NavBar.vue";
import axios from "axios";
import MediaQuery from "../MediaQuery.vue";
import InputProj from "./ProjectCrud/InputProj.vue";
import UpdProj from "./ProjectCrud/UpdProj.vue";
import DelProj from "./ProjectCrud/DelProj.vue";
import { FlFilledDelete } from "@kalimahapps/vue-icons";
export default {
  name: "ProjectsAlpha",
  components: {
    NavBar,
    MediaQuery,
    InputProj,
    UpdProj,
    FlFilledDelete,
    DelProj
  },
  data() {
    return {
      projects: [],
      inpM:false,
      inpU:false,
      inpD:false,
      butX:"+",
    };
  },
  methods: {
    async ProjectFun() {
      await axios.get(`${this.$api_url}/ProjectTable`).then((Response) => {
        this.projects = Response.data;
      });
    },
    showTable() {
      this.inpM = !this.inpM
      this.inpD=false;
      this.inpU = false;
      if (this.butX==="+") {
        this.butX="-"
      }
      else{
        this.butX="+"
      }
    },
    showTableU() {
      this.inpU = !this.inpU
      this.inpD=false;
      this.inpM = false;
    },
    showTableD() {
      this.inpD = !this.inpD
      this.inpU=false;
      this.inpM = false;
    },
  },
  beforeMount() {
    this.ProjectFun();
  },
};
</script>

<style>
.heading {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  text-align: center;
  font-size: 40px;
  font-weight: bold;
  padding-top: 5%;
}
.heading2 {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  text-align: center;
  font-size: 30px;
  font-weight: bold;
  padding-top: 5%;
  text-align: center;
}
.table-wrapper {
  overflow: scroll;
  width:100%;
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

.buttonCr{
  border: none;
  width: 40px;
  height:40px;
  border-radius: 20px;
  background-color: #002333;
  color:white;
  font-size: 20px;
  transition: all 0.3s ease-in-out;
}
.buttonCr:hover{
  transform: scale(1.1);
}
.buttonUp{
  border: none;
  width: 80px;
  height:40px;
  border-radius: 20px;
  background-color: #002333;
  color:white;
  font-size: 15px;
  transition: all 0.3s ease-in-out;
}
.buttonUp:hover{
  transform: scale(1.1);
}

</style>
