<template>
    <Link :href="'/'">
        <img class="w-60" :src="image" alt="Logo redcode">
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';
    import image from '../../image/logo.png'

    export default defineComponent({
        data(){
            return{
                image:image
            }
        },
        components: {
            Link,
        },
    })
</script>
