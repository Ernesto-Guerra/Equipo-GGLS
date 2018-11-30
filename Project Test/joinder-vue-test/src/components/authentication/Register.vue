<template>
  <div>
    <navbar-guest></navbar-guest><br>

    <div class="row justify-content-center">      
      <div class="col col-xs-10 col-sm-6">
        <div class="card">
          <div class="card-header">
            Registro
          </div>
          <div class="card-body">
            <div class="form-group">
              <input v-model="nombre" class="form-control" type="text" placeholder="Nombre">
            </div>
            <div class="form-group">
              <input v-model="email" class="form-control" type="email" placeholder="Email">
            </div>
            <div class="form-group">
              <input v-model="password" class="form-control" type="password" placeholder="Password">
            </div>
            <button class="btn btn-success pull-right">Registro</button>
          </div>
        </div>
      </div>      
    </div>
  </div>
</template>

<script>
import NavbarGuest from '../NavbarGuest.vue'

export default {
  data() {
    return {
      nombre: "",
      email: "",
      password: ""
    };
  },
  components:{
    NavbarGuest
  }
};
</script>

<style scoped>
</style>