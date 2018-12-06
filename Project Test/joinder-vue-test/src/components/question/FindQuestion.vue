<template>
  <div>

    <v-app light>
      <v-content>

     
        <br>

        <div class="row justify-content-center">
          <div class="col col-xs-10 col-sm-6">
            <div v-if="validacion == 'D:'">
                <h1> Estas bien meco </h1>
            </div>
                <div v-else v-for="question in questions" :key="question.id" >
      {{findUser(question.user_id)}}
      <Question :question="question" :user="user" ></Question>      
    <br>
    </div>

          </div>
        </div>
      </v-content>
    </v-app>
  </div>
</template>

<script>
import Question from './Question.vue'
import router from '../../routes';
export default {
  data() {
    return {
    questions: [],
    users: [],
    user: {},
    validacion:'',
    cosa:'false'
    };
  },
  created() {
    var Header = {
      headers: {
        "Content-Type": "application/json",
        'Authorization': "Bearer "+this.$auth.getToken(),
      }
    };

    this.$http.get("api/users").then((response) => {
      this.users = response.body;

    this.$http.get("api/questionNew/" + this.$route.params.title,Header).then((response) => {
        this.questions = response.body;
      });
    });

this.validacion = this.$route.params.title

  },
  updated(){

  },

  components: {

    Question
  },

  methods: {

    recargar(){

    },


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
</style>