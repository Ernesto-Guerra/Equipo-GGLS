<template>
  <div>
   <navu></navu>
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
import NavbarUser from "./Navbar/NavbarUser.vue";
import Question from './question/Question.vue'
export default {
  data() {
    return {
    questions: [],
    users: [],
    user: {},
    validacion:''
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

console.log(this.$route.params.subject);
    this.$http.get("api/materia/" + this.$route.params.subject,Header).then((response) => {
        this.questions = response.body;
      });
    });

this.validacion = this.$route.params.title

  },
  components: {
    'navu':NavbarUser,
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
</style>