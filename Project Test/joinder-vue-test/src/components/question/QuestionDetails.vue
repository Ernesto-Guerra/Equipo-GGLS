<template>
  <div>
    <navbar-user></navbar-user>
    <br>
    <div class="row justify-content-center">
      <div class="col col-sm-8">
        <question v-if="ready" :question="question" :user="user"></question>
      </div>
    </div>
    <br>
    <div class="row justify-content-center">
      <div class="col col-sm-8">
        <h4>Respuestas</h4>        
        <textarea class="form-control border border-secondar rounded" v-model="answer"></textarea>

        <div class="row justify-content-end">
          <div class="col col-sm-2">
            <button @click="sendAnswer()" class="btn btn-info">Responder</button>
          </div>
        </div>

        <div v-if="ready">
          <div class="row" v-for="answer in answers" :key="answer.id">
              <div class="col col-sm-12">
                  <answer :answer="answer" :user="user"></answer>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Question from "./Question.vue";
import NavbarUser from "../NavbarUser.vue";
import Answer from '../answer/Answer.vue'

export default {
  props: {},
  data() {
    return {
      question: {},
      user: {},
      ready: false,
      answer: "",
      answers: [],
      user_id:''
    };
  },
  components: {
    Question,
    NavbarUser,
    Answer
  },
  created() {
    var Header = {
      headers: {
        "Content-Type": "application/json",
        Authorization: "Bearer " + this.$auth.getToken()
      }
    };

    this.$http
      .get("api/question/" + this.$route.params.id, Header)
      .then(response => {
        this.question = response.body;

        this.$http.get("api/Qanswers/" + this.question.id).then(response => {
          this.answers = response.body;
        });

        this.$http
          .get("api/users/" + this.question.user_id, Header)
          .then(response => {
            this.user = response.body;
            this.ready = true;
            this.user_id=this.$auth.getUserId()
          });
      });
  },
  methods: {
    sendAnswer() {
    
      let data = {
        answer: this.answer,
        question_id: this.question.id,
        user_id: this.user_id
      };

    

      this.$http.post("api/answer", data).then(response => {
        this.answers.push(response.body);
        this.answer = ""
      });
    }
  }
};
</script>

<style scoped>
</style>