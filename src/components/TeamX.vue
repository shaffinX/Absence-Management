<template>
    <div class="row" style="width:100%;">
      <div class="col-3">
        <nav-bar></nav-bar>
      </div>
      <div class="col-9">
        <div class="container">
          <div class="row">
            <div class="col">
              <h1 class="heading">Team</h1>
            </div>
          </div>
          <div class="table-wrapper">
            <table class="styled-table">
              <thead>
                <tr>
                    <th>Available Team</th>
                    <th>Resources Team</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="row in team" :key="row.resourceteam">
                  <td>{{ row.availableteam }}</td>
                  <td>{{ row.resourcesteam }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import NavBar from './NavBar.vue';
  import axios from 'axios'
  export default {
    components: {
      NavBar,
    },
    data() {
      return {
        team: [],
      }
    },
    methods: {
      async TeamRun() {
        await axios.get(`${this.$api_url}/Team`).then((Response) => {
          this.team = Response.data;
        });
      },
    },
    beforeMount() {
      this.TeamRun();
    },
  
  }
  
  </script>
  
  <style></style>