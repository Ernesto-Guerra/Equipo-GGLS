<template>
     <v-app light>
  <bar ></bar>
    <v-content>
      <section>
        <v-parallax src="http://www.escuelamanagement.eu/wp-content/uploads/Pensamiento-cr%C3%ADtico-y-creativo-1080x675.jpg" height="600">
          <v-layout
            column
            align-center
            justify-center
            class="white--text"
          >
           
            <h1 class="white--text mb-2 display-1 text-xs-center">  Responderemos a todas tus preguntas</h1>
            <div class="subheading mb-3 text-xs-center">respondemos en menos de 5 minutos </div>
            <div>
  <v-card-text>
     <v-autocomplete style="background-color:white;width:220%;margin-left:-55%"
      cache-items
      flat
      hide-no-data
      hide-details
      label="What state are you from?"
      solo-inverted
    ></v-autocomplete>
    </v-card-text>
            </div>
            <div>
              
            </div>
            <v-btn
              class="blue lighten-2 mt-5"
              dark
              large

            >
              Buscar
            </v-btn>
          </v-layout>
        </v-parallax>
      </section>

        <section>
          <v-layout
            column
            wrap
            class="my-5"
            align-center
          >
            <v-flex xs12 sm4 class="my-3">
              <div class="text-xs-center">
                <h2 class="headline">The best way to start developing</h2>
                <span class="subheading">
                  Cras facilisis mi vitae nunc 
                </span>
              </div>
            </v-flex>
            <v-flex xs12>
              <v-container grid-list-xl>
                <v-layout row wrap align-center>
                  <v-flex xs12 md4>
                    <v-card class="elevation-0 transparent">
                      <v-card-text class="text-xs-center">
                        <v-icon x-large class="blue--text text--lighten-2">color_lens</v-icon>
                      </v-card-text>
                      <v-card-title primary-title class="layout justify-center">
                        <div class="headline text-xs-center">Material Design</div>
                      </v-card-title>
                
                    </v-card>
                  </v-flex>
                  <v-flex xs12 md4>
                    <v-card class="elevation-0 transparent">
                      <v-card-text class="text-xs-center">
                        <v-icon x-large class="blue--text text--lighten-2">flash_on</v-icon>
                      </v-card-text>
                      <v-card-title primary-title class="layout justify-center">
                        <div class="headline">Fast development</div>
                      </v-card-title>
                   
                  </v-card>
                </v-flex>
                <v-flex xs12 md4>
                  <v-card class="elevation-0 transparent">
                    <v-card-text class="text-xs-center">
                      <v-icon x-large class="blue--text text--lighten-2">build</v-icon>
                    </v-card-text>
                    <v-card-title primary-title class="layout justify-center">
                      <div class="headline text-xs-center">Completely Open Sourced</div>
                    </v-card-title>
              
                  </v-card>
                </v-flex>
              </v-layout>
            </v-container>
          </v-flex>
        </v-layout>
      </section>

    </v-content>
  </v-app>
</template>

<script>
import NavbarGuest from '../Navbar/NavbarGuest'
import Question from '../question/AllQuestions'

export default {
  methods:{
    ranking(){
      this.$http.get();
    }
  },
 components:{
    bar:NavbarGuest,
    ques:Question,
  }
}
</script>

<style>

</style>
