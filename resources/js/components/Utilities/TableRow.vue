<template>
    <tr>
        <th scope="row" v-text="phone.id">1</th>
        <td v-text="phone.brand"></td>
        <td v-text="phone.model"></td>
        <td>
            <a
                class="text-info"
                :href="`tel:${phoneNumber}`"
                v-text="phoneNumber"
            ></a>
        </td>
        <td v-if="phone.users.length">
            <span
                v-for="user in phone.users"
                :key="user.cod_usuario"
                v-text="`${user.nome}` + `${phone.users.length > 1 ? '; ' : ''}`"
            ></span>
        </td>
        <td v-else v-text="`Não vinculado a usuário`"></td>
        <td>
            <a :href="`/phones/${phone.id}/edit`" class="btn btn-primary">
                <i class="far fa-edit"></i>
            </a>
            <a
                :href="`/terms/${phone.id}/delivery`"
                class="btn btn-success"
                v-if="phone.users.length"
                target="_blank"
            >
                <i class="fas fa-file-alt"></i>
            </a>
            <button class="btn btn-danger" @click="destroy()">
                <loading v-if="loading"></loading>
                <i class="far fa-trash-alt" v-else></i>
            </button>
        </td>
    </tr>
</template>
<script>
import { eventBus } from "../../agenda_dash";
import Loading from "../Utilities/Loading";
export default {
    props: ["phone", "index"],
    components: {
        Loading
    },
    computed: {
        phoneNumber() {
            return (
                "015 " +
                this.phone.phone_number_1.substring(0, 2) +
                " " +
                this.phone.phone_number_1.substring(2, 7) +
                "-" +
                this.phone.phone_number_1.substring(7, 11)
            );
        }
    },
    data() {
        return {
            loading: false
        };
    },
    methods: {
        destroy: _.throttle(
            function() {
                this.loading = true;
                swal.fire({
                    title: "Você tem certeza?",
                    text: `O telefone ${this.phoneNumber} será apagado.`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Confirmar",
                    cancelButtonText: "Cancelar"
                }).then(result => {
                    if (result.value) {
                        axios
                            .delete(`/phones/${this.phone.id}`)
                            .then(result => {
                                eventBus.$emit("destroy", this.index);
                                this.loading = false;
                            })
                            .catch(errors => console.log(errors));
                    } else {
                        this.loading = false;
                    }
                });
            },
            1000,
            { trailing: false }
        )
    }
};
</script>
