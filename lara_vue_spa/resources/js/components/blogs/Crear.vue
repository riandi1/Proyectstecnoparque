<template>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card" style="width: 18rem">
          
          <div class="card-body">
            <h5 class="card-title">Crear</h5>
            <form @submit.prevent="crear">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="">Titulo</label>
                    <input type="text" v-model="blog.titulo" />
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1"
                      >Example textarea</label
                    >
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="3" v-model="blog.contenido"
                    ></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    name:"crear-blog",
    data(){
        return{
            blog:{
                titulo:"",
                contenido:""
            }
        }
    },methods:{
        async crear(){
            await this.axios.post('/api/blog',this.blog)
            .then(response=>{
                this.$router.push({name:"mostrarBlogs"})
            })
            .catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>