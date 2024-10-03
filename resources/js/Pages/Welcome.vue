<template>
    <Head title="Welcome" />

     <!-- Navigation-->
     <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item">
                            <Link :href="route('login')" class="nav-link">
                                 Login
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link :href="route('register')" class="nav-link">
                                 Registrate 
                            </Link>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Bienvenido a tu aplicación de notas</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">"Organiza tu vida, gestiona tus tareas y nunca olvides lo importante. Con nuestra aplicación de notas, tendrás todo lo que necesitas para mantener tus pensamientos y actividades en orden!</p>
                        <a class="btn btn-primary btn-xl" href="#about">Sección de Características</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">¿Por qué elegir nuestra aplicación?</h2>
                        <hr class="divider divider-light" />

                        <p class="text-white-75 mb-4">Crea, edita y elimina notas fácilmente desde una interfaz intuitiva.</p>
                        <p class="text-white-75 mb-4">Organiza tus notas con etiquetas para acceder rápidamente a la información que necesitas.</p>
                        <p class="text-white-75 mb-4">Establece fechas de vencimiento para tus notas y nunca pierdas un plazo importante.</p>
                        <p class="text-white-75 mb-4">Disfruta de una experiencia de usuario segura con autenticación de usuario y protección de datos.</p>
                        
                        <h4 class="text-white-75 mb-4">¿No te has registrado?</h4>
                        <Link :href="route('register')" class="btn btn-light btn-xl">
                                Registrate!
                        </Link>
                        <h4 class="text-white-75 mb-4">ó</h4>
                        <Link :href="route('login')" class="btn btn-light btn-xl">
                                Inicia sesión
                        </Link>
                     
                    
                    
                    </div>
                </div>
            </div>
        </section>
       
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2023 - Company Name</div></div>
        </footer>

</template>


<style scoped>

    .bg-gray-100 {
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }

    .border-gray-200 {
        border-color: #edf2f7;
        border-color: rgba(237, 242, 247, var(--tw-border-opacity));
    }

    .text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }

    .text-gray-500 {
        color: #a0aec0;
        color: rgba(160, 174, 192, var(--tw-text-opacity));
    }

    .text-gray-600 {
        color: #718096;
        color: rgba(113, 128, 150, var(--tw-text-opacity));
    }

    .text-gray-700 {
        color: #4a5568;
        color: rgba(74, 85, 104, var(--tw-text-opacity));
    }

    .text-gray-900 {
        color: #1a202c;
        color: rgba(26, 32, 44, var(--tw-text-opacity));
    }

    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #2d3748;
            background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900 {
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
        }

        .dark\:border-gray-700 {
            border-color: #4a5568;
            border-color: rgba(74, 85, 104, var(--tw-border-opacity));
        }

        .dark\:text-white {
            color: #fff;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }

        .dark\:text-gray-400 {
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--tw-text-opacity));
        }
    }
</style>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import '../../../public/plantilla/css/styles.css'; // Ajusta la ruta según la estructura de tu proyecto
    export default defineComponent({
        components: {
            Head,
            Link,
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    })

    
</script>




