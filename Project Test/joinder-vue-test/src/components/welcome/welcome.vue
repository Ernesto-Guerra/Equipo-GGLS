<template>
     <v-app light>
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
            <div class="subheading mb-3 text-xs-center">Respondemos en menos de 5 minutos </div>
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
            <v-flex xs12 sm4 class="my-3" >
              <div class="text-xs-center">
                <h2 class="headline">Personas con mas puntos ganados</h2>
                <span class="subheading">
Felicidades                </span>
              </div>
            </v-flex>
            <v-flex xs12 v-model="user2">
              <v-container grid-list-xl>
                <v-layout row wrap align-center>
                  <v-flex xs12 md4>
                    <v-card class="elevation-0 transparent">
                      <v-card-text class="text-xs-center">
                                              <img src="http://innovafest.1551.pe/img/segundolugar.png" style="width:110px;hight:110px" alt="">
                      </v-card-text>
                      <v-card-title primary-title class="layout justify-center">
                        <div class="headline text-xs-center">{{user2.name}}</div>
                      </v-card-title>
                   <div class="headline text-center"> score:{{user2.score}}</div>
                    </v-card>
                  </v-flex>
                  <v-flex xs12 md4 v-model="user">
                    <v-card class="elevation-0 transparent">
                      <v-card-text class="text-xs-center">
<img src="https://png.pngtree.com/element_origin_min_pic/17/03/16/cabedf1c1526d1c3fa54745f28828af0.jpg" style="width:100px;hight:100px" alt="">
                      </v-card-text>
                      <v-card-title primary-title class="layout justify-center">
                        <div class="headline">{{user.name}}</div>
                      </v-card-title>
                      <div class="headline text-center"> score:{{user.score}}</div>
                  </v-card>
                </v-flex>
                <v-flex xs12 md4 v-model="user3">
                  <v-card class="elevation-0 transparent">
                    <v-card-text class="text-xs-center">
              <img src="https://pngimage.net/wp-content/uploads/2018/06/tercer-lugar-png-2.png"  style="width:100px;hight:100px" alt="">
                    </v-card-text>
                    <v-card-title primary-title class="layout justify-center">
                      <div class="headline text-xs-center">{{user3.name}}</div>
                    </v-card-title>
                 <div class="headline text-center"> score:{{user3.score}}</div>
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
import Question from '../question/AllQuestions'

export default {
  data() {
    return {user:[]
    ,user2:[],user3:[]};
  },
  created:function(){
this.getranking();
  },
 
  methods:{
      getranking:function(){
this.$http.get('api/ranking').then(function(responde){
  this.user=responde.data[0]
    this.user2=responde.data[1]
      this.user3=responde.data[2]
  console.log(this.user)
})
  },
  },
 components:{
    ques:Question,
  }
}
</script>

<style>

</style>
