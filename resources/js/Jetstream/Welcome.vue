<template>
    <div class="bg-orange-50 min-h-screen flex flex-col justify-center items-center">
        <div class="p-6 sm:px-20 bg-white shadow-md rounded-lg border border-gray-200">
            <div class="flex justify-center">
                <jet-application-logo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-2xl text-center text-brown-600">
                <h5 class="font-bold">¡Bienvenido a tu Aplicación de Notas!</h5>
                <h3 class="font-bold">Nos alegra verte aquí.</h3>
            </div>

            <div class="mt-6 text-gray-600">
                <p>Ahora que has iniciado sesión, tienes acceso completo a todas las herramientas que necesitas para organizar tus pensamientos, ideas y tareas.</p>

                <h2 class="font-bold mt-4 text-brown-600">Comienza a Explorar:</h2>
                
                <h4 class="font-bold mt-2 text-brown-500">Crea Notas:</h4>
                <p>Haz clic en el botón “Crear Nueva Nota” para empezar a escribir y guardar tus pensamientos.</p>

                <h4 class="font-bold mt-2 text-brown-500">Edita y Organiza:</h4>
                <p>Revisa tus notas, edítalas cuando lo necesites y mantén todo en orden utilizando etiquetas y categorías.</p>

                <h4 class="font-bold mt-2 text-brown-500">Visualiza tus Ideas:</h4>
                <p>Explora tus notas en la lista, donde podrás ver un resumen de cada una, su fecha de creación y etiquetas.</p>

                <!-- Contenedor para los botones dentro de la tabla -->
                <div class="flex justify-around mt-6">
                    <Link 
                        :href="route('notes.index')" 
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md"
                    >
                        Ver Notas
                    </Link>
                    <Link 
                        :href="route('notes.create')" 
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md"
                    >
                        Crear Notas
                    </Link>
                </div>
            </div>
        </div>

        <div class="bg-orange-200 bg-opacity-50 grid grid-cols-1 md:grid-cols-2 mt-6 w-full">
            <!-- Se puede añadir contenido adicional aquí si es necesario -->
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    name: 'Welcome',
    components: {
        Link,
    },
}
</script>

<style scoped>
.bg-orange-50 {
    background-color: #69645c; /* Light orange */
}

.bg-orange-200 {
    background-color: #FCD34D; /* Lighter orange */
}

.text-brown-600 {
    color: #7A5B40; /* Brown color */
}

.text-brown-500 {
    color: #8B634A; /* Lighter brown */
}
</style>
