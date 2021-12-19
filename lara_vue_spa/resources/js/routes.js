const Home = () => import('./components/Home.vue')
const Contacto = () => import('./components/Contacto.vue')

// importamos componentes
const Mostrar = () => import('./components/blogs/Mostrar.vue')
const Crear = () => import('./components/blogs/Crear.vue')
const Editar = () => import('./components/blogs/Editar.vue')

export const routes = [
    {
        name:'home',
        path:'/',
        component:Home
    },{
        name:'contacto',
        path:'/contacto',
        component:Contacto
    },{
        name:'mostrarBlogs',
        path:'/blogs',
        component:Mostrar
    },{
        name:'crearBlog',
        path:'/crear',
        component:Crear
    },{
        name:'editarBlogs',
        path:'/editar/:id',
        component:Editar
    }
    
]