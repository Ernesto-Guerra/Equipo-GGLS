<template>
  <div>
    <navbar-user></navbar-user>
    <br>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <form action="" v-on:submit.prevent="createQ()">
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
    </div>
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
      subjects: [],      
    };
  },
  created() {
    
    var Header = {
      headers: {
        "Content-Type": "application/json",
        'Authorization': "Bearer "+this.$auth.getToken(),
      }
    }

    this.$http.get("api/subjects").then(response => {
      this.subjects = response.body;
    });

    this.user_id=this.$auth.getUserId()
  },
  components: {
    NavbarUser
  },
  methods: {
    createQ() {            

      let data = {
        title:this.title,
        description:this.description,
        subject:this.subject,
        user_id:this.user_id        
      };

      this.$http.post("api/question",data,Headers).then(response => {          
        console.log(response)
      });      
    }
  }
};
</script>

<style scoped>
</style>