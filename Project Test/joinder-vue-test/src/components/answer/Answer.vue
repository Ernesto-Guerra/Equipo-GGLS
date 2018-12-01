<template>
  <div>
      <v-layout >
    <v-flex >
      <v-card  >
        <v-card-title >
          <div>
<div>
 <h6>{{user.name}}</h6>
</div>
<br>
            <div>  {{answer.answer}}</div>
            <br>
                 <span class="grey--text">            Publicado:{{answer.created_at}}       </span><br>
          </div>
        </v-card-title>

        <v-card-actions>
      

          <v-btn   flat color="orange">Explore</v-btn>                   
         
         
        </v-card-actions>
      </v-card>
    </v-flex>
  </v-layout>   
  <br>
    <!-- <div class="card">
      <div class="card-header">{{user.name}}</div>
      <div class="card-body">
        {{answer.answer}}
        <footer class="blockquote-footer">
           Publicado:{{answer.created_at}}          
            <button class="btn btn-danger">Reportar</button>        
        </footer>
      </div>
    </div>
    <br>-->
  </div> 
</template>

<script>
export default {
    props:{
        answer:{},
        user:{}
    }
};
</script>

<style scoped>
</style>