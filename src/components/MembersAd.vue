<template>
  <div class="row" style="width:100%;">
    <div class="col-3">
      <nav-bar></nav-bar>
    </div>
    <div class="col-9">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="heading">Members</h1>
          </div>
        </div>
        <div style="display: flex;">
          <div style="padding-right: 10px;"><button class="buttonCr" @click="showTable">{{ butX }}</button></div>
          <div style="padding-right: 10px;"><button class="buttonCr" @click="showTableD"><FlFilledDelete /></button></div>
          <div style="padding-right: 10px;"><button class="buttonUp" @click="showTableU">Update</button></div>
        </div>
        <div class="row" style="padding-bottom: 20px;">
          <mem-inp v-if="inpM"></mem-inp>
          <mem-upd v-if="inpU"></mem-upd>
          <mem-del v-if="inpD"></mem-del>
        </div>
        <div class="table-wrapper">
          <table class="styled-table">
            <thead>
              <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Job</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="row in members" :key="row.id">
                <td>{{ row.id }}</td>
                <td>{{ row.name }}</td>
                <td>{{ row.email }}</td>
                <td>{{ row.job }}</td>
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
import MemInp from './MembersCrud/MemInp.vue'
import MemUpd from './MembersCrud/MemUpd.vue';
import MemDel from './MembersCrud/MemDel.vue';
import { FlFilledDelete } from "@kalimahapps/vue-icons";
export default {
  components: {
    NavBar,
    MemInp,
    MemUpd,
    MemDel,
    FlFilledDelete
  },
  data() {
    return {
      members: [],
      inpM: false,
      inpU: false,
      inpD: false,
      butX: "+",
    }
  },
  methods: {
    async MemberRun() {
      await axios.get(`${this.$api_url}/Members`).then((Response) => {
        this.members = Response.data;
      });
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
    this.MemberRun();
  },

}

</script>

<style></style>