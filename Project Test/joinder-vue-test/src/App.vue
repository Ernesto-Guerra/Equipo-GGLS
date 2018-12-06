<template>
  <div id="app">  
    <navbar-user></navbar-user>      
    <router-view></router-view>   
<dev></dev>
  </div>
</template>

<script>

import footer from './components/footer.vue'
import NavbarUser from './components/Navbar/NavbarUser.vue'
export default {
  
  name: 'App',
  components: {
    dev:footer,
    NavbarUser
  },
  data () {
    return {
      //
    }
  }
}
</script>
