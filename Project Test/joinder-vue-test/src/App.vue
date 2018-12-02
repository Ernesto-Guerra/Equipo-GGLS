<template>
  <div id="app">        
    <router-view></router-view>   
<dev></dev>
  </div>
</template>

<script>

import footer from './components/footer.vue'
export default {
  
  name: 'App',
  components: {
    dev:footer
  },
  data () {
    return {
      //
    }
  }
}
</script>
