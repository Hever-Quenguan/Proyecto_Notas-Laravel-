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
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Crear una nota</h3>
                            <p class="text-sm text-gray-600">Luego de crearla, la podrás ver en la lista de notas.</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <form @submit.prevent="submit">
                                <!-- Campo Titulo -->
                                <label class="block font-medium text-sm text-gray-700">Titulo</label>
                                <textarea
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.excerpt"
                                    required
                                ></textarea>

                                <!-- Campo Contenido -->
                                <label class="block font-medium text-sm text-gray-700">Contenido</label>
                                <textarea
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.content"
                                    rows="8"
                                    required
                                ></textarea>

                                <!-- Campo Fecha de Creación -->
                                <label class="block font-medium text-sm text-gray-700">Fecha de Creación</label>
                                <input
                                    type="date"
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.fechcre"
                                    required
                                />

                                <!-- Campo Categoría -->
                                <label class="block font-medium text-sm text-gray-700">Categoría</label>
                                <select
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.categoria"
                                    required
                                >
                                    <option disabled value="">Selecciona una categoría</option>
                                    <option value="Categoria 1">Categoría 1</option>
                                    <option value="Categoria 2">Categoría 2</option>
                                    <option value="Categoria 3">Categoría 3</option>
                                    <option value="Categoria 4">Categoría 4</option>
                                    <option value="Categoria 5">Categoría 5</option>
                                </select>

                                <!-- Campo Fecha de Vencimiento -->
                                <label class="block font-medium text-sm text-gray-700">Fecha de Vencimiento</label>
                                <input
                                    type="date"
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.fecha_vencimiento"
                                />

                                <!-- Campo Imagen -->
                                <label class="block font-medium text-sm text-gray-700">Imagen (URL)</label>
                                <input
                                    type="text"
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.imagen"
                                    placeholder="URL de la imagen"
                                />

                                <!-- Botón Crear -->
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md mt-4"
                                >
                                    Crear
                                </button>
                            </form>

                            <hr class="my-6">
                            <!-- Enlace para volver -->
                            <Link :href="route('notes.index')" class="text-blue-600 hover:underline">Volver</Link>
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
import { Head, Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
    components: {
        AppLayout,
        Head,
        Link,
    },
    data () {
        return {
            form: {
                excerpt: '',
                content: '',
                fechcre: '',        // Campo para la fecha de creación
                categoria: '',      // Campo para la categoría
                fecha_vencimiento: '', // Campo para la fecha de vencimiento
                imagen: ''          // Campo para la imagen
            }
        }
    },
    methods: {
    submit() {
        this.$inertia.post(this.route('notes.store'), this.form)
            .then(() => {
                // Redirigir a la lista de notas
                this.$inertia.visit(this.route('notes.index')); // Asegúrate de que esta línea dirija a 'notes.index'
            })
            .catch(error => {
                console.error("Error al crear la nota:", error);
            });
    }
}
})
</script>
