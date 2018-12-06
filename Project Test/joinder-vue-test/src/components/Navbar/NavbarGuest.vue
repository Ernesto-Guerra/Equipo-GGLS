<template>
<div>
 
 <v-toolbar dark color="#343A40">
   
    <v-toolbar-title class="white--text">Title</v-toolbar-title>   
    
    <router-link :to="{ path: '/' }">
      <v-btn icon>
      <v-icon>home</v-icon>
    </v-btn>
    </router-link>
 
    <v-spacer></v-spacer>

   
          <router-link :to="{ path: 'login' }">
            <v-btn flat>LOGIN</v-btn>
          </router-link>
           <router-link :to="{ path: 'register' }">
            <v-btn flat>REGISTER</v-btn>
          </router-link>
  </v-toolbar>

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
