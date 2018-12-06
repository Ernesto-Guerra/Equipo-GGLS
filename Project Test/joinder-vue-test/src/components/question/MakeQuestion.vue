<template>
  <div>
      <v-app light> 

    <v-layout>
      <v-flex xs12 sm8 offset-sm3 style="margin-left:15%;margin-top:5%">
        <v-card>
          <form>
          <v-card-title primary-title>
            <div>
              <h4 class="headline mb-0">Pregunta sobre tu tarea</h4>
            </div>
          </v-card-title>
          <div>
            <v-flex xs12 sm6 md3>
              <v-text-field v-model="title" label="titulo" style="margin-left:10%;"></v-text-field>
            </v-flex>
          </div>

          <div>
            <v-textarea    v-model="description" outline name="input-7-4" label="Descripcion" ></v-textarea>
          </div>

          <v-card-actions>
            <v-flex xs12>
              <v-flex xs12 sm6 d-flex>


       <v-select label="Standard" v-model="subject" :items="subjects">
         <option> {{subjects}} </option>
        <!-- <option selected>Open this select menu</option> -->
        <!-- <option v-for="subject in subjects" :key="subject.id"> {{subject.name}} </option> -->
        </v-select>
      </v-flex>
      <router-link :to="{ path: '/feed' }">
                <v-btn @click="createQ()" style="margin-left:2%" color="red">enviar pregunta</v-btn>
           </router-link> </v-flex>
          
          </v-card-actions>
           </form>
        </v-card>
       
      </v-flex>
    </v-layout>
    <br>
    <br>
     </v-app >
  </div>
</template>

<script>


export default {
  data() {
    return {
      title: "",
      description: "",
      subject: "",
      user_id: "",
      subjects: [],
      items: ['Foo', 'Bar', 'Fizz', 'Buzz']
    };
  },
  created() {
    var Header = {
      headers: {
        "Content-Type": "application/json",
        Authorization: "Bearer " + this.$auth.getToken()
      }
    };

    this.$http.get("api/subjects").then(response => {
      response.data.forEach(element => {
        this.subjects.push(element.name);
      });
            // this.subjects = this.subjects[0].name
      console.log(this.subjects);
    });

    this.user_id = this.$auth.getUserId();
  },
  components: {
  },
  methods: {
    createQ() {
      let data = {
        title: this.title,
        description: this.description,
        subject: this.subject,
        user_id: this.user_id
      };

      this.$http.post("api/question", data, Headers).then(response => {
        console.log(response);
      });
    }
  },
  mounted:{
    


  }
};
</script>

<style scoped>
</style>