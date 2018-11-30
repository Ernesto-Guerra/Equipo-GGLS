<template>
  <div>
    <div class="card">
      <div class="card-header">{{user.name}}</div>
      <div class="card-body">
        {{answer.answer}}
        <footer class="blockquote-footer">
           Publicado:{{answer.created_at}}          
            <button class="btn btn-danger">Reportar</button>        
        </footer>
      </div>
    </div>
    <br>
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