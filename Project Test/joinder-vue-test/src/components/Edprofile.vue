<template>

<div>
    <nav2></nav2>
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
                        <v-btn class="btn btn-primary"  @click="guardar()"> 
                            Guardar cambios
                        </v-btn>
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
                                                <p>{{info.matricula}}</p>
                                                <v-textarea  outline name="input-7-4" label="Respuesta" v-model="answer"></v-textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Nombre completo</label>
                                            </div>
                                            <div class="col-md-5">
                                                <p>{{ user.name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-5">
                                                <p>{{ user.email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Telefono</label>
                                            </div>
                                            <div class="col-md-5">
                                                <p>{{info.telephone}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Carrera</label>
                                            </div>
                                            <div class="col-md-5">
                                                <p>{{info.career}}</p>
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
import NavbarUser from './Navbar/NavbarUser.vue';

export default {
    
   data() {
         return{          
            user: {},
            infos:[],
            info:{},
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
    'nav2':NavbarUser
    },
     methods: {
    findInfo(id) {
      this.infos.forEach(element => {
        if (element.user_id == id) {
          this.info = element;          
        }
      });
    },
    sendAnswer() {
      let data = {
        answer: this.answer,
        question_id: this.question.id,
        user_id: this.user_id
      };

      this.$http.post("api/answer", data).then(response => {
        this.answers.push(response.body);
        this.answer = "";
      });
    },
  }
}
</script>