<template>
  <div>
    <navbar-user></navbar-user>

    <v-layout>
      <v-flex xs12 sm8 offset-sm3 style="margin-left:15%;margin-top:5%">
        <v-card>
          <form action v-on:submit.prevent="createQ()">
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
            <v-textarea    v-model="description" outline name="input-7-4" label="Respuesta" ></v-textarea>
          </div>

          <v-card-actions>
            <v-flex xs12>
              <v-flex xs12 sm6 d-flex>
        <v-select
          :items="items"
          label="Standard"
          style="margin-left:3%"
        ></v-select>
      </v-flex>
                <v-btn type="submit" style="margin-left:2%" color="red">enviar pregunta</v-btn>
            </v-flex>
          
          </v-card-actions>
           </form>
        </v-card>
       
      </v-flex>
    </v-layout>
    <br>
    <!-- <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <form action v-on:submit.prevent="createQ()">
              <div class="form-group shadow-textarea">
                <h4>Pregunta sobre tu tarea</h4>
                <div class="form-group row">
                  <label for>Titulo:</label>
                  <input type="text" v-model="title">
                  <textarea
                    class="form-control border border-secondar rounded"
                    rows="7"
                    placeholder="Escribe tu pregunta "
                    style="border-radius: 5px 5px 5px 5px;"
                    v-model="description"
                  ></textarea>
                </div>
              </div>
              <select
                class="browser-default custom-select"
                style="width: 38%;border-radius: 5px 5px 5px 5px"
                v-model="subject"
              >
                <option selected>Open this select menu</option>
                <option v-for="subject in subjects" :key="subject.id">{{subject.name}}</option>
              </select>
              <button type="submit" class="btn btn-primary">Enviar pregunta</button>
            </form>
          </div>
        </div>
      </div>
    </div> -->
    <br>
  </div>
</template>

<script>
import NavbarUser from "../NavbarUser.vue";

export default {
  data() {
    return {
      title: "",
      description: "",
      subject: "",
      user_id: "",
      subjects: []
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
      this.subjects = response.body;
    });

    this.user_id = this.$auth.getUserId();
  },
  components: {
    NavbarUser
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
  }
};
</script>

<style scoped>
</style>