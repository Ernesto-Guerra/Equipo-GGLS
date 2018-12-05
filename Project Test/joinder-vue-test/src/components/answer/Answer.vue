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
            <v-btn @click="report(answer.id,actual_id)" flat color="red">Reportar</v-btn>
          </v-card-actions>
        </v-card>
      </v-flex>
    </v-layout>
    <br>
  </div>
</template>

<script>
export default {
  props: {
    answer: {},
    user: {},
    question: {}
  },
  data(){
    return{
      actual_id:''
    }
  },
  created(){
        var Header = {
      headers: {
        "Content-Type": "application/json",
        Authorization: "Bearer " + this.$auth.getToken()
      }
    };
    this.actual_id=this.$auth.getUserId()
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


    },
    report(ans_id,us_id){

      let data={
        answer_id:ans_id,
        user_id:us_id
      }

      console.log(data)
      this.$http.post("api/report",data, this.Header).then((response)=>{
        console.log(response)
      })
    }
  }
};
</script>

<style scoped>
</style>