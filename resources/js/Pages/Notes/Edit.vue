<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Nota
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Editar una nota</h3>
                            <p class="text-sm text-gray-600">Modifica los detalles de la nota y guarda los cambios.</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <form @submit.prevent="submit">
                                <!-- Campo Titulo -->
                                <label class="block font-medium text-sm text-gray-700">Titulo</label>
                                <textarea
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.excerpt">
                                </textarea>

                                <!-- Campo Contenido -->
                                <label class="block font-medium text-sm text-gray-700">Contenido</label>
                                <textarea
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.content"
                                    rows="8">
                                </textarea>

                                <!-- Campo Fecha de Creación -->
                                <label class="block font-medium text-sm text-gray-700">Fecha de Creación</label>
                                <input
                                    type="date"
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.fechcre"
                                />

                                <!-- Campo Categoría -->
                                <label class="block font-medium text-sm text-gray-700">Categoría</label>
                                <select
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.categoria"
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

                                <input
                                    type="hidden"
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.id"
                                />

                                <!-- Botones Editar y Eliminar -->
                                <div class="flex space-x-4 mt-4">
                                    <button
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md"
                                    >
                                        Editar
                                    </button>

                                    
                                </div>
                            </form>

                            <hr class="my-6">

                            <Link :href="route('notes.index')" class="mt-4 inline-block">Volver</Link>
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
    props: {
        note: Object,
    },
    data () {
        return {
            form: {
                excerpt: this.note.excerpt,
                content: this.note.content,
                fechcre: this.note.fechcre,
                categoria: this.note.categoria,
                fecha_vencimiento: this.note.fecha_vencimiento,
                imagen: this.note.imagen,
                id: this.note.id,
            }
        }
    },
    methods: {
        submit() {
            this.$inertia.put(this.route('notes.update', this.note.id), this.form)
        },
       

            destroy() {
                if(confirm('¿Desea Eliminar?')){
                    this.$inertia.delete(this.route('notes.destroy', this.note.id))
                }



        }
    }
})
</script>
