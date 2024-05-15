<template>
    <div class="row" style="width: 100%;">
        <div class="col-3">
            <nav-bar></nav-bar>
        </div>
        <div class="col-9">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1 class="heading">Absence Management</h1>
                    </div>
                </div>
                <div class="row" style="padding-top: 50px;padding-bottom: 50px;">
                    <div style="display: flex;">
                        <div style="padding-right: 10px;"><button class="buttonCr" @click="showTable">{{ butX}}</button></div>
                        <div style="padding-right: 10px;"><button class="buttonCr" @click="showTableD"><FlFilledDelete/></button></div>
                        <div style="padding-right: 10px;"><button class="buttonUp" @click="showTableU">Update</button></div>
                    </div>
                    <div class="row" style="padding-bottom: 20px;">
                        <input-abs v-if="inpM"></input-abs>
                        <upd-abs v-if="inpU"></upd-abs>
                        <del-abs v-if="inpD"></del-abs>
                    </div>
                    <div class="table-wrapper">
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th>Absence Id</th>
                                    <th>Abscence Type</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="rows in absent" :key="rows.absence_id">
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
    </div>
</template>

<script>
import Cookies from 'js-cookie';
import NavBar from './NavBar.vue';
import InputAbs from "./AbsCrud/InpAbs.vue";
import UpdAbs from './AbsCrud/UpdAbs.vue';
import DelAbs from './AbsCrud/DelAbs.vue';
import { FlFilledDelete } from "@kalimahapps/vue-icons";
import axios from 'axios';
export default {
    data() {
        return {
            absent: [],
            inpM: false,
            inpU: false,
            inpD: false,
            butX: "+",
            x: { id: Cookies.get('TokkenId') }
        }
    },
    components: {
        NavBar,
        InputAbs,
        UpdAbs,
        DelAbs,
        FlFilledDelete
    },
    methods: {
        async abscence() {
            await axios.post(`${this.$api_url}/AbscentMan`, this.x)
                .then(Response => {
                    this.absent = Response.data;
                })
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
        this.abscence();
    }
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

.buttonCr {
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 20px;
    background-color: #002333;
    color: white;
    font-size: 20px;
    transition: all 0.3s ease-in-out;
}

.buttonCr:hover {
    transform: scale(1.1);
}

.buttonUp {
    border: none;
    width: 80px;
    height: 40px;
    border-radius: 20px;
    background-color: #002333;
    color: white;
    font-size: 15px;
    transition: all 0.3s ease-in-out;
}

.buttonUp:hover {
    transform: scale(1.1);
}
</style>