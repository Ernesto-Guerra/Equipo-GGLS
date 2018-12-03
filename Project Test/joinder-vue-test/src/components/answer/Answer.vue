<template>
  <div>
    <v-layout>
      <v-flex>
        <v-card>
          <v-card-title>
            <div>
              <div>
                <h6>{{user.name}}</h6>
              </div>
              <br>
              <div>{{answer.answer}}</div>
              <br>
              <span class="grey--text">Publicado:{{answer.created_at}}</span>
              <br>
            </div>
          </v-card-title>

          <v-card-actions>
            <v-btn v-if="question.user_id == this.$auth.getUserId() && question.status == 'Pendiente'" @click="score()" flat color="orange">score</v-btn>
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
  props: {
    answer: {},
    user: {},
    question: {}
  },
  created(){
        var Header = {
      headers: {
        "Content-Type": "application/json",
        Authorization: "Bearer " + this.$auth.getToken()
      }
    };
  },
  methods:{
    score(){
      this.$http.put("api/score/" + this.answer.user_id, this.Header).then(response => {
//aqui espero poner una notificacion
      });
      this.$http.put("api/question/" + this.question.id).then((response) => {
        this.question = response.data;
        console.log(this.question);
        console.log('and');
        console.log(response.data);
        this.$emit('Uquestion',this.question);
      });


    }
  }
};
</script>

<style scoped>
</style>