<template>
  <div class="row" style="width:100%">
    <div class="col-3">
      <nav-bar></nav-bar>
    </div>
    <div class="col-9">
      <h1 class="heading">Absence Management</h1>
      <h1 class="heading">Admin Panel</h1>
      <div style="display: flex;justify-content:center;padding-top:20px">
        <div style="padding-right: 10px;"><button class="buttonUp" @click="showTable">Validate</button></div>
      </div>
      <div class="row" style="padding-bottom: 20px;">
        <validate-alpha v-if="inpM"></validate-alpha>
      </div>
      <div class="row">
        <div class="table-wrapper">
          <table class="styled-table">
            <thead>
              <tr>
                <th>User Name</th>
                <th>Absence Id</th>
                <th>Abscence Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="rows in ValProj" :key="rows.absence_id">
                <td>{{ rows.name }}</td>
                <td>{{ rows.absence_id }}</td>
                <td>{{ rows.typeabscence }}</td>
                <td>{{ rows.startdate }}</td>
                <td>{{ rows.enddate }}</td>
                <td>{{ rows.status }}</td>
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
import ValidateAlpha from './AdminValidate/ValidateAlpha.vue'
import axios from 'axios';
export default {
  components: {
    NavBar,
    ValidateAlpha
  },
  data() {
    return {
      ValProj: [],
      inpM: false
    }

  },
  methods: {
    async ViewVal() {
      await axios.get(`${this.$api_url}/AbscentAdminView`)
        .then(Response => {
          this.ValProj = Response.data;
        })
        .catch(err => {
          console.log(err);
        })
    },
    showTable() {
      this.inpM = !this.inpM;
    },

  },
  beforeMount() {
    this.ViewVal();
  },
}

</script>

<style>
.heading {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  text-align: center;
  font-size: 40px;
  font-weight: bold;
  padding-top: 5%
}

.table-wrapper {
  overflow: scroll;
  width: 100%;
  padding-top: 50px;
}

@media (min-width: 801px) {
  .table-wrapper {
    overflow: hidden;
    width: 100%;
    padding-top: 50px;
    display: flex;
    justify-content: center;
  }
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

@media (max-width: 800px) {
  .heading {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    text-align: center;
    font-size: 25px;
    font-weight: bold;
    padding-top: 5%
  }

}
</style>