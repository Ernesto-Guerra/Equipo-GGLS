import Vue from 'vue';
import VueRouter from 'vue-router'
import Login from './components/authentication/Login.vue'
import Register from './components/authentication/Register.vue'
import Feed from './components/Feed.vue'
import MakeQuestion from './components/question/MakeQuestion.vue'
import QuestionDetails from './components/question/QuestionDetails.vue'
import Myquestion from './components/question/Myquestion.vue'
import Question from './components/question/Question.vue'
import Welcome from './components/welcome/welcome.vue'
import NavbarUser from './components/Navbar/NavbarUser.vue'
import Profile from './components/Profile.vue'
import Edprofile from './components/Edprofile.vue'
import FindQuestion from './components/question/FindQuestion.vue'
import FindMateria from './components/FindMateria.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    mode:'history',
    routes:[
        {
            path:"/navbar",
            component:NavbarUser,
      
        },
        {
            path:"/",
            component:Welcome,
      
        },
        {
            path:"/login",
            component:Login,
            meta:{
                forVisitors:true
            }
        },
        {
            path:"/register",
            component:Register,
            meta:{
                forVisitors:true
            }
        },
        {
            path:"/feed",
            component:Feed,
            meta:{
                forAuth:true
            }
        },
        {
            path:"/questionform",
            component:MakeQuestion,
            meta:{
                forAuth:true
            }
        },
        {
            path:"/details/:id",
            component:QuestionDetails,
            meta:{
                forAuth:true
            }
        },
        {
            path:"/profile",
            component:Profile,
      
        },
        {
            path:"/editprofile",
            component:Edprofile,
      
        },
        {
            path:"/myquestions",
            component:Myquestion,
      
        },
        {
            path:"/question",
            component:Question,
      
        },
        {
            path:"/findquestion/:title",
            component:FindQuestion,
            meta:{
                forAuth:true
            }
        },
        {
            path:"/findsubject/:subject",
            component:FindMateria,
            meta:{
                forAuth:true
            }
        },
    ]
});

export default router