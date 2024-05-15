<template>
    <div>
      <!-- Render content based on screen size -->
      <slot v-if="matches" />
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        matches: false,
      };
    },
    mounted() {
      // Add event listener for window resize
      window.addEventListener('resize', this.checkMediaQuery);
      // Initial check
      this.checkMediaQuery();
    },
    beforeUnmount() {
      // Remove event listener on component destroy
      window.removeEventListener('resize', this.checkMediaQuery);
    },
    methods: {
      checkMediaQuery() {
        // Perform media query check
        this.matches = window.matchMedia(this.query).matches;
      },
    },
    props: {
      query: {
        type: String,
        required: true,
      },
    },
  };
  </script>
  