<template>
  <v-toolbar dark color="#343A40">
    <v-toolbar-title class="white--text">Title</v-toolbar-title>
   
    <router-link :to="{ path: '/feed' }">
      <v-btn icon>
      <v-icon>home</v-icon>
    </v-btn>
    </router-link>
    <v-spacer></v-spacer>

    <v-btn icon>
      <v-icon>search</v-icon>
    </v-btn>
    <v-autocomplete>
      <v-slide-x-reverse-transition>
        <v-icon></v-icon>
      </v-slide-x-reverse-transition>
    </v-autocomplete>
 <v-btn flat>BUSCAR</v-btn>
          <v-menu bottom left>
            <v-btn
              slot="activator"
              dark
              icon
            >
              <v-icon>more_vert</v-icon>
            </v-btn>

            <v-list>
              <v-list-tile
                v-for="(item, i) in items"
                :key="i"
             
              >
                <v-list-tile-title>{{ item.title }}</v-list-tile-title>
              </v-list-tile>
            </v-list>
          </v-menu>

  </v-toolbar>
</template>

<script>
export default {};
</script>

<style>
</style>
