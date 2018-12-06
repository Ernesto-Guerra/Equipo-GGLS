<template>

<div>
<center><div class="container ">
        
            <form method=""  >
                  {{findInfo(this.$route.params.id)}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img id="" class="" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" style="position:absolute;
        left:27%;
        width:150px;
        height:150px;
        border-radius:150px;
        border:6px solid #666;" /> <br>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div  class="" >
                            
                            <h2>¡Bienvenido {{ user.name}} !</h2>
                                    <h6>
                                       Tipo de usuario: {{info.type}}
                                    </h6>
                                    <p class="proile-rating">Puntos <span>{{ user.score}}</span></p>
                            <ul class="nav nav-tabs" id="" role="tablist">
                                <h2 class="card-title">Datos personales:</h2>
                                
                            </ul>
                        </div>
                        
                    </div>
                    <!-- <div class="col-md-2">
                        <input type="text" class="btn btn-primary" v-if="edit"  value="Guardar cambios" @click="guardar()" />
                        <input type="text" class="btn btn-primary" v-else value="Editar perfil"  @click="editar()" />
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Matrícula: </label>
                                            </div>
                                            <div class="col-md-4">
                                                
                                                <label>{{info.matricula}}</label>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Nombre completo</label>
                                            </div>
                                            <div class="col-md-5">
                                                
                                                
                                                <label >{{ user.name}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Cumpleaños</label>
                                            </div>
                                            <div class="col-md-5">
                                                
                                                <label >{{ info.birthday}}</label>
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-5">
                                                
                                                <label >{{ user.email}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Telefono</label>
                                            </div>
                                            <div class="col-md-5">
                                                
                                                <label >{{info.telephone}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Carrera</label>
                                            </div>
                                            <div class="col-md-5">
                                                
                                                <label >{{info.career}}</label>
                                            </div>
                                        </div>
                                        
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div></center> 

</div>
    
    
</template>

<script>
<<<<<<< HEAD:Project Test/joinder-vue-test/src/components/Visitprofile.vue
import NavbarUser from './Navbar/NavbarUser.vue';
=======

>>>>>>> 573e3a7e13fe3ce7e085447a9e4194702d440ede:Project Test/joinder-vue-test/src/components/Edprofile.vue
export default {
    
   data() {
         return{
             visit_id:'',          
            user: {},
            infos:[],
            info:{}
         };
     },
     created() {
         this.visit_id = this.$route.id;
           var Header = {
      headers: {
        "Content-Type": "application/json",
        Authorization: "Bearer " + this.$auth.getToken()
      }
    };
      this.$http
          .get("api/users/" +this.$route.params.id, Header)
          .then(response => {
              console.log(response);
              console.log(response.data);
              console.log("Si sirvo");
            this.user = response.data;
            
        this.$http.get("api/information", Header).then(response => {
        this.infos = response.body;
            });
            
          });
     },
     
    components: {
    },
     methods: {
    findInfo(id) {
      this.infos.forEach(element => {
        if (element.user_id == id) {
          this.info = element;          
        }
      });
    }
  }
}
</script>