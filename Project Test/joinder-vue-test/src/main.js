import Vue from 'vue'
import './plugins/vuetify'
import './plugins/vuetify'
import App from './App.vue'
import Router from './routes.js'
import VueResource from 'vue-resource'
import Vuetify from 'vuetify'
Vue.use(Vuetify)
import Auth from './packages/auth/Auth.js'
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);
Vue.config.productionTip = false

Vue.use(VueResource)
Vue.use(Auth)

// Ruta del endpoint
Vue.http.options.root="http://localhost:8000"
Vue.http.headers.common['Authorization'] = 'Bearer ' + Vue.auth.getToken()

Router.beforeEach(
  (to,from,next) =>{    
    if(to.matched.some(record => record.meta.forVisitors)){      
      console.log('Para visitantes')
      if(Vue.auth.isAuthenticated()){
        console.log('Autenticado no debe ver vistas de visitantes')
        next('/feed')
      }
      else{
        next()
      }
    }
    else if(to.matched.some(record => record.meta.forAuth)){
      console.log('Para autenticados')
      if(!Vue.auth.isAuthenticated()){    
        console.log('No autenticado no debe ver vistas de usuarios')    
        next('/login')
      }
      else{
        next()
      }      
    }
    else{
      console.log('No visitantes')
      next()
    }
    
  }
)

new Vue({
  render: h => h(App),
  router: Router
}).$mount('#app')
