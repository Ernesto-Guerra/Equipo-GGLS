<template>
    <div>        
      <div class="card">
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
      </div>
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