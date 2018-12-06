<template>
<div>
    <v-app light>
 <v-toolbar dark color="#343A40">
   
    <v-toolbar-title class="white--text">Title</v-toolbar-title>   
    
    <router-link :to="{ path: '/' }">
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
          <router-link :to="{ path: 'login' }">
            <v-btn flat>LOGIN</v-btn>
          </router-link>
           <router-link :to="{ path: 'register' }">
            <v-btn flat>REGISTER</v-btn>
          </router-link>
  </v-toolbar>
    </v-app >
</div>

</template>

<script>
import NavbarGuest from '@/components/Navbar/NavbarGuest'
import footer from '@/components/footer'
export default {
 components:{
    ra:NavbarGuest,
    foot:footer
  }
}
</script>

<style>
</style>
