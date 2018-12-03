<template>
  <div>
   <navu></navu>
    <v-app light>
      <v-content>

        <button @click="logout()" class="btn btn-primary">CERRAR SESION</button>
        <br>
            <v-layout >
    <v-flex xs12 sm6 offset-sm3>
      <v-card style="width:98%;margin-left:1%">
        <v-card-title primary-title>
          <div>
            <h1 class="headline mb-0">¿que quieres saber?</h1>
          </div>
        </v-card-title>

        <v-card-actions>
      
            <router-link :to="{ path: '/questionform'}">
    <v-btn  flat color="orange">preguntar</v-btn>
   </router-link> 
                           
      
         
        </v-card-actions>
      </v-card>
    </v-flex>
  </v-layout>  

        <div class="row justify-content-center">
          <div class="col col-xs-10 col-sm-6">
            <all-questions></all-questions>
          </div>
        </div>
      </v-content>
    </v-app>
  </div>
</template>

<script>
import NavbarUser from "./Navbar/NavbarUser.vue";
import AllQuestions from "./question/AllQuestions.vue";
export default {
  data() {
    return {};
  },
  created() {},
  components: {
    'navu':NavbarUser,
    AllQuestions
  },
  methods: {
    logout() {
      this.$auth.destroyToken();

      this.$router.push("/login");
    }
  }
};
</script>

<style scoped>
</style>