<template>
    <form @submit.prevent="update">
        <div class="form-row mt-3">
            <div class="col-md-3 form-group">
                <label for="brand">Marca</label>
                <input
                    type="text"
                    name="brand"
                    id="brand"
                    class="form-control"
                    placeholder="Samsung"
                    v-model="form.brand"
                />
                <small
                    class="text-danger"
                    v-if="errors.hasOwnProperty('marca')"
                    v-text="errors.marca[0]"
                ></small>
            </div>
            <div class="col-md-3 form-group">
                <label for="model">Modelo</label>
                <input
                    type="text"
                    name="model"
                    id="model"
                    class="form-control"
                    placeholder="Galaxy S10+"
                    v-model="form.model"
                />
                <small
                    class="text-danger"
                    v-if="errors.hasOwnProperty('modelo')"
                    v-text="errors.modelo[0]"
                ></small>
            </div>
            <div class="col-md-3 form-group">
                <label for="serial_number">Número de Série</label>
                <input
                    type="text"
                    name="serial_number"
                    id="serial_number"
                    class="form-control"
                    v-model="form.serial_number"
                />
                <small
                    class="text-danger"
                    v-if="errors.hasOwnProperty('numero_serie')"
                    v-text="errors.numero_serie[0]"
                ></small>
            </div>
            <div class="col-md-3 form-group">
                <label for="phone_number_1">Número de Telefone 1</label>
                <the-mask
                    name="phone_number_1"
                    id="phone_number_1"
                    class="form-control"
                    placeholder="(11) 99999-9999"
                    v-model="form.phone_number_1"
                    :mask="['(##) #####-####', '(##) ####-####']"
                ></the-mask>
                <small
                    class="text-danger"
                    v-if="errors.hasOwnProperty('telefone_1')"
                    v-text="errors.telefone_1[0]"
                ></small>
            </div>
            <!-- <div class="col-md-3 form-group">
                <label for="phone_number_2">Número de Telefone 2</label>
                <the-mask
                    name="phone_number_2"
                    id="phone_number_2"
                    class="form-control"
                    placeholder="(11) 99999-9999"
                    v-model="form.phone_number_2"
                    :mask="['(##) #####-####', '(##) ####-####']"
                ></the-mask>
                <small
                    class="text-danger"
                    v-if="errors.hasOwnProperty('telefone_2')"
                    v-text="errors.telefone_2[0]"
                ></small>
            </div> -->
            <div class="col-md-3 form-group">
                <label for="quick_dial">Discagem Rápida</label>
                <the-mask
                    name="quick_dial"
                    id="quick_dial"
                    class="form-control"
                    placeholder="9999"
                    v-model="form.quick_dial"
                    :mask="['####']"
                ></the-mask>
                <small
                    class="text-danger"
                    v-if="errors.hasOwnProperty('discagem_rapida')"
                    v-text="errors.discagem_rapida[0]"
                ></small>
            </div>
            <div class="col-md-3 form-group">
                <label for="imei_1">IMEI 1*</label>
                <the-mask
                    :mask="['######/##/######/#']"
                    placeholder="999999/99/999999/9"
                    name="imei_1"
                    id="imei_1"
                    class="form-control"
                    v-model="form.imei_1"
                ></the-mask>
                <small
                    class="text-danger"
                    v-if="errors.hasOwnProperty('imei_1')"
                    v-text="errors.imei_1[0]"
                ></small>
                <small class="text-muted"
                    >*Deixe este campo em branco no caso de telefone
                    fixo.</small
                >
            </div>
            <div class="col-md-3 form-group">
                <label for="imei_2">IMEI 2</label>
                <the-mask
                    :mask="['######/##/######/#']"
                    placeholder="999999/99/999999/9"
                    name="imei_2"
                    id="imei_2"
                    class="form-control"
                    v-model="form.imei_2"
                ></the-mask>
                <small
                    class="text-danger"
                    v-if="errors.hasOwnProperty('imei_2')"
                    v-text="errors.imei_2[0]"
                ></small>
            </div>
            <div class="col-md-3 form-group">
                <label for="user">Usuário(s)</label>
                <multiselect
                    v-model="form.users"
                    :options="users"
                    :multiple="true"
                    :close-on-select="false"
                    :clear-on-select="false"
                    track-by="nome"
                    :custom-label="customLabel"
                    placeholder="Selecione usuário(s)"
                ></multiselect>
                <small
                    class="text-danger"
                    v-if="errors.hasOwnProperty('usuario')"
                    v-text="errors.usuario[0]"
                ></small>
            </div>
            <div class="col-md-12 d-flex justify-content-end">
                <button
                    class="btn btn-primary d-flex align-items-center justify-content-between"
                    type="submit"
                >
                    <Loading v-if="loading"></Loading>
                    <span>Atualizar</span>
                </button>
            </div>
        </div>
    </form>
</template>
<script>
import Loading from "../Utilities/Loading";
import { TheMask } from "vue-the-mask";
import Multiselect from "vue-multiselect";
export default {
    props: ["users", "phone"],
    components: { Loading, TheMask, Multiselect },
    data() {
        return {
            form: {
                brand: "",
                model: "",
                phone_number_1: "",
                phone_number_2: "",
                imei_1: "",
                imei_2: "",
                serial_number: "",
                quick_dial: "",
                users: null
            },
            user: 0,
            errors: {},
            loading: false
        };
    },
    methods: {
        update: _.throttle(
            function() {
                this.loading = !this.loading;
                axios
                    .post(`/phones/${this.phone.id}`, this.formatData())
                    .then(result => {
                        this.loading = !this.loading;
                        window.location = "/phones";
                    })
                    .catch(errors => {
                        this.loading = !this.loading;
                        this.errors = errors.response.data.errors;
                    });
            },
            2000,
            { trailing: false }
        ),
        formatData() {
            let formData = new FormData();
            formData.append("_method", "PATCH");
            formData.append("marca", this.form.brand);
            formData.append("modelo", this.form.model);
            formData.append("telefone_1", this.form.phone_number_1);
            formData.append("telefone_2", this.form.phone_number_2 == null ? '' : this.form.phone_number_2);
            formData.append("imei_1", this.form.imei_1);
            formData.append("imei_2", this.form.imei_2);
            formData.append("numero_serie", this.form.serial_number);
            formData.append("discagem_rapida", this.form.quick_dial);
            formData.append(
                "usuarios",
                this.form.users == null ? "" : JSON.stringify(this.form.users)
            );

            return formData;
        },
        customLabel(user) {
            return `${user.nome}`;
        }
    },
    created() {
        this.form = this.phone;
    }
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
