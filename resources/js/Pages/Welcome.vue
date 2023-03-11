<script>
    import { Head, Link } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    // Import Swiper Vue.js components
    import { Swiper, SwiperSlide } from "swiper/vue";
    import AuthenticationCardNew from '@/ComponentsNew/AuthenticationCardVue.vue';
    import AuthenticationCardLogoNew from '@/ComponentsNew/AuthenticationCardLogoVue.vue';
    import FooterVue from '@/ComponentsNew/FooterVue.vue';
    import NavLink from '@/Components/NavLink.vue';
    import SecundaryButton from '@/ComponentsNew/SecundaryButton.vue';
    import ProductVue from '@/ComponentsNew/ProductVue.vue';

    // Import Swiper styles
    import "swiper/css";

    import "swiper/css/navigation";

    // import required modules
    import { Navigation } from "swiper";

    export default {
        components: {
            Head,
            AppLayout,
            Swiper,
            SwiperSlide,
            Link,
            AuthenticationCardLogoNew,
            AuthenticationCardNew,
            FooterVue,
            NavLink,
            SecundaryButton,
            ProductVue,
        },
        setup() {
            return {
                modules: [Navigation],
            };
        },
        props: {
            canLogin:Boolean,
            canRegiser: Boolean,
            products: Object,
            headlines: Object,

            }
    }
</script>

<!--script setup
    >
    defineProps({
        canLogin: Boolean,
        canRegister: Boolean,

    });
</!--script -->

