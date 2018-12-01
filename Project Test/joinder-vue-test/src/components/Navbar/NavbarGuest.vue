<template>
  <v-toolbar dark color="primary">
    <v-toolbar-title class="white--text">Title</v-toolbar-title>

    <v-spacer></v-spacer>

    <v-btn icon>
      <v-icon>search</v-icon>
    </v-btn>
    <v-autocomplete>
      <v-slide-x-reverse-transition>
        <v-icon></v-icon>
      </v-slide-x-reverse-transition>
    </v-autocomplete>
    <v-btn flat>LOGIN</v-btn>
    <v-btn flat>REGISTER</v-btn>
  </v-toolbar>
</template>

<script>
export default {};
</script>

<style>
</style>
