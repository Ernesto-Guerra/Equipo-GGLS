<template>
  <div>
    <navbar-user></navbar-user>
    <button @click="logout()" class="btn btn-primary">CERRAR SESION</button>
    <br>

    <div class="row justify-content-center">
      <div class="col col-xs-10 col-sm-6">
        <all-questions></all-questions>
        </div>
    </div>
  </div>
</template>

<script>
import NavbarUser from "./Navbar/NavbarUser.vue";
import AllQuestions from "./question/AllQuestions.vue";
export default {
  data() {
    return {

    };
  },
  created() {

  },
  components: {
    NavbarUser,
    AllQuestions
  },
  methods: {
    logout() {
      this.$auth.destroyToken();

      this.$router.push("/login");
    }    
  }
};
</script>

<style scoped>
</style>