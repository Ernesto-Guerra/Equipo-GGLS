<template>
  <div>

      <v-app id="inspire">
    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="dark">
                <v-toolbar-title style="margin-left:40%;" justify-center>Register </v-toolbar-title>
                <v-spacer></v-spacer>
                <v-tooltip right>
                  <v-btn slot="activator" icon large href="https://codepen.io/johnjleider/pen/wyYVVj" target="_blank">
                    <v-icon large>mdi-codepen</v-icon>
                  </v-btn>
                  <span>Codepen</span>
                </v-tooltip>
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field prepend-icon="person" v-model="email" name="nombre" label="nombre" type="text"></v-text-field>
                 <v-text-field prepend-icon="email" v-model="email" name="email" label="email " type="text"></v-text-field>

                  <v-text-field id="password" v-model="password" prepend-icon="lock" name="password" label="Password" type="password"></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                  <v-btn block  @click="login()" color="error" style="margin-right:30%" dark>Register</v-btn>
                
              </v-card-actions>
<br>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
  </v-app>
    <navbar-guest></navbar-guest><br>

    <div class="row justif
    y-content-center">      
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