<template>
    <div >     
      <v-layout >
    <v-flex >
      <v-card >
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
      
           <router-link :to="{ path: 'details'+question.id}">
          <v-btn  v-if="!watching" flat color="orange">Explore</v-btn>                   
          </router-link>  
         
        </v-card-actions>
      </v-card>
    </v-flex>
  </v-layout>   
      <!-- <div class="card">
        <div class="card-header">{{question.title}} ---------- {{question.subject}}</div>
        <div class="card-body">
          {{question.description}}
          <footer class="blockquote-footer">
            {{user.name}} _____________________________________ Publicado:{{question.created_at}}
            

            <router-link :to="{ path: 'details'+question.id}">
              <button v-if="!watching" class="btn btn-info">Ver</button>               
              </router-link>      
          </footer>
        </div>
      </div> -->
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