<template>
    <div > 
       {{findQuestion(this.$auth.getUserId())}}
          
      <v-layout >
    <v-flex >
      <v-card v-for="data in questions" :key="data">
        <v-card-title primary-title>
          <div>
            <h5 class="headline mb-0 ">{{question.title}}  </h5>
             <h6 class=" " >{{question.subject}}</h6>        
            <div>{{question.description}}</div>
            <br>
                  <span class="grey--text">     {{user.name}} </span>
                  <span class="grey--text col-md-5">Publicado:{{question.created_at}}  </span>               
                 <br>
          </div>
          
        </v-card-title>

        <v-card-actions>

          <router-link :to="{ path: 'profile'}">
          <v-btn  flat color="green">Visitar perfil</v-btn>                   
          </router-link>  
          
           <router-link :to="{ path: 'details'+data.id}">
          <v-btn  v-if="!watching" flat color="orange">Explore</v-btn>                   
          </router-link>  
         
        </v-card-actions>
      </v-card>
    </v-flex>
  </v-layout>   
    
    </div>
</template>

<script>
    export default {
        props:{
             questions:[],
            question:[],
            user:{},            
        },
        data(){
          return{            
            watching:false
          }         
        },
        created(){  
          var Header = {
      headers: {
        "Content-Type": "application/json",
        'Authorization': "Bearer "+this.$auth.getToken(),
      }
    };
          this.$http
          .get("api/users/" + this.$auth.getUserId(), Header)
          .then(response => {
              console.log(response);
              console.log(response.data);
              console.log("Si sirvo");
            this.user = response.data;
            
        this.$http.get("api/question", Header)
        .then(response => {
        this.questions = response.data;
        console.log(response.data);
            });
          });    
        },
  methods: {
    findQuestion(id) {
      this.questions.forEach(element => {
        if (element.user_id == id) {
          this.question = element;
          console.log(element);        
        }
      });
    }

  }
    }
</script>

<style scoped>

</style>