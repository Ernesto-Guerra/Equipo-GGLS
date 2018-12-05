<template>
  <div>
        <v-app >
    <br> 
    <div class="row justify-content-center">
      <div class="col col-sm-8">
        <question v-if="ready" :question="question" :user="user"></question>
      </div>
    </div>
    <br>
    <div class="row justify-content-center">
      <div class="col col-sm-8">
        <v-layout>
          <v-flex>
            <v-card v-if="question.status == 'Pendiente'">
              <v-card-title primary-title>
                <div>
                  <h4 class="headline mb-0">Respuesta</h4>
                </div>
              </v-card-title>
              <div>
                <v-textarea  outline name="input-7-4" label="Respuesta" v-model="answer"></v-textarea>
              </div>
              <v-card-actions>
                <v-btn flat @click="sendAnswer()" color="orange">responder</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
<br>
        <div v-if="ready">
          <div class="row" v-for="answer in answers" :key="answer.id">
              <div class="col col-sm-12">
                  <answer :answer="answer" :user="user" :question="question" @Uquestion="Rquestion(...arguments)"></answer>
              </div>
          </div>
        </div>
      </div>
    </div>
       </v-app >
  </div>
</template>

<script>
import Question from "./Question.vue";
import Answer from "../answer/Answer.vue";

export default {
  props: {},
  data() {
    return {
      question: {},
      user: {},
      ready: false,
      answer: "",
      answers: [],
      user_id: ""
    };
  },
  components: {
    Question,
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
            this.user_id = this.$auth.getUserId();
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
        this.answer = "";
      });
    },
    Rquestion(temp){
      this.question = temp;
      console.log('si me ejecuto');
      console.log(temp);
    },
  }
};
</script>

<style scoped>
</style>