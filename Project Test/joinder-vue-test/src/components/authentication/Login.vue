<template>
<div>
  <nav2></nav2>
   <v-app id="inspire">
    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="dark">
                <v-toolbar-title style="margin-left:40%;" justify-center>Login </v-toolbar-title>
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
                  <v-text-field prepend-icon="person" v-model="email" name="login" label="Login" type="text"></v-text-field>
                  <v-text-field id="password" v-model="password" prepend-icon="lock" name="password" label="Password" type="password"></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                  <v-btn block  @click="login()" color="error" style="margin-right:30%" dark>login</v-btn>
                
              </v-card-actions>
<div class="text-xs-center" style="margin-top:5%">No tengo mi cuenta todavía, quiero <a href="/signup?entry=2" class="sg-text sg-text--xsmall sg-text--link sg-text--bold sg-text--blue">registrarme</a>.</div>
<br>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
  </v-app>
<!-- <div>
    <navbar-guest></navbar-guest><br>
    <div class="row justify-content-center">      
      <div class="col col-xs-10 col-sm-6">      
        <div class="card">
          <div class="card-header">
            Login
          </div>
          <div class="card-body">
            <div class="form-group">
              <input v-model="email" class="form-control" type="email" placeholder="Email">
            </div>
            <div class="form-group">
              <input v-model="password" class="form-control" type="password" placeholder="Password">
            </div>
            <button @click="login()" class="btn btn-success pull-right">Login</button>                        

          </div>
        </div>
      </div>      
    </div>
  </div>-->

</div> 
  
</template>

<script>
import NavbarGuest from '../Navbar/NavbarGuest.vue'

export default {
  data() {
    return {
      email: "",
      password: ""
    };
  },
  components:{
   'nav2': NavbarGuest
  },
  methods:{
    login(){
      var data ={
        client_id:2,
        client_secret:'BCJ5Ws3KmGdE8MnylgONcHk8CewRLfHhkktzXVCe',
        grant_type:'password',
        username:this.email,
        password:this.password
      }

      this.$http.post("oauth/token",data).then( (response) =>{
        //console.log(response);

        if(response.ok){
          this.$auth.setToken(response.body.access_token,response.body.expires_in + Date.now())

          this.$http.get("api/user",data).then(response =>{         
            this.$auth.setUserId(response.body.id)
             this.$router.push("/feed")
          })           
        }
        else{
          alert('Datos incorrectos')
        }
        
      })
    }
  }
};
</script>

<style scoped>
</style>