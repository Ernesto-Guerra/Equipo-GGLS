<template>
  <div>
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
  </div>
</template>

<script>
import NavbarGuest from '../NavbarGuest.vue'

export default {
  data() {
    return {
      email: "",
      password: ""
    };
  },
  components:{
    NavbarGuest
  },
  methods:{
    login(){
      var data ={
        client_id:2,
        client_secret:'UWVdenR1iOHZxToGp2O5clcE6SInIdQaGSNQm9R2',
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