<template>
  <div>    
    <div v-for="question in questions" :key="question.id" >
      {{findUser(question.user_id)}}
      <question :question="question" :user="user" ></question>      
    <br>
    </div>
    
  </div>
</template>

<script>
import Question from './Question.vue';

export default {
  data() {
    return {
      questions: [],
      users: [],
      user: {}
    };
  },
  created() {
    var Header = {
      headers: {
        "Content-Type": "application/json",
        'Authorization': "Bearer "+this.$auth.getToken(),
      }
    };
    

    this.$http.get("api/users").then(response => {
      this.users = response.body;

      this.$http.get("api/question", Header).then(response => {
        this.questions = response.body;
      });
    });
  },
  components:{
    Question
  },
  methods: {
    findUser(id) {
      this.users.forEach(element => {
        if (element.id == id) {
          this.user = element;          
        }
      });
    }
  }
};
</script>

<style scoped>
.card {
  margin-bottom: 2em;
  text-align: justify;
}
</style>