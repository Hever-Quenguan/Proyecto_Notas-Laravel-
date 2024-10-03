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
                            <h3 class="text-lg text-gray-900">Listado de notas</h3>
                            <p class="text-sm text-gray-600">Toma el registro correcto y ejecuta cualquier función (ver, editar o eliminar)</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <div class="flex justify-between items-center mb-4">
                                <input
                                    type="text" class="form-input rounded-md shadow-sm"
                                    placeholder="Buscar..."
                                    v-model="q">
                                
                                <!-- Select for sorting -->
                                <select v-model="sortBy" class="ml-2 form-select rounded-md shadow-sm">
                                    <option value="title">Ordenar por Título</option>
                                    <option value="created_at">Ordenar por Fecha de Creación</option>
                                    <option value="due_date">Ordenar por Fecha de Vencimiento</option>
                                </select>

                                <Link :href="route('notes.create')" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md">
                                    Crear
                                </Link>
                            </div>
                            <hr class="my-6">
                            <table class="min-w-full table-auto">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">Título</th>
                                        <th class="px-4 py-2">Fecha de Creación</th>
                                        <th class="px-4 py-2">Fecha de Vencimiento</th>
                                        <th class="px-4 py-2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="note in sortedNotes" :key="note.id">
                                        <td class="border px-4 py-2">
                                            {{ note.excerpt }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            {{ note.fechcre }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            {{ note.fecha_vencimiento }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            <Link :href="route('notes.show', note.id)" class="bg-blue-500 text-white font-bold py-1 px-3 rounded-md">
                                                Mostrar
                                            </Link>
                                            <Link :href="route('notes.edit', note.id)" class="bg-green-500 text-white font-bold py-1 px-3 rounded-md ml-2">
                                                Editar
                                            </Link>
                                            <button @click="deleteNote(note.id)" class="bg-red-500 text-white font-bold py-1 px-3 rounded-md ml-2">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
    import { Inertia } from '@inertiajs/inertia'

    export default defineComponent({
        components: {
            AppLayout,
            Head,
            Link,
        },
        props: {
            notes: Array,
        },
        data() {
            return {
                q: '',
                sortBy: 'title' // Default sorting option
            }
        },
        computed: {
            sortedNotes() {
                // Sorting logic
                return this.notes.sort((a, b) => {
                    if (this.sortBy === 'title') {
                        return a.excerpt.localeCompare(b.excerpt);
                    } else if (this.sortBy === 'created_at') {
                        return new Date(a.fechcre) - new Date(b.fechcre);
                    } else if (this.sortBy === 'due_date') {
                        return new Date(a.fecha_vencimiento) - new Date(b.fecha_vencimiento);
                    }
                });
            }
        },
        watch: {
            q(value) {
                this.$inertia.replace(this.route('notes.index', { q: value, sortBy: this.sortBy }));
            },
            sortBy(value) {
                this.$inertia.replace(this.route('notes.index', { q: this.q, sortBy: value }));
            }
        },
        methods: {
            deleteNote(noteId) {
                if (confirm("¿Estás seguro de que deseas eliminar esta nota? Esta acción no se puede deshacer.")) {
                    Inertia.delete(this.route('notes.destroy', noteId), {
                        onSuccess: () => {
                            alert('Nota eliminada correctamente.');
                        },
                        onError: () => {
                            alert('Hubo un error al eliminar la nota.');
                        }
                    });
                }
            }
        }
    })
</script>
