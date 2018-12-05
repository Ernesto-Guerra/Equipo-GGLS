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
                  <v-toolbar-title style="margin-left:40%;" justify-center>Registro</v-toolbar-title>
                  <v-spacer></v-spacer>                  
                </v-toolbar>
                <v-card-text>
                  <v-form>
                    <div>
<v-text-field
                      prepend-icon="person"
                      v-model="name"                      
                      label="Nombre"
                      type="text"
                      name="nombre"
                      v-validate="'required'"
                        :class="{'has-errors': errors.has('nombre')}"
                    ></v-text-field>
                                <FormError :attribute_name="'nombre'" :errors_form="errors"> </FormError>

                  </div>
                    <div>
                         <v-text-field
                      prepend-icon="email"
                      v-model="email"
                      name="email"
                      label="Email "
                      type="email"
                       v-validate="'required|email'"
                :class="{'has-errors': errors.has('email')}"
                    ></v-text-field>
                  <FormError :attribute_name="'email'" :errors_form="errors"> </FormError>

                    </div>
                 <div>
                   
                    <v-text-field
                      id="password"
                      v-model="password"
                      prepend-icon="lock"
                      name="password"
                      label="Password"
                      type="password"
                            v-validate="'required|min:6'"
                :class="{'has-errors': errors.has('password')}"
                    ></v-text-field>
                                <FormError :attribute_name="'password'" :errors_form="errors"> </FormError>

                 </div>

                  </v-form>
                </v-card-text>
                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn
                    block
                    @click="register()"
                    color="error"
                    style="margin-right:30%"
                    dark
                  >Registrar</v-btn>
                </v-card-actions>
                <br>
              </v-card>
            </v-flex>
          </v-layout>
        </v-container>
      </v-content>
    </v-app>    
    <br>

    <!-- <div class="row justif
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
    </div>-->
  </div>
</template>

<script>
import NavbarGuest from "../Navbar/NavbarGuest.vue";
    import FormError from '../FormError';
export default {
  data() {
    return {
      name: "",
      email: "",
      password: ""
    };
  },
  components: {
    nav2: NavbarGuest,
    FormError
  },
  methods:{
    register(){
      let data ={
        name:this.name,
        email:this.email,
        password:this.password
      }
      
      console.log(data);
      this.$http.post('api/register',data).then((response)=>{
        console.log(response)
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