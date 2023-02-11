<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link :href="'/dashboard'">
        <img width="60" height="60" :src="image" alt="Logo Paso">
    </Link>
</template>

<script>
    import image from '../../image/logo/logo.jpg'

    export default {
        data(){
            return{
                image:image
            }
        }
    }
</script>
