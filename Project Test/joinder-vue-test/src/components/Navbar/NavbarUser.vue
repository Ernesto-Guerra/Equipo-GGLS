<template>
 <v-app style="margin-bottom:-37%">
  <v-toolbar dark color="#343A40">
<img src="https://github.com/Ernesto-Guerra/Equipo-GGLS/blob/master/Project%20Test/joinder-vue-test/public/text.png?raw=true" style="margin-left:-2.5%;width:25%" alt="">
   
    <router-link :to="{ path: '/feed' }">
      <v-btn icon>
      <v-icon>home</v-icon>
    </v-btn>
    </router-link>
    <v-spacer></v-spacer>

    <v-btn icon>
      <v-icon>search</v-icon>
    </v-btn>
    <v-autocomplete
    v-model="model"
    no-data-text="no se encontraron coincidencias"
    :items="questions"

    >
      <v-slide-x-reverse-transition
      slot="append-outer"
      mode="out-in"
      >
        <v-icon></v-icon>
      </v-slide-x-reverse-transition>
    </v-autocomplete>
 <v-btn flat  @click="search()">BUSCAR</v-btn>

     <v-menu
      bottom
      origin="center center"
      transition="scale-transition"
    >
      <v-btn
        slot="activator"
        color="#343A40"
        dark
      >
      MATERIAS
      </v-btn>


      <v-list v-model="subject">
     
        <v-list-tile  v-for="item in subjects" :key="item.id" :to="{path:'/findsubject/'+item}"
      >
          
          <v-list-tile-title >{{item}}</v-list-tile-title>
        </v-list-tile>
        
      </v-list>
    </v-menu>

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
             v-for="item in items" :key="item.title"  :to="item.path"  
              >   
              <v-list-tile-title v-if="item.title=='salir'" @click="logout()">{{ item.title }}</v-list-tile-title>
                <v-list-tile-title v-else>{{ item.title }}</v-list-tile-title>
              </v-list-tile>
            </v-list>
          </v-menu>
   
  
  </v-toolbar>
   </v-app >
</template>

<script>
import {bus} from '../../main.js';
export default {
    data: () => ({
      items: [
         { title: 'preguntas'  ,path:"/preguntas"},
        { title: 'perfil' ,path:"/perfil"},
        { title: 'editar' ,path:"/editar"},
        { title: 'salir' },
      
      ],
      questions:[],
      subjects:[],
      subject:"",
      model:'D:',
      temp: '',
      questions2:[]
    }),
     created:function(){
this.getmateria();
  },
    created(){
          var Header = {
      headers: {
        "Content-Type": "application/json",
        Authorization: "Bearer " + this.$auth.getToken()
      }
    };
        this.$http.get("api/subjects").then(response => {
      response.data.forEach(element => {
        this.subjects.push(element.name);
            
      });
            this.$http.get("api/question", Header).then((response) => {
          response.body.forEach(element => {
            this.questions.push(element.title);  
              
          });
      });
    });


        this.questions2=this.questions;
    },
    
    
    methods:{
      search(){
        this.temp=this.model
        this.model='D:'
        this.questions=this.questions2;
        this.$router.push("/findquestion/" + this.temp)
        
      },


  logout() {
      this.$auth.destroyToken();
      this.$router.push("/login");
    },
      getmateria:function(){
        this.$http.get('api/materia/').then(function(responde){
       console.log(this.subject)
        })
        

  },
    }
  }
</script>

<style>
</style>