<template>
    <Head title="Paso Blanco" />
    <!--AppLayout-->
    <!--div class="min-h-screen bg-gray-100"-->
        <nav class="navbar navbar-fixed fixed py-2 bg-white border-b border-gray-100 top-0 left-0 right-0 z-50 bg-gray-900 text-white">
                <!-- Primary Navigation Menu -->
                <div class="container mx-auto px-4 max-w-7xl sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <AuthenticationCardLogoNew />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                <div class="hidden space-x-8 pt-6 sm:-my-px sm:ml-10 sm:flex">
                                    <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 dark:text-gray-500 underline">
                                        Dashboard
                                    </Link>

                                    <template v-else>
                                        <!--Link :href="route('users.index')" :active="route().current('users.*')" class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8">
                                            Fotos
                                        </-Link>
                                        <Link :href="route('users.index')" :active="route().current('users.*')" class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8">
                                            BlancosGrand
                                        </Link>
                                        <Link-- :href="route('users.index')" :active="route().current('users.*')" class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8">
                                            Cuotas
                                        </Link-->

                                        <Link :href="route('headlines.index')" :active="route().current('headlines.*')" class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8">
                                            Titulares
                                        </Link>

                                        <Link :href="route('products.index')" :active="route().current('products.*')" class="transform text-gray-700 transition-colors duration-300 hover:text-blue-500 dark:text-gray-200 dark:hover:text-blue-400 lg:mx-8">
                                            Tienda
                                        </Link>

                                        <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>

                                        <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</Link>
                                    </template>
                                </div>
                            </div>
                        </div>
                        <div>
                            <ApplicationMark class="h-12= x-auto"></ApplicationMark>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name">
                                        </button>

                                        <span v-else class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ $page.props.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition" @click="showingNavigationDropdown = ! showingNavigationDropdown">
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Inicio
                        </ResponsiveNavLink>
                        <!--ResponsiveNavLink :href="route('users.index')" :active="route().current('users.*')">
                            Usuarios
                        </!--ResponsiveNavLink -->
                    </div>


                    <!-- Responsive Settings Options -->
                    <!--div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="shrink-0 mr-3">
                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name">
                            </div>

                            <div>
                                <div class="font-medium text-base text-gray-800">
                                    {{ $page.props.user.name }}
                                </div>
                                <div class="font-medium text-sm text-gray-500">
                                    {{ $page.props.user.email }}
                                </div>
                            </div>
                        </div -->
            </div>
        </nav>

        <div class="container mx-auto px-6 py-8 mt-8 text-center">
            <button class="rounded-lg px-6 pt-8 text-center text-sm font-medium capitalize leading-5 focus:outline-none lg:mx-0 lg:w-auto">
                <img src="../../image/logo/logo.jpg" alt="logo Paso Blanco" width="300" height="300">
            </button>
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white xl:text-4xl">Paso Blanco de Huercal-Overa</h1>
            <p class="mt-6 text-gray-500 dark:text-gray-300">Real Hermandad de Nuestra Señora de las Angustias y San Juan</p>
            <button class="mt-6 rounded-lg bg-blue-600 px-6 py-2.5 text-center text-sm font-medium capitalize leading-5 text-white focus:outline-none lg:mx-0 lg:w-auto transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-blue-800 duration-200">
                Hazte hermano
            </button>
            <p class="mt-3 text-sm text-gray-400">No credit card required</p>
        </div>

        <!-- div class="mt-10 flex justify-center">
            <img class="h-96 w-full rounded-xl object-cover lg:w-4/5" src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1632&q=80" />
        </!-->
        <!-- Carousel -->
        <div class="mt-10 flex justify-center">
            <swiper :navigation="true" :modules="modules" class="mySwiper h-96 w-full rounded-xl object-cover lg:w-4/5">
            <swiper-slide>
                <img
                    className="object-fill h-96 w-full "
                    src="../../image/carrusel/ViregenAngustias.jpg"
                    alt="image slide 1"
                />
            </swiper-slide>
            <swiper-slide>
                <img
                    className="object-fill w-full h-96"
                    src="../../image/carrusel/virgenAgonia.jpg"
                    alt="image slide 1"
                />
            </swiper-slide>
            <swiper-slide>
                <img
                    className="object-fill w-full h-96"
                    src="../../image/carrusel/SanJuanBnadera.jpg"
                    alt="image slide 1"
                />
                </swiper-slide>
                <swiper-slide>
                <img
                    className="scale-down w-full h-96"
                    src="../../image/carrusel/caida.jpg"
                    alt="image slide 1"
                />
                </swiper-slide>
                <swiper-slide>
                <img
                    className="object-fill w-full h-96"
                    src="../../image/carrusel/cautivo.jpg"
                    alt="image slide 1"
                />
                </swiper-slide>
                <swiper-slide>
                <img
                    className="object-fill w-full h-96"
                    src="../../image/carrusel/cristoSangre.jpg"
                    alt="image slide 1"
                />
                </swiper-slide>
                <swiper-slide>
                <img
                    className="object-fill w-full h-96"
                    src="../../image/carrusel/caida.jpg"
                    alt="image slide 1"
                />
                </swiper-slide>
            </swiper>
        </div>

    <section class="bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 py-10">
        <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">Fotos</h1>

        <p class="mt-4 text-center text-gray-500 dark:text-gray-300">Registate y descarga tus fotos en maxima resolución</p>

        <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-12 xl:grid-cols-3 xl:gap-12">
            <div class="flex justify-center">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light">
                    <img class="rounded-t-lg" src="../../image/fotos/SemanaSanta2022/Cartel_SS_2022.jpg" alt=""/>
                    </a>
                    <div class="p-6">
                    <h5 class="text-gray-900 text-xl font-medium mb-2">Semana Santa</h5>
                    <p class="text-gray-700 text-base mb-4">
                        Accede al repositorio de fotografias realizadas en nuestra Semana Santa para el Paso Blanco.
                    </p>
                    <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Accede</button>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light">
                    <img class="rounded-t-lg" src="../../image/blog/feria.jpg" alt=""/>
                    </a>
                    <div class="p-6">
                        <h5 class="text-gray-900 text-xl font-medium mb-2">Otras festividades</h5>
                        <p class="text-gray-700 text-base mb-4">
                            Accede al repositoria de fotos de la Caseta del Paso Blanco
                        </p>
                        <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Accede</button>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light">
                    <img class="rounded-t-lg" src="../../image/blog/cultoParoquia.jpg" alt=""/>
                    </a>
                    <div class="p-6">
                        <h5 class="text-gray-900 text-xl font-medium mb-2">Eventos</h5>
                    <p class="text-gray-700 text-base mb-4">
                        Accede al repositorio de fotos de todos lo eventos que se estan realizando en la hermandad.
                    </p>
                    <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Accede</button>
                    </div>
                </div>
            </div>
                </div>
            </div>
    </section>

    <!-- Pasos, redes sociales, rincon del costalero-->
    <section class="bg-white dark:bg-gray-900">
    <div class="h-[32rem] bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-6 py-10">
        <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">Nuestros Pasos</h1>

        <div class="mx-auto mt-6 flex justify-center">
            <span class="inline-block h-1 w-40 rounded-full bg-blue-500"></span>
            <span class="mx-1 inline-block h-1 w-3 rounded-full bg-blue-500"></span>
            <span class="inline-block h-1 w-1 rounded-full bg-blue-500"></span>
        </div>

        <p class="mx-auto mt-6 max-w-2xl text-center text-gray-500 dark:text-gray-300">Siguenosa en las redes sociales y accede al rincon del costalero para estar informado de los proximos ensayos, convivencias y al repositorio fotografico de tu paso.</p>
        </div>
    </div>

    <div class="container mx-auto -mt-72 px-6 py-10 sm:-mt-80 md:-mt-96">
        <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-16 xl:grid-cols-3">
        <div class="flex flex-col items-center rounded-xl border p-4 dark:border-gray-700 sm:p-6">
            <img class="aspect-square w-full rounded-xl object-cover" src="../../image/carrusel/ViregenAngustias.jpg" alt="" />

            <h1 class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white">Nuestra Señora de las Angustias</h1>

            <p class="mt-2 capitalize text-gray-500 dark:text-gray-300">Obra de Francisco Bellver y Collazos.</p>

            <div class="-mx-2 mt-3 flex">
            <!--a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Reddit">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM6.807 10.543C6.20862 10.5433 5.67102 10.9088 5.45054 11.465C5.23006 12.0213 5.37133 12.6558 5.807 13.066C5.92217 13.1751 6.05463 13.2643 6.199 13.33C6.18644 13.4761 6.18644 13.6229 6.199 13.769C6.199 16.009 8.814 17.831 12.028 17.831C15.242 17.831 17.858 16.009 17.858 13.769C17.8696 13.6229 17.8696 13.4761 17.858 13.33C18.4649 13.0351 18.786 12.3585 18.6305 11.7019C18.475 11.0453 17.8847 10.5844 17.21 10.593H17.157C16.7988 10.6062 16.458 10.7512 16.2 11C15.0625 10.2265 13.7252 9.79927 12.35 9.77L13 6.65L15.138 7.1C15.1931 7.60706 15.621 7.99141 16.131 7.992C16.1674 7.99196 16.2038 7.98995 16.24 7.986C16.7702 7.93278 17.1655 7.47314 17.1389 6.94094C17.1122 6.40873 16.6729 5.991 16.14 5.991C16.1022 5.99191 16.0645 5.99491 16.027 6C15.71 6.03367 15.4281 6.21641 15.268 6.492L12.82 6C12.7983 5.99535 12.7762 5.993 12.754 5.993C12.6094 5.99472 12.4851 6.09583 12.454 6.237L11.706 9.71C10.3138 9.7297 8.95795 10.157 7.806 10.939C7.53601 10.6839 7.17843 10.5422 6.807 10.543ZM12.18 16.524C12.124 16.524 12.067 16.524 12.011 16.524C11.955 16.524 11.898 16.524 11.842 16.524C11.0121 16.5208 10.2054 16.2497 9.542 15.751C9.49626 15.6958 9.47445 15.6246 9.4814 15.5533C9.48834 15.482 9.52348 15.4163 9.579 15.371C9.62737 15.3318 9.68771 15.3102 9.75 15.31C9.81233 15.31 9.87275 15.3315 9.921 15.371C10.4816 15.7818 11.159 16.0022 11.854 16C11.9027 16 11.9513 16 12 16C12.059 16 12.119 16 12.178 16C12.864 16.0011 13.5329 15.7863 14.09 15.386C14.1427 15.3322 14.2147 15.302 14.29 15.302C14.3653 15.302 14.4373 15.3322 14.49 15.386C14.5985 15.4981 14.5962 15.6767 14.485 15.786V15.746C13.8213 16.2481 13.0123 16.5208 12.18 16.523V16.524ZM14.307 14.08H14.291L14.299 14.041C13.8591 14.011 13.4994 13.6789 13.4343 13.2429C13.3691 12.8068 13.6162 12.3842 14.028 12.2269C14.4399 12.0697 14.9058 12.2202 15.1478 12.5887C15.3899 12.9572 15.3429 13.4445 15.035 13.76C14.856 13.9554 14.6059 14.0707 14.341 14.08H14.306H14.307ZM9.67 14C9.11772 14 8.67 13.5523 8.67 13C8.67 12.4477 9.11772 12 9.67 12C10.2223 12 10.67 12.4477 10.67 13C10.67 13.5523 10.2223 14 9.67 14Z"></path>
                </svg>
            </a -->

            <a href="https://www.facebook.com/angustiashuercalovera" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Facebook">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z"></path>
                </svg>
            </a>

            <!-- a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Github">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z"></path>
                </svg>
            </a -->
            </div>
        </div>

        <div class="flex flex-col items-center rounded-xl border p-4 dark:border-gray-700 sm:p-6">
            <img class="aspect-square w-full rounded-xl object-cover" src="../../image/carrusel/SanJuanBnadera.jpg" alt="" />

            <h1 class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white">San Juan Bautista</h1>

            <p class="mt-2 capitalize text-gray-500 dark:text-gray-300">Lead Developer</p>

            <div class="-mx-2 mt-3 flex">
            <!-- a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Reddit">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM6.807 10.543C6.20862 10.5433 5.67102 10.9088 5.45054 11.465C5.23006 12.0213 5.37133 12.6558 5.807 13.066C5.92217 13.1751 6.05463 13.2643 6.199 13.33C6.18644 13.4761 6.18644 13.6229 6.199 13.769C6.199 16.009 8.814 17.831 12.028 17.831C15.242 17.831 17.858 16.009 17.858 13.769C17.8696 13.6229 17.8696 13.4761 17.858 13.33C18.4649 13.0351 18.786 12.3585 18.6305 11.7019C18.475 11.0453 17.8847 10.5844 17.21 10.593H17.157C16.7988 10.6062 16.458 10.7512 16.2 11C15.0625 10.2265 13.7252 9.79927 12.35 9.77L13 6.65L15.138 7.1C15.1931 7.60706 15.621 7.99141 16.131 7.992C16.1674 7.99196 16.2038 7.98995 16.24 7.986C16.7702 7.93278 17.1655 7.47314 17.1389 6.94094C17.1122 6.40873 16.6729 5.991 16.14 5.991C16.1022 5.99191 16.0645 5.99491 16.027 6C15.71 6.03367 15.4281 6.21641 15.268 6.492L12.82 6C12.7983 5.99535 12.7762 5.993 12.754 5.993C12.6094 5.99472 12.4851 6.09583 12.454 6.237L11.706 9.71C10.3138 9.7297 8.95795 10.157 7.806 10.939C7.53601 10.6839 7.17843 10.5422 6.807 10.543ZM12.18 16.524C12.124 16.524 12.067 16.524 12.011 16.524C11.955 16.524 11.898 16.524 11.842 16.524C11.0121 16.5208 10.2054 16.2497 9.542 15.751C9.49626 15.6958 9.47445 15.6246 9.4814 15.5533C9.48834 15.482 9.52348 15.4163 9.579 15.371C9.62737 15.3318 9.68771 15.3102 9.75 15.31C9.81233 15.31 9.87275 15.3315 9.921 15.371C10.4816 15.7818 11.159 16.0022 11.854 16C11.9027 16 11.9513 16 12 16C12.059 16 12.119 16 12.178 16C12.864 16.0011 13.5329 15.7863 14.09 15.386C14.1427 15.3322 14.2147 15.302 14.29 15.302C14.3653 15.302 14.4373 15.3322 14.49 15.386C14.5985 15.4981 14.5962 15.6767 14.485 15.786V15.746C13.8213 16.2481 13.0123 16.5208 12.18 16.523V16.524ZM14.307 14.08H14.291L14.299 14.041C13.8591 14.011 13.4994 13.6789 13.4343 13.2429C13.3691 12.8068 13.6162 12.3842 14.028 12.2269C14.4399 12.0697 14.9058 12.2202 15.1478 12.5887C15.3899 12.9572 15.3429 13.4445 15.035 13.76C14.856 13.9554 14.6059 14.0707 14.341 14.08H14.306H14.307ZM9.67 14C9.11772 14 8.67 13.5523 8.67 13C8.67 12.4477 9.11772 12 9.67 12C10.2223 12 10.67 12.4477 10.67 13C10.67 13.5523 10.2223 14 9.67 14Z"></path>
                </svg>
            </a-->

            <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Facebook">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z"></path>
                </svg>
            </a>

            <!-- a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Github">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z"></path>
                </svg>
            </a -->
            </div>
        </div>

        <div class="flex flex-col items-center rounded-xl border p-4 dark:border-gray-700 sm:p-6">
            <img class="aspect-square w-full rounded-xl object-cover" src="../../image/carrusel/caida.jpg" alt="" />

            <h1 class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white">Jesus en su tercera Caida</h1>

            <p class="mt-2 capitalize text-gray-500 dark:text-gray-300">Full stack developer</p>

            <div class="-mx-2 mt-3 flex">
            <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Reddit">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM6.807 10.543C6.20862 10.5433 5.67102 10.9088 5.45054 11.465C5.23006 12.0213 5.37133 12.6558 5.807 13.066C5.92217 13.1751 6.05463 13.2643 6.199 13.33C6.18644 13.4761 6.18644 13.6229 6.199 13.769C6.199 16.009 8.814 17.831 12.028 17.831C15.242 17.831 17.858 16.009 17.858 13.769C17.8696 13.6229 17.8696 13.4761 17.858 13.33C18.4649 13.0351 18.786 12.3585 18.6305 11.7019C18.475 11.0453 17.8847 10.5844 17.21 10.593H17.157C16.7988 10.6062 16.458 10.7512 16.2 11C15.0625 10.2265 13.7252 9.79927 12.35 9.77L13 6.65L15.138 7.1C15.1931 7.60706 15.621 7.99141 16.131 7.992C16.1674 7.99196 16.2038 7.98995 16.24 7.986C16.7702 7.93278 17.1655 7.47314 17.1389 6.94094C17.1122 6.40873 16.6729 5.991 16.14 5.991C16.1022 5.99191 16.0645 5.99491 16.027 6C15.71 6.03367 15.4281 6.21641 15.268 6.492L12.82 6C12.7983 5.99535 12.7762 5.993 12.754 5.993C12.6094 5.99472 12.4851 6.09583 12.454 6.237L11.706 9.71C10.3138 9.7297 8.95795 10.157 7.806 10.939C7.53601 10.6839 7.17843 10.5422 6.807 10.543ZM12.18 16.524C12.124 16.524 12.067 16.524 12.011 16.524C11.955 16.524 11.898 16.524 11.842 16.524C11.0121 16.5208 10.2054 16.2497 9.542 15.751C9.49626 15.6958 9.47445 15.6246 9.4814 15.5533C9.48834 15.482 9.52348 15.4163 9.579 15.371C9.62737 15.3318 9.68771 15.3102 9.75 15.31C9.81233 15.31 9.87275 15.3315 9.921 15.371C10.4816 15.7818 11.159 16.0022 11.854 16C11.9027 16 11.9513 16 12 16C12.059 16 12.119 16 12.178 16C12.864 16.0011 13.5329 15.7863 14.09 15.386C14.1427 15.3322 14.2147 15.302 14.29 15.302C14.3653 15.302 14.4373 15.3322 14.49 15.386C14.5985 15.4981 14.5962 15.6767 14.485 15.786V15.746C13.8213 16.2481 13.0123 16.5208 12.18 16.523V16.524ZM14.307 14.08H14.291L14.299 14.041C13.8591 14.011 13.4994 13.6789 13.4343 13.2429C13.3691 12.8068 13.6162 12.3842 14.028 12.2269C14.4399 12.0697 14.9058 12.2202 15.1478 12.5887C15.3899 12.9572 15.3429 13.4445 15.035 13.76C14.856 13.9554 14.6059 14.0707 14.341 14.08H14.306H14.307ZM9.67 14C9.11772 14 8.67 13.5523 8.67 13C8.67 12.4477 9.11772 12 9.67 12C10.2223 12 10.67 12.4477 10.67 13C10.67 13.5523 10.2223 14 9.67 14Z"></path>
                </svg>
            </a>

            <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Facebook">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z"></path>
                </svg>
            </a>

            <a href="#" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Github">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z"></path>
                </svg>
            </a>
            </div>
        </div>
        <div class="flex flex-col items-center rounded-xl border p-4 dark:border-gray-700 sm:p-6">
            <img class="aspect-square w-full rounded-xl object-cover" src="../../image/carrusel/cautivo.jpg" alt="" />

            <h1 class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white">Cautivo</h1>

            <p class="mt-2 capitalize text-gray-500 dark:text-gray-300">Obra del escultor Sevillano José Antonio Navarro Arteaga</p>

            <a href="#" class="mt-2 capitalize inline-block text-blue-500 underline hover:text-blue-400">Blog Cautivo</a>

            <div class="-mx-2 mt-3 flex">

            <a href="https://www.facebook.com/profile.php?id=100079486881528" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Facebook">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm4 7.278V4.5h-2.286c-2.1 0-3.428 1.6-3.428 3.889v1.667H8v2.777h2.286V19.5h2.857v-6.667h2.286L16 10.056h-2.857V8.944c0-1.11.572-1.666 1.714-1.666H16z"/>
                </svg>
            </a>
            <a href="https://www.instagram.com/pasoblanco_huercal_overa/" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Github">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 0c6.6274 0 12 5.3726 12 12s-5.3726 12-12 12S0 18.6274 0 12 5.3726 0 12 0zm3.115 4.5h-6.23c-2.5536 0-4.281 1.6524-4.3805 4.1552L4.5 8.8851v6.1996c0 1.3004.4234 2.4193 1.2702 3.2359.7582.73 1.751 1.1212 2.8818 1.1734l.2633.006h6.1694c1.3004 0 2.389-.4234 3.1754-1.1794.762-.734 1.1817-1.7576 1.2343-2.948l.0056-.2577V8.8851c0-1.2702-.4234-2.3589-1.2097-3.1452-.7338-.762-1.7575-1.1817-2.9234-1.2343l-.252-.0056zM8.9152 5.8911h6.2299c.9072 0 1.6633.2722 2.2076.8166.4713.499.7647 1.1758.8103 1.9607l.0063.2167v6.2298c0 .9375-.3327 1.6936-.877 2.2077-.499.4713-1.176.7392-1.984.7806l-.2237.0057H8.9153c-.9072 0-1.6633-.2722-2.2076-.7863-.499-.499-.7693-1.1759-.8109-2.0073l-.0057-.2306V8.885c0-.9073.2722-1.6633.8166-2.2077.4712-.4713 1.1712-.7392 1.9834-.7806l.2242-.0057h6.2299-6.2299zM12 8.0988c-2.117 0-3.871 1.7238-3.871 3.871A3.8591 3.8591 0 0 0 12 15.8408c2.1472 0 3.871-1.7541 3.871-3.871 0-2.117-1.754-3.871-3.871-3.871zm0 1.3911c1.3609 0 2.4798 1.119 2.4798 2.4799 0 1.3608-1.119 2.4798-2.4798 2.4798-1.3609 0-2.4798-1.119-2.4798-2.4798 0-1.361 1.119-2.4799 2.4798-2.4799zm4.0222-2.3589a.877.877 0 1 0 0 1.754.877.877 0 0 0 0-1.754z"/>
                </svg>
            </a>
            <a href="https://www.youtube.com/channel/UC9-vTwR6HDH5Fpd-r6YEaFg?app=desktop" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Facebook">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.294 7h-.589l-1.101.013c-1.48.024-3.709.092-4.465.285a1.836 1.836 0 0 0-1.326 1.263c-.181.644-.258 1.69-.29 2.46l-.022.815v.328l.008.426c.022.764.09 2.088.304 2.849.172.614.68 1.098 1.326 1.263.736.188 2.867.257 4.346.283L11.89 17l1.159-.008c1.453-.019 3.993-.082 4.811-.29a1.836 1.836 0 0 0 1.327-1.263c.21-.75.28-2.048.302-2.817l.01-.528-.003-.403c-.012-.67-.066-2.265-.31-3.13a1.836 1.836 0 0 0-1.326-1.263c-.661-.169-2.45-.242-3.878-.274L12.294 7zm-1.828 2.89l3.92 2.11-3.92 2.11V9.89z"/>
                </svg>
            </a>
            <a href="https://twitter.com/pasoblancoho" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Facebook">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.624 5h-2.038c-.092.722-.259 1.317-.503 1.784a3.846 3.846 0 0 1-.967 1.202c-.4.334-1.053.59-1.616.768v1.983h1.947v4.91c0 .64.069 1.128.206 1.466.138.336.383.654.74.954.355.297.785.529 1.288.691.503.16.89.242 1.545.242.577 0 1.114-.058 1.61-.17.497-.113 1.052-.312 1.664-.593v-2.208c-.718.46-1.44.69-2.165.69a2.11 2.11 0 0 1-1.088-.278c-.239-.137-.458-.375-.546-.604-.064-.167-.076-.46-.077-.92v-4.18h3.313v-2.5h-3.313V5z"/>
                </svg>
            </a>
            </div>
        </div>
        <div class="flex flex-col items-center rounded-xl border p-4 dark:border-gray-700 sm:p-6">
            <img class="aspect-square w-full rounded-xl object-cover" src="../../image/carrusel/cristoSangre.jpg" alt="" />

            <h1 class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white">Cristo de la Sangre</h1>

            <p class="mt-2 capitalize text-gray-500 dark:text-gray-300"> Obra de Juan Gonzalez Moreno</p>

            <a href="http://www.pasoblanco.es/wp/" class="mt-2 capitalize inline-block text-blue-500 underline hover:text-blue-400">Blog Cristo</a>

            <div class="-mx-2 mt-3 flex">

                <a href="https://m.facebook.com/people/Cristo-de-la-Sangre-Hu%C3%A9rcal-Overa/100064547028332/" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Facebook">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm4 7.278V4.5h-2.286c-2.1 0-3.428 1.6-3.428 3.889v1.667H8v2.777h2.286V19.5h2.857v-6.667h2.286L16 10.056h-2.857V8.944c0-1.11.572-1.666 1.714-1.666H16z"/>
                    </svg>
                </a>
                <a href="https://www.instagram.com/pasoblanco_huercal_overa/" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Github">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 0c6.6274 0 12 5.3726 12 12s-5.3726 12-12 12S0 18.6274 0 12 5.3726 0 12 0zm3.115 4.5h-6.23c-2.5536 0-4.281 1.6524-4.3805 4.1552L4.5 8.8851v6.1996c0 1.3004.4234 2.4193 1.2702 3.2359.7582.73 1.751 1.1212 2.8818 1.1734l.2633.006h6.1694c1.3004 0 2.389-.4234 3.1754-1.1794.762-.734 1.1817-1.7576 1.2343-2.948l.0056-.2577V8.8851c0-1.2702-.4234-2.3589-1.2097-3.1452-.7338-.762-1.7575-1.1817-2.9234-1.2343l-.252-.0056zM8.9152 5.8911h6.2299c.9072 0 1.6633.2722 2.2076.8166.4713.499.7647 1.1758.8103 1.9607l.0063.2167v6.2298c0 .9375-.3327 1.6936-.877 2.2077-.499.4713-1.176.7392-1.984.7806l-.2237.0057H8.9153c-.9072 0-1.6633-.2722-2.2076-.7863-.499-.499-.7693-1.1759-.8109-2.0073l-.0057-.2306V8.885c0-.9073.2722-1.6633.8166-2.2077.4712-.4713 1.1712-.7392 1.9834-.7806l.2242-.0057h6.2299-6.2299zM12 8.0988c-2.117 0-3.871 1.7238-3.871 3.871A3.8591 3.8591 0 0 0 12 15.8408c2.1472 0 3.871-1.7541 3.871-3.871 0-2.117-1.754-3.871-3.871-3.871zm0 1.3911c1.3609 0 2.4798 1.119 2.4798 2.4799 0 1.3608-1.119 2.4798-2.4798 2.4798-1.3609 0-2.4798-1.119-2.4798-2.4798 0-1.361 1.119-2.4799 2.4798-2.4799zm4.0222-2.3589a.877.877 0 1 0 0 1.754.877.877 0 0 0 0-1.754z"/>
                    </svg>
                </a>
                <a href="https://www.youtube.com/channel/UC9-vTwR6HDH5Fpd-r6YEaFg?app=desktop" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Facebook">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.294 7h-.589l-1.101.013c-1.48.024-3.709.092-4.465.285a1.836 1.836 0 0 0-1.326 1.263c-.181.644-.258 1.69-.29 2.46l-.022.815v.328l.008.426c.022.764.09 2.088.304 2.849.172.614.68 1.098 1.326 1.263.736.188 2.867.257 4.346.283L11.89 17l1.159-.008c1.453-.019 3.993-.082 4.811-.29a1.836 1.836 0 0 0 1.327-1.263c.21-.75.28-2.048.302-2.817l.01-.528-.003-.403c-.012-.67-.066-2.265-.31-3.13a1.836 1.836 0 0 0-1.326-1.263c-.661-.169-2.45-.242-3.878-.274L12.294 7zm-1.828 2.89l3.92 2.11-3.92 2.11V9.89z"/>
                    </svg>
                </a>
                <a href="https://twitter.com/pasoblancoho" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Facebook">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.624 5h-2.038c-.092.722-.259 1.317-.503 1.784a3.846 3.846 0 0 1-.967 1.202c-.4.334-1.053.59-1.616.768v1.983h1.947v4.91c0 .64.069 1.128.206 1.466.138.336.383.654.74.954.355.297.785.529 1.288.691.503.16.89.242 1.545.242.577 0 1.114-.058 1.61-.17.497-.113 1.052-.312 1.664-.593v-2.208c-.718.46-1.44.69-2.165.69a2.11 2.11 0 0 1-1.088-.278c-.239-.137-.458-.375-.546-.604-.064-.167-.076-.46-.077-.92v-4.18h3.313v-2.5h-3.313V5z"/>
                    </svg>
                </a>

            </div>
        </div>
        <div class="flex flex-col items-center rounded-xl border p-4 dark:border-gray-700 sm:p-6">
            <img class="aspect-square w-full rounded-xl object-cover" src="../../image/carrusel/cropped-logo2.jpg" alt="" />

            <h1 class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white">Paso Blanco</h1>

            <p class="mt-2 capitalize text-gray-500 dark:text-gray-300">Real Hermandad Paso Blanco de Huercal-Overa</p>

            <a href="http://www.pasoblanco.es/wp/" class="mt-2 capitalize inline-block text-blue-500 underline hover:text-blue-400">Web</a>

            <div class="-mx-2 mt-3 flex">

                <a href="https://www.facebook.com/pasoblancohuercalovera" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Facebook">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm4 7.278V4.5h-2.286c-2.1 0-3.428 1.6-3.428 3.889v1.667H8v2.777h2.286V19.5h2.857v-6.667h2.286L16 10.056h-2.857V8.944c0-1.11.572-1.666 1.714-1.666H16z"/>
                    </svg>
                </a>
                <a href="https://www.instagram.com/pasoblanco_huercal_overa/" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Github">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 0c6.6274 0 12 5.3726 12 12s-5.3726 12-12 12S0 18.6274 0 12 5.3726 0 12 0zm3.115 4.5h-6.23c-2.5536 0-4.281 1.6524-4.3805 4.1552L4.5 8.8851v6.1996c0 1.3004.4234 2.4193 1.2702 3.2359.7582.73 1.751 1.1212 2.8818 1.1734l.2633.006h6.1694c1.3004 0 2.389-.4234 3.1754-1.1794.762-.734 1.1817-1.7576 1.2343-2.948l.0056-.2577V8.8851c0-1.2702-.4234-2.3589-1.2097-3.1452-.7338-.762-1.7575-1.1817-2.9234-1.2343l-.252-.0056zM8.9152 5.8911h6.2299c.9072 0 1.6633.2722 2.2076.8166.4713.499.7647 1.1758.8103 1.9607l.0063.2167v6.2298c0 .9375-.3327 1.6936-.877 2.2077-.499.4713-1.176.7392-1.984.7806l-.2237.0057H8.9153c-.9072 0-1.6633-.2722-2.2076-.7863-.499-.499-.7693-1.1759-.8109-2.0073l-.0057-.2306V8.885c0-.9073.2722-1.6633.8166-2.2077.4712-.4713 1.1712-.7392 1.9834-.7806l.2242-.0057h6.2299-6.2299zM12 8.0988c-2.117 0-3.871 1.7238-3.871 3.871A3.8591 3.8591 0 0 0 12 15.8408c2.1472 0 3.871-1.7541 3.871-3.871 0-2.117-1.754-3.871-3.871-3.871zm0 1.3911c1.3609 0 2.4798 1.119 2.4798 2.4799 0 1.3608-1.119 2.4798-2.4798 2.4798-1.3609 0-2.4798-1.119-2.4798-2.4798 0-1.361 1.119-2.4799 2.4798-2.4799zm4.0222-2.3589a.877.877 0 1 0 0 1.754.877.877 0 0 0 0-1.754z"/>
                    </svg>
                </a>
                <a href="https://www.youtube.com/channel/UC9-vTwR6HDH5Fpd-r6YEaFg?app=desktop" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Facebook">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.294 7h-.589l-1.101.013c-1.48.024-3.709.092-4.465.285a1.836 1.836 0 0 0-1.326 1.263c-.181.644-.258 1.69-.29 2.46l-.022.815v.328l.008.426c.022.764.09 2.088.304 2.849.172.614.68 1.098 1.326 1.263.736.188 2.867.257 4.346.283L11.89 17l1.159-.008c1.453-.019 3.993-.082 4.811-.29a1.836 1.836 0 0 0 1.327-1.263c.21-.75.28-2.048.302-2.817l.01-.528-.003-.403c-.012-.67-.066-2.265-.31-3.13a1.836 1.836 0 0 0-1.326-1.263c-.661-.169-2.45-.242-3.878-.274L12.294 7zm-1.828 2.89l3.92 2.11-3.92 2.11V9.89z"/>
                    </svg>
                </a>
                <a href="https://twitter.com/pasoblancoho" class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Facebook">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.624 5h-2.038c-.092.722-.259 1.317-.503 1.784a3.846 3.846 0 0 1-.967 1.202c-.4.334-1.053.59-1.616.768v1.983h1.947v4.91c0 .64.069 1.128.206 1.466.138.336.383.654.74.954.355.297.785.529 1.288.691.503.16.89.242 1.545.242.577 0 1.114-.058 1.61-.17.497-.113 1.052-.312 1.664-.593v-2.208c-.718.46-1.44.69-2.165.69a2.11 2.11 0 0 1-1.088-.278c-.239-.137-.458-.375-.546-.604-.064-.167-.076-.46-.077-.92v-4.18h3.313v-2.5h-3.313V5z"/>
                    </svg>
                </a>

            </div>
        </div>

        </div>
    </div>
    </section>
    <!-- Evangelio -->
    <section class="bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 py-10">
        <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">Evangelio y lecturas del día</h1>

        <div class="mx-auto mt-6 flex justify-center">
        <span class="inline-block h-1 w-40 rounded-full bg-blue-500"></span>
        <span class="mx-1 inline-block h-1 w-3 rounded-full bg-blue-500"></span>
        <span class="inline-block h-1 w-1 rounded-full bg-blue-500"></span>
        </div>

        <div class="mx-auto mt-16 flex max-w-6xl items-start">
        <button class="hidden rounded-full border p-2 text-gray-800 transition-colors duration-300 hover:bg-gray-100 rtl:-scale-x-100 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 lg:block">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <div>
            <p class="flex items-center text-center text-gray-500 lg:mx-8">
                45 Al ver lo que hizo Jesús, muchos de los judíos que habían ido a casa de María creyeron en él. 46 Pero otros fueron a ver a los fariseos y les contaron lo que Jesús había hecho. 47 Los sumos sacerdotes y los fariseos convocaron un Consejo y dijeron: "¿Qué hacemos? Porque este hombre realiza muchos signos. 48 Si lo dejamos seguir así, todos creerán en él, y los romanos vendrán y destruirán nuestro Lugar santo y nuestra nación". 49 Uno de ellos, llamado Caifás, que era Sumo Sacerdote ese año, les dijo: "Ustedes no comprenden nada. 50 ¿No les parece preferible que un solo hombre muera por el pueblo y no que perezca la nación entera?". 51 No dijo eso por sí mismo, sino que profetizó como Sumo Sacerdote que Jesús iba a morir por la nación, 52 y no solamente por la nación, sino también para congregar en la unidad a los hijos de Dios que estaban dispersos. 53 A partir de ese día, resolvieron que debían matar a Jesús. 54 Por eso él no se mostraba más en público entre los judíos, sino que fue a una región próxima al desierto, a una ciudad llamada Efraín, y allí permaneció con sus discípulos.
                <br>55 Como se acercaba la Pascua de los judíos, mucha gente de la región había subido a Jerusalén para purificarse. 56 Buscaban a Jesús y se decían unos a otros en el Templo: "¿Qué les parece, vendrá a la fiesta o no?". 57 Los sumos sacerdotes y los fariseos habían dado orden de que si alguno conocía el lugar donde él se encontraba, lo hiciera saber para detenerlo.
            </p>

            <div class="mt-8 flex flex-col items-center justify-center">
            <img class="h-14 w-14 rounded-full object-cover" src="../../image/emoji/SanJuan.jpg" alt="" />

            <div class="mt-4 text-center">
                <h1 class="font-semibold text-gray-800 dark:text-white">Evangelio según San Juan. La conspiración contra Jesús</h1>
                <span class="text-sm text-gray-500 dark:text-gray-400">Mt. 26. 1-5  Mc. 14. 1-2  Lc. 22. 1-2</span>
            </div>
            </div>
        </div>

        <button class="hidden rounded-full border p-2 text-gray-800 transition-colors duration-300 hover:bg-gray-100 rtl:-scale-x-100 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 lg:block">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </button>
        </div>
    </div>
    </section>

    <!-- Seccion Venta Productos-->
    <section class="bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 py-10">
        <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">Tienda Paso Blanco</h1>

        <p class="mt-4 text-center text-gray-500 dark:text-gray-300">Haz un Donativo a nuestros Pasos o compra en nuestra tienda online todo lo recaudado es destinado al patrimonio del Paso Blanco, Semana Santa o obras de caridad. Todos los donativos quedaran registrados y se realizara una factura con el importe donado</p>

        <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-12 xl:grid-cols-3 xl:gap-12">
            <div v-for="product in products" :key="product.id" class="flex justify-center">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <ProductVue :image="product.image" :name="product.name" :description="product.description">
                        {{ product.image }}
                        <div class="p-6">
                            <h1 class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white">{{ product.name }}</h1>
                            <p class="text-gray-700 text-base mb-4">
                                {{ product.description }}
                            </p>
                            <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Comprar</button>
                        </div>
                    </ProductVue>
                </div>
            </div>


            <!--div class="flex justify-center">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light">
                    <img class="rounded-t-lg" src="../../image/productos/medalla-paso.jpg" alt=""/>
                    </a>
                    <div class="p-6">
                        <h5 class="text-gray-900 text-xl font-medium mb-2">Medalla Paso</h5>
                        <p class="text-gray-700 text-base mb-4">
                            A traves de la web puedes adquirir tu medalla de la Hemandad.
                        </p>
                        <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Comprar</button>
                    </div>
                     </div>
                    </!--div -->
                </div>
            </div>
        </section>


    <!-- Seccion Noticias y titulares -->
    <section class="bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 py-10">
        <div class="text-center">
            <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">Blog Paso Blanco</h1>

            <div class="mx-auto mt-6 flex justify-center">
                <span class="inline-block h-1 w-40 rounded-full bg-blue-500"></span>
                <span class="mx-1 inline-block h-1 w-3 rounded-full bg-blue-500"></span>
                <span class="inline-block h-1 w-1 rounded-full bg-blue-500"></span>
            </div>

        <p class="mx-auto mt-4 max-w-lg text-gray-500">Ultimas noticias de nuestra parroquia de Huercal-Overa y Semana Santa. Accede a nuestro blog para ver todas las noticias.</p>
        </div>

        <div class="mt-8 grid grid-cols-1 gap-8 md:mt-16 md:grid-cols-2 xl:grid-cols-3">
        <div>
            <div class="relative">
                <div class="flex justify-center">
                    <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg">
                        <img class=" w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg" src="../../image/blog/cultoParoquia.jpg" alt="" />
                        <div class="p-6 flex flex-col justify-start">
                        <h5 class="text-gray-900 text-xl font-medium mb-2">Parroquia de Huercal-Overa</h5>
                        <p class="text-gray-700 text-base mb-4">
                            Primer día del Triduo a Nuestro Padre Jesús de Pasión Cautivo, preparatorio para la solemnidad de Cristo Rey del Universo que celebraremos el próximo domingo 20 de noviembre.
                        </p>
                        <p class="text-gray-600 text-xs">20 de noviembre. Solemnidad de Cristo Rey del Universo.</p>
                        </div>
                    </div>
                    </div>
            </div>

            <h1 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">Quieres saber más de este culto</h1>

            <hr class="my-6 w-32 text-blue-500" />

            <p class="text-sm text-gray-500 dark:text-gray-400">Mañana jueves, comienza el triduo  a Nuestro Padre Jesús de Pasión Cautivo. Será jueves,  viernes y sábado a las 19,30 en la iglesia parroquial, y el domingo a las 12, la misa del Rey de Reyes.</p>

            <a href="#" class="mt-4 inline-block text-blue-500 underline hover:text-blue-400">Read more</a>
        </div>

        <div>
            <div class="relative">
                <div class="flex justify-center">
                    <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg">
                        <img class=" w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg" src="../../image/blog/parroquia.png" alt="" />
                        <div class="p-6 flex flex-col justify-start">
                        <h5 class="text-gray-900 text-xl font-medium mb-2">Parroquía de Huercal-Overa</h5>
                        <p class="text-gray-700 text-base mb-4">
                           Las hermanitas de los Ancianos Desamparados de Huercal-Overa piden alimentos previas fiestas navideñas.
                        </p>
                        <p class="text-gray-600 text-xs">30 de noviembre</p>
                        </div>
                    </div>
                    </div>
            </div>

            <h1 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">Quieres saber más sobre este culto</h1>

            <hr class="my-6 w-32 text-blue-500" />

            <p class="text-sm text-gray-500 dark:text-gray-400">Aprovechamos para agredecer la gran labor que realizan en nuestra villa con tantos ancianos.</p>

            <a href="#" class="mt-4 inline-block text-blue-500 underline hover:text-blue-400">Read more</a>
        </div>

        <div>
            <div class="relative">
                <div class="flex justify-center">
                    <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg">
                        <img class=" w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg" src="../../image/blog/premio.jpg" alt="" />
                        <div class="p-6 flex flex-col justify-start">
                        <h5 class="text-gray-900 text-xl font-medium mb-2">Premio Semana Santa de Huercal-Overa</h5>
                        <p class="text-gray-700 text-base mb-4">
                            Ayer 21 de julio, la Semana Santa de Huércal-Overa fue distinguida con el Premio Sociedad
                        </p>
                        <p class="text-gray-600 text-xs">Last updated 3 mins ago</p>
                        </div>
                    </div>
                    </div>
            </div>

            <h1 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">Premio Sociedad en la XIII edición de los Premios Levante</h1>

            <hr class="my-6 w-32 text-blue-500" />

            <p class="text-sm text-gray-500 dark:text-gray-400">Ayer 21 de julio, la Semana Santa de Huércal-Overa fue distinguida con el Premio Sociedad en la XIII edición de los Premios Levante organizado por La Voz de Almería, Cadena Ser y los 40. Desde el Paso Blanco queremos agradecer este reconocimiento y hacerlo extensivo a todas las generaciones de huercalenses que desde hace siglos y gracias a su esfuerzo y entusiasmo consiguieron que la Semana Santa huercalense haya llegado hasta nuestros días tal y como la conocemos. Deseamos t...</p>

            <a href="#" class="mt-4 inline-block text-blue-500 underline hover:text-blue-400">Read more</a>
        </div>
        </div>
    </div>
    </section>

    <!-- Seccion paga tu cuota -->
    <div class="bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">Precios Cuotas</h1>

        <p class="mx-auto mt-4 max-w-2xl text-center text-gray-500 dark:text-gray-300 xl:mt-6">Paga tu cuota online si te resulta más comodo y se miembro de nuestra gran hermandad.
            Disfruta de los beneficios de la paltaforma online estando informado en todo momento y teniendo acceso a todos los recursos del paso desde
            fototgrafias  hasta las últimas novedades y eventos.
        </p>

        <div class="mt-6 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:mt-12 xl:gap-12">
        <div class="w-full space-y-8 rounded-lg border border-gray-100 p-8 text-center dark:border-gray-700">
            <p class="font-medium uppercase text-gray-500 dark:text-gray-300">Mensual</p>

            <h2 class="text-5xl font-bold uppercase text-gray-800 dark:text-gray-100">3€</h2>

            <p class="font-medium text-gray-500 dark:text-gray-300">Cuota Mensual</p>

            <button class="mt-10 w-full transform rounded-md bg-blue-600 px-4 py-2 capitalize tracking-wide text-white transition-colors duration-300 hover:bg-blue-500 focus:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">Abonar Cuota</button>
        </div>

        <div class="w-full space-y-8 rounded-lg bg-blue-600 p-8 text-center">
            <p class="font-medium uppercase text-gray-200">Anual</p>

            <h2 class="text-5xl font-bold uppercase text-white dark:text-gray-100">50€</h2>

            <p class="font-medium text-gray-200">Cuota Anual Paso Blanco</p>

            <button class="mt-10 w-full transform rounded-md bg-white px-4 py-2 capitalize tracking-wide text-blue-500 transition-colors duration-300 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-200 focus:ring-opacity-80">Abonar Cuota</button>
        </div>

        <div class="w-full space-y-8 rounded-lg border border-gray-100 p-8 text-center dark:border-gray-700">
            <p class="font-medium uppercase text-gray-500 dark:text-gray-300">Semestral</p>

            <h2 class="text-5xl font-bold uppercase text-gray-800 dark:text-gray-100">30€</h2>

            <p class="font-medium text-gray-500 dark:text-gray-300">Cuota Semestral</p>

            <button class="mt-10 w-full transform rounded-md bg-blue-600 px-4 py-2 capitalize tracking-wide text-white transition-colors duration-300 hover:bg-blue-500 focus:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">Abonar Cuota</button>
        </div>
        </div>
    </div>
    </div>

    <section class="bg-white dark:bg-gray-900">
    <div class="container mx-auto max-w-4xl px-6 py-10">
        <h1 class="text-center text-4xl font-semibold text-gray-800 dark:text-white">Titulares</h1>

        <div class="mt-12 space-y-8">
            <div class="rounded-lg border-2 border-gray-100 dark:border-gray-700">
                <button class="flex w-full items-center justify-between p-8">
                <h1 class="font-semibold text-gray-700 dark:text-white">Comida Hermandad 25 Marzo</h1>

                <span class="rounded-full bg-gray-200 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                    </svg>
                </span>
                </button>

                <hr class="border-gray-200 dark:border-gray-700" />

                <p class="p-8 text-sm text-gray-500 dark:text-gray-300">Nos complace comunicar que la comidad de Hermandad tendra lugar el 25 de Marzo en el Restaurante de Huercal-Overa despuesde la Santa Misa. </p>

            </div>


        <div class="rounded-lg border-2 border-gray-100 dark:border-gray-700">
            <button class="flex w-full items-center justify-between p-8">
            <h1 class="font-semibold text-gray-700 dark:text-white">Novena Virgen De La Angustias</h1>

            <span class="rounded-full bg-blue-500 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </span>
            </button>
        </div>

        <div class="rounded-lg border-2 border-gray-100 dark:border-gray-700">
            <button class="flex w-full items-center justify-between p-8">
            <h1 class="font-semibold text-gray-700 dark:text-white">Días recoger tunicas Semana Santa</h1>

            <span class="rounded-full bg-blue-500 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </span>
            </button>
        </div>
        </div>
    </div>
    </section>

    <!-- Contacta con el Paso-->
    <section class="min-h-screen bg-gradient-to-r from-blue-600 via-blue-800 to-blue-900 dark:from-gray-700 dark:via-gray-800 dark:to-gray-900">
    <div class="container mx-auto flex min-h-screen flex-col px-6 py-12">
        <div class="flex-1 lg:-mx-6 lg:flex lg:items-center">
        <div class="text-white lg:mx-6 lg:w-1/2">
            <h1 class="text-3xl font-semibold capitalize lg:text-5xl">Ermita de la Virgen de las Angustias y de San Juan</h1>

            <p class="mt-6 max-w-xl">(Paso Blanco de Huercal-Overa)</p>

            <div class="mt-6 space-y-8 md:mt-8">
            <p class="-mx-2 flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

                <span class="mx-2 w-72 truncate text-white"> C. Ancha, 38, 04600 Huércal-Overa, Almería </span>
            </p>

            <p class="-mx-2 flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>

                <span class="mx-2 w-72 truncate text-white">telf: +34 950 488 999 44</span>
            </p>

            <p class="-mx-2 flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>

                <span class="mx-2 w-72 truncate text-white">pasoblanco@huercal-overa.com</span>
            </p>
            </div>

            <div class="mt-6 md:mt-8">
            <h3 class="text-gray-300">Siguenos en las Redes Sociales</h3>

            <div class="-mx-1.5 mt-4 flex">
                <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500" href="#">
                <svg class="h-10 w-10 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.6668 6.67334C18.0002 7.00001 17.3468 7.13268 16.6668 7.33334C15.9195 6.49001 14.8115 6.44334 13.7468 6.84201C12.6822 7.24068 11.9848 8.21534 12.0002 9.33334V10C9.83683 10.0553 7.91016 9.07001 6.66683 7.33334C6.66683 7.33334 3.87883 12.2887 9.3335 14.6667C8.0855 15.498 6.84083 16.0587 5.3335 16C7.53883 17.202 9.94216 17.6153 12.0228 17.0113C14.4095 16.318 16.3708 14.5293 17.1235 11.85C17.348 11.0351 17.4595 10.1932 17.4548 9.34801C17.4535 9.18201 18.4615 7.50001 18.6668 6.67268V6.67334Z" />
                </svg>
                </a>

                <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500" href="#">
                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.2 8.80005C16.4731 8.80005 17.694 9.30576 18.5941 10.2059C19.4943 11.1061 20 12.327 20 13.6V19.2H16.8V13.6C16.8 13.1757 16.6315 12.7687 16.3314 12.4687C16.0313 12.1686 15.6244 12 15.2 12C14.7757 12 14.3687 12.1686 14.0687 12.4687C13.7686 12.7687 13.6 13.1757 13.6 13.6V19.2H10.4V13.6C10.4 12.327 10.9057 11.1061 11.8059 10.2059C12.7061 9.30576 13.927 8.80005 15.2 8.80005Z" fill="currentColor" />
                    <path d="M7.2 9.6001H4V19.2001H7.2V9.6001Z" fill="currentColor" />
                    <path d="M5.6 7.2C6.48366 7.2 7.2 6.48366 7.2 5.6C7.2 4.71634 6.48366 4 5.6 4C4.71634 4 4 4.71634 4 5.6C4 6.48366 4.71634 7.2 5.6 7.2Z" fill="currentColor" />
                </svg>
                </a>

                <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500" href="#">
                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 10.2222V13.7778H9.66667V20H13.2222V13.7778H15.8889L16.7778 10.2222H13.2222V8.44444C13.2222 8.2087 13.3159 7.9826 13.4826 7.81591C13.6493 7.64921 13.8754 7.55556 14.1111 7.55556H16.7778V4H14.1111C12.9324 4 11.8019 4.46825 10.9684 5.30175C10.1349 6.13524 9.66667 7.2657 9.66667 8.44444V10.2222H7Z" fill="currentColor" />
                </svg>
                </a>

                <a class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500" href="#">
                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9294 7.72275C9.65868 7.72275 7.82715 9.55428 7.82715 11.825C7.82715 14.0956 9.65868 15.9271 11.9294 15.9271C14.2 15.9271 16.0316 14.0956 16.0316 11.825C16.0316 9.55428 14.2 7.72275 11.9294 7.72275ZM11.9294 14.4919C10.462 14.4919 9.26239 13.2959 9.26239 11.825C9.26239 10.354 10.4584 9.15799 11.9294 9.15799C13.4003 9.15799 14.5963 10.354 14.5963 11.825C14.5963 13.2959 13.3967 14.4919 11.9294 14.4919ZM17.1562 7.55495C17.1562 8.08692 16.7277 8.51178 16.1994 8.51178C15.6674 8.51178 15.2425 8.08335 15.2425 7.55495C15.2425 7.02656 15.671 6.59813 16.1994 6.59813C16.7277 6.59813 17.1562 7.02656 17.1562 7.55495ZM19.8731 8.52606C19.8124 7.24434 19.5197 6.10901 18.5807 5.17361C17.6453 4.23821 16.51 3.94545 15.2282 3.88118C13.9073 3.80621 9.94787 3.80621 8.62689 3.88118C7.34874 3.94188 6.21341 4.23464 5.27444 5.17004C4.33547 6.10544 4.04628 7.24077 3.98201 8.52249C3.90704 9.84347 3.90704 13.8029 3.98201 15.1238C4.04271 16.4056 4.33547 17.5409 5.27444 18.4763C6.21341 19.4117 7.34517 19.7045 8.62689 19.7687C9.94787 19.8437 13.9073 19.8437 15.2282 19.7687C16.51 19.708 17.6453 19.4153 18.5807 18.4763C19.5161 17.5409 19.8089 16.4056 19.8731 15.1238C19.9481 13.8029 19.9481 9.84704 19.8731 8.52606ZM18.1665 16.5412C17.8881 17.241 17.349 17.7801 16.6456 18.0621C15.5924 18.4799 13.0932 18.3835 11.9294 18.3835C10.7655 18.3835 8.26272 18.4763 7.21307 18.0621C6.51331 17.7837 5.9742 17.2446 5.69215 16.5412C5.27444 15.488 5.37083 12.9888 5.37083 11.825C5.37083 10.6611 5.27801 8.15832 5.69215 7.10867C5.97063 6.40891 6.50974 5.8698 7.21307 5.58775C8.26629 5.17004 10.7655 5.26643 11.9294 5.26643C13.0932 5.26643 15.596 5.17361 16.6456 5.58775C17.3454 5.86623 17.8845 6.40534 18.1665 7.10867C18.5843 8.16189 18.4879 10.6611 18.4879 11.825C18.4879 12.9888 18.5843 15.4916 18.1665 16.5412Z" fill="currentColor" />
                </svg>
                </a>
            </div>
            </div>
        </div>

        <div class="mt-8 lg:mx-6 lg:w-1/2">
            <div class="mx-auto w-full overflow-hidden rounded-xl bg-white px-8 py-10 shadow-2xl dark:bg-gray-900 lg:max-w-xl">
            <h1 class="text-2xl font-medium text-gray-700 dark:text-gray-200">Contacta con Nosotros</h1>

            <form class="mt-6">
                <div class="flex-1">
                <label class="mb-2 block text-sm text-gray-600 dark:text-gray-200">Nombre Completo</label>
                <input type="text" placeholder="John Doe" class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
                </div>

                <div class="mt-6 flex-1">
                <label class="mb-2 block text-sm text-gray-600 dark:text-gray-200">Email</label>
                <input type="email" placeholder="johndoe@example.com" class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
                </div>

                <div class="mt-6 w-full">
                <label class="mb-2 block text-sm text-gray-600 dark:text-gray-200">Mensaje</label>
                <textarea class="mt-2 block h-32 w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 placeholder-gray-400 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300 md:h-48" placeholder="Mensaje"></textarea>
                </div>

                <button class="mt-6 w-full transform rounded-md bg-blue-600 px-6 py-3 text-sm font-medium capitalize tracking-wide text-white transition-colors duration-300 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-50">Enviar</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    </section>

   <footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
                <div class="flex flex-col items-center justify-between sm:flex-row">
                    <a href="#" class="text-2xl font-bold text-gray-800 transition-colors duration-300 hover:text-gray-700 dark:text-white dark:hover:text-gray-300">
                        <img src="../../image/logo/logo.jpg" alt="logo Paso Blanco" width="100" height="100">
                    </a>
                </div>

                <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                    <p class="mt-4 text-lg text-gray-500 dark:text-gray-300 sm:mt-0">© Copyright Paso Blanco de Huercal-Overa 2022. All Rights Reserved.</p>
                </div>


                    <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                        <a href="https://www.facebook.com/pasoblancohuercalovera" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            <span class="sr-only">Facebook page</span>
                        </a>
                        <a href="https://www.instagram.com/pasoblanco_huercal_overa/" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                            <span class="sr-only">Instagram page</span>
                        </a>
                        <a href="https://twitter.com/pasoblancoho" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                            <span class="sr-only">Twitter page</span>
                        </a>
                    </div>
                </footer>
<!--/AppLayout-->
</template>

<style>
    .left-full {
  left: -100%;
}

.carousel-item {
  float: left;
  position: relative;
  display: block;
  width: 100%;
  margin-right: -100%;
  backface-visibility: hidden;
}

.carousel-item.active {
  left: 0;
}
</style>
