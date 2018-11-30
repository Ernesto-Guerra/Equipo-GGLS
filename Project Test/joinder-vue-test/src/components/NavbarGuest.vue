<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#"><img src="https://wiki.videolan.org/images/Ubuntu-logo.png" alt="NO LOAD" height="45"></a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <router-link :to="{ path: '' }">
              <i class="fas fa-home"></i>
              <span class="sr-only">(current)</span>  
              </router-link>                        
          </li>
          <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
          </li>-->
        </ul>

        <!-- Example single danger button -->
        <div class="btn-group">
          <router-link :to="{ path: 'login' }">
          <button class="btn btn-warning">Iniciar Sesion</button>
          </router-link>

          <router-link :to="{ path: 'register' }">
          <button class="btn btn-danger">Registro</button>
          </router-link>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
</style>