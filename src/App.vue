<template>
   <div>
    <router-link to="/"></router-link>
    <router-view></router-view> <!-- This is where the component for the current route will be rendered -->
  </div>
</template>

<script>
export default {
  name: 'App'
}

</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: black;
  background-color: #fff
}
</style>
