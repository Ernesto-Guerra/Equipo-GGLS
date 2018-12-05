<template>

<div>
<center><div class="container ">
        
            <form method=""  >
                  {{findInfo(this.$auth.getUserId())}}
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
                    <div class="col-md-2">
                        <input type="text" class="btn btn-primary" v-if="edit"  value="Guardar cambios" @click="guardar()" />
                        <input type="text" class="btn btn-primary" v-else value="Editar perfil"  @click="editar()" />
                    </div>
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
                                                <input v-if="edit" v-model="info.matricula" value="" type="text">
                                                <label v-else>{{info.matricula}}</label>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Nombre completo</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input v-if="edit" v-model="user.name" value="" type="text">
                                                
                                                <label v-else>{{ user.name}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Cumpleaños</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input v-if="edit" v-model="info.birthday" value="" type="text">
                                                <label v-else>{{ info.birthday}}</label>
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input v-if="edit" v-model="user.email" value="" type="text">
                                                <label v-else>{{ user.email}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Telefono</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input v-if="edit" v-model="info.telephone" value="" type="text">
                                                <label v-else>{{info.telephone}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Carrera</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input v-if="edit" v-model="info.career" value="" type="text">
                                                <label v-else>{{info.career}}</label>
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
export default {
    
   data() {
         return{          
            user: {},
            infos:[],
            info:{},
            edit:false,
         };
     },
     created() {
           var Header = {
      headers: {
        "Content-Type": "application/json",
        Authorization: "Bearer " + this.$auth.getToken()
      }
    };
      this.$http
          .get("api/users/" + this.$auth.getUserId(), Header)
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
         editar(){
            this.edit=true
         },
        guardar() {
      let data = {
        user_id: this.$auth.getUserId(),
        career: this.info.career,
        birthday: this.info.birthday,
        telephone: this.info.telephone,
        matricula: this.info.matricula,
              
      };
      let datos ={
        name: this.user.name,
        email: this.user.email, 
      };

      this.$http.put("api/information/"+this.$auth.getUserId(), data).then(response => {
        console.log("Si jalaaaaaaaaaaa");

        this.$http.put("api/users/"+this.$auth.getUserId(), datos).then(response => {
        console.log("Si jaloooooooooooo");
        this.edit=false;
      });
        
      });
      
      
    },
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