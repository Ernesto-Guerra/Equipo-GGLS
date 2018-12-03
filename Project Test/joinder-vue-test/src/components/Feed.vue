<template>
  <div>
   <navu></navu>
    <v-app light>
      <v-content>
        <section>
          <v-parallax
            src="http://www.escuelamanagement.eu/wp-content/uploads/Pensamiento-cr%C3%ADtico-y-creativo-1080x675.jpg"
            height="600"
          >
            <v-layout column align-center justify-center class="white--text">
              <h1
                class="white--text mb-2 display-1 text-xs-center"
              >Responderemos a todas tus preguntas</h1>
              <div class="subheading mb-3 text-xs-center">respondemos en menos de 5 minutos</div>
              <div>
                <v-card-text>
                  <v-autocomplete
                    style="background-color:white;width:220%;margin-left:-55%"
                    cache-items
                    flat
                    hide-no-data
                    hide-details
                    label="What state are you from?"
                    solo-inverted
                  ></v-autocomplete>
                </v-card-text>
              </div>
              <div></div>
              <v-btn class="blue lighten-2 mt-5" dark large>Buscar</v-btn>
            </v-layout>
          </v-parallax>
        </section>

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