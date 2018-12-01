<template>
  <div id="app">        
    <router-view></router-view>   
<dev></dev>
  </div>
</template>

<script>

import footer from '@/components/footer'
import NavbarGuest from '@/components/Navbar/NavbarGuest'
export default {
  
  name: 'App',
  components: {
    rar:NavbarGuest,
    dev:footer
  },
  data () {
    return {
      //
    }
  }
}
</script>
