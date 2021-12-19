<template>
    <main>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <router-link exact-active-class="active" to="/" class="nav-link active" aria-current="page">Inicio</router-link>
          </li>
          <li class="nav-item">
            <router-link exact-active-class="active" to="/blogs" class="nav-link" aria-current="page">Blogs</router-link>
          </li>
          <li class="nav-item">
            <router-link exact-active-class="active" to="/contacto" class="nav-link" aria-current="page">Contacto</router-link>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div>
      <router-view></router-view>
    </div>
    </main>
</template>