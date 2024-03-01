<template>
    <div class="modal fade" id="category_modal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ is_create ? 'Crear' : 'Editar' }} Categoria</h5>
                    <button type="button" class="btn-close" @click="closeModal"
                        aria-label="Close"></button>
                </div>

                <backend-error :errors="back_errors" />

                <!-- Formulario -->
                <Form @submit="saveCategory">
                    <div class="modal-body row">
                        <!-- Title -->
                        <div class="col-12">
                            <label for="title">Nombre</label>
                            <Field name="name"  v-model="category.name" v-slot="{ errorMessage, field }" :rules="name_rules">
                                <input id="name" :class="`form-control ${errorMessage || back_errors['title'] ? 'is-invalid': '' }`"
                                    v-bind="field">
                                <span class="invalid-feedback">{{ errorMessage }}</span>
                                <span class="invalid-feedback">
                                    {{ back_errors['name'] }}
                                </span>
                            </Field>
                        </div>
                    </div>
                        <!-- Buttons -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="closeModal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Almacenar</button>
                        </div>
                </Form>
            </div>
        </div>
    </div>
</template>

<script>
import {Field, Form} from 'vee-validate'
import * as yup from 'yup';
import { successMessage, handlerErrors } from '@/helpers/Alerts.js'
import { ref, getCurrentInstance } from 'vue'
import BackendError from '../Components/BackendError.vue';

export default {
    props:['category_data'],
    components: {Field, Form, BackendError},
    setup({ category_data}) {
        const instance = getCurrentInstance();
        const is_create = category_data ? ref(false) : ref(true)
        const category = !is_create.value ? ref(category_data) : ref({})
        const back_errors = ref({})
        const closeModal = () => instance.parent.ctx.closeModal()

        const saveCategory =  async() => {
            try{
                if (is_create.value){
                    await axios.post('/categories', category.value)
                } else {
                    await axios.put(`/categories/${category.value.id}`, category.value)
                }
                successMessage({ is_delete: false, reload: false}).then(()=> succesResponse())
            } catch (error){
                back_errors.value = await handlerErrors(error)
            }
        }

        const succesResponse = () => {
            instance.parent.ctx.reloadState()
            closeModal()
        }

        const name_rules = yup.string().required('El nommbre es requerido')

        return{
            category,
            is_create,
            name_rules,
            back_errors,
            closeModal,
            saveCategory,
        }
    }
}
</script>
