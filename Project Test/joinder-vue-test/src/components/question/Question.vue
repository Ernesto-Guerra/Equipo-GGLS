<template>
    <div >     
      <v-layout >
    <v-flex >
      <v-card >
        <v-card-title primary-title>
          <div>
            <h5 class="headline mb-0 ">{{question.title}}</h5>
             <h6 class=" " >{{question.subject}}</h6>
            <div>{{question.description}}</div>
            <br>
                  <router-link :to="{ path: '/visit/'+user.id}">
                    {{user.name}} 
                    </router-link>
                  <span class="grey--text col-md-5">Publicado:{{question.created_at}}  </span>               
                 <br>
          </div>
        </v-card-title>

        <v-card-actions>
      
           <router-link :to="{ path: '/details/'+question.id}">
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
            question:{},
            user:{},            
        },
        data(){
          return{            
            watching:false
          }         
        },
        created(){            
        },
  methods: {

  }
    }
</script>

<style scoped>

</style>