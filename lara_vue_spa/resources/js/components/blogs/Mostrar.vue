<template>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <router-link :to='{name:"crearBlog"}' class="btn btn-primary">Nuevo</router-link>
        </div>

        <div class="col-12">
            <div class="table-responsive">
                <div class="bg-primary text-white">
                    <thead>
                        <th>id</th>
                        <th>Titulo</th>
                        <th>Contenido</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <tr v-for="blog in blogs" :key="blog.id">
                            <td>{{blog.id}}</td>
                            <td>{{blog.titulo}}</td>
                            <td>{{blog.contenido}}</td>
                            <td>
                                <router-link :to='{name:"editarBlogs",params:{id:blog.id}}' class="btn btn-info">Editar</router-link>
                                <a type="button" @click="borrarBlog(blog.id)" class="btn btn-danger"></a>
                            </td>
                        </tr>
                    </tbody>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "blogs",
    data(){
        return{
            blogs:[]
        }
    },mounted(){
        this.mostrarBlogs()
    },methods: {
        async mostrarBlogs(){
            await this.axios.get('/api/blog')
                .then(response=>{
                    this.blogs=response.data
                })
                .cath(error=>{
                    this.blog = []
                })
        }
    },borrarBlog(id){
        if (confirm("esta seguro?")) {
            this.axios.delete("/api/blog/${id}")
            .the(response=>{
                this.mostrarBlogs()
            }).cath(error=>{
                    console
                })
        }
    }
}
</script>