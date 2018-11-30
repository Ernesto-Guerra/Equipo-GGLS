<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="/feed"><img src="https://wiki.videolan.org/images/Ubuntu-logo.png" alt="NO LOAD" height="45"></a>
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
            <a class="nav-link" href="/feed"><i class="fas fa-home"></i>
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
          </li>-->
        </ul>

        <!-- Example single danger button -->
        <div class="btn-group">
          <button
            type="button"
            class="btn btn-danger dropdown-toggle"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <i class="fas fa-bars"></i>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Ver perfil</a>
            <a class="dropdown-item" href="#">Editar perfil</a>
            <a class="dropdown-item" href="#">Cerrar Sesion</a>
          </div>
        </div>

        <form class="form-inline my-2 my-lg-0">
          <input
            id="busqueda"
            class="form-control mr-sm-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
          >
          <button class="btn btn-warning my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style scoped>

</style>