<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo de Notas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <!-- Información lateral sobre la nota -->
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">Detalle de una nota</h3>
                            <p class="mt-1 text-sm text-gray-600">{{ note.excerpt }}</p>
                        </div>
                    </div>

                    <!-- Contenido principal de la nota -->
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-6">
                            <!-- Estilo hoja de Word -->
                            <div class="bg-white shadow-lg rounded-lg p-8">
                                <!-- Título centrado -->
                                <h1 class="text-3xl font-bold text-center mb-4">{{ note.excerpt }}</h1>

                                <!-- Imagen si existe -->
                                <div v-if="note.imagen" class="flex justify-center mb-6">
                                    <img :src="note.imagen" alt="Imagen de la nota" class="rounded-lg shadow-md max-h-96">
                                </div>

                                <!-- Contenido de la nota -->
                                <div class="text-lg text-justify leading-relaxed mb-6">
                                    {{ note.content }}
                                </div>

                                <!-- Detalles adicionales -->
                                <div class="text-sm text-gray-600 mt-10">
                                    <p><strong>Fecha de Creación:</strong> {{ note.fechcre }}</p>
                                    <p><strong>Fecha de Vencimiento:</strong> {{ note.fecha_vencimiento }}</p>
                                    <p><strong>Categoría:</strong> {{ note.categoria }}</p>
                                    <p><strong>Creado por Usuario ID:</strong> {{ note.usu_id }}</p>
                                    <p><strong>Nombre de Usuario:</strong> {{ note.name }}</p>
                                </div>

                                <!-- Línea divisoria -->
                                <hr class="my-6">

                                <!-- Botón de volver -->
                                <div class="text-right">
                                    <Link :href="route('notes.index')" class="text-blue-500 hover:underline">
                                        Volver a la lista de notas
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Link } from '@inertiajs/inertia-vue3'

    export default defineComponent({
        components: {
            AppLayout,
            Link,
        },
        props: {
            note: Object, // Recibe la nota desde el controlador
        }
    })
</script>

<style scoped>
/* Estilos para la presentación de la nota tipo hoja de Word */
.text-center {
    text-align: center;
}

.text-justify {
    text-align: justify;
}

.shadow-lg {
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.max-h-96 {
    max-height: 24rem;
}

.leading-relaxed {
    line-height: 1.75;
}

.bg-white {
    background-color: white;
}

.p-8 {
    padding: 2rem;
}

.rounded-lg {
    border-radius: 0.5rem;
}
</style>
