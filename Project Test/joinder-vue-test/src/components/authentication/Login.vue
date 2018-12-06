<template>
<div>
   <v-app id="inspire">
    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="dark">
                <v-toolbar-title style="margin-left:40%;" justify-center>Login </v-toolbar-title>
                <v-spacer></v-spacer>
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <div>
                <v-text-field  v-validate="'required|email'"
                :class="{'has-errors': errors.has('email')}" prepend-icon="person" v-model="email" name="email" label="Email" type="email"></v-text-field>
            <FormError :attribute_name="'email'" :errors_form="errors"> </FormError>

                  </div>
                  <div>
                                      <v-text-field  v-validate="'required|confirmed:password'"
                :class="{'has-errors': errors.has('password_confirmation')}" id="password" v-model="password" prepend-icon="lock" name="password" label="Password" type="password"></v-text-field>
            <FormError :attribute_name="'password_confirmation'" :errors_form="errors"> </FormError>

                  </div>
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

</div> 
  
</template>

<script>
  import FormError from '../FormError';

export default {
     name: "form-component",
  data() {
    return {
      email: "",
      password: ""
    };
  },
  components:{
        FormError
  },
  methods:{
    login(){
      var data ={
        client_id:2,
        client_secret:'WSNoLHu6rcwtDD8aZffyNApXymwNAaU5VEUB20Mn',
        grant_type:'password',
        username:this.email,
        password:this.password
      }

      this.$http.post("oauth/token",data).then( (response) =>{
        console.log(response);

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
    },
          validateBeforeSubmit: function() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        alert('From Submitted!');
                        return;
                    }
                    //errores
                });
            }
  }
};
</script>

<style scoped>
</style>