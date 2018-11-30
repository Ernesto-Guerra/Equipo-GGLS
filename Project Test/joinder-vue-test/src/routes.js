import Vue from 'vue';
import VueRouter from 'vue-router'
import Login from './components/authentication/Login.vue'
import Register from './components/authentication/Register.vue'
import Feed from './components/Feed.vue'
import MakeQuestion from './components/question/MakeQuestion.vue'
import QuestionDetails from './components/question/QuestionDetails'

Vue.use(VueRouter)

const router = new VueRouter({
    mode:'history',
    routes:[
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
            path:"/details:id",
            component:QuestionDetails,
            meta:{
                forAuth:true
            }
        }
    ]
});

export default router