<template>
  <v-app style="background-color: rgba(255, 255, 128, .2);">
    <link
      href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css"
      rel="stylesheet"
    />
    <v-container >
      <navbar></navbar>
    </v-container>
    <v-main>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-main>
    <footerApp />
  </v-app>
</template>

<script>
import Navbar from "../navigation/Navbar";
import FooterApp from "../navigation/Footer";

export default {
  components: {
    Navbar,
    FooterApp,
  },
};
</script>