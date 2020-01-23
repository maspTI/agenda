<template>
    <div class="row">
        <filters></filters>
        <div class="col-md-12 mt-3">
            <div v-if="!loading">
                <table class="table table-hover table-responsive-xl">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Número Telefone</th>
                            <th scope="col">Usuários</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <table-row
                            v-for="(phone, index) in phones"
                            :phone="phone"
                            :index="index"
                            :key="phone.id"
                        ></table-row>
                    </tbody>
                </table>
                <paginator
                    :paginate="paginate"
                    @page="fetch($event)"
                    v-show="paginate.last_page > 1"
                ></paginator>
            </div>
            <Loading spinner="text-dark" v-else></Loading>
        </div>
        <div
            class="col-md-12 d-flex justify-content-center mt-3"
            v-if="!phones.length && !loading"
        >
            <span>Nenhum telefone encontrado.</span>
        </div>
    </div>
</template>
<script>
import TableRow from "../Utilities/TableRow";
import Filters from "../Utilities/Filters";
import Paginator from "../Utilities/Paginator";
import Loading from "../Utilities/Loading";
import { eventBus } from "../../agenda_dash.js";
export default {
    components: {
        TableRow,
        Filters,
        Paginator,
        Loading
    },
    data() {
        return {
            phones: [],
            paginate: {},
            loading: false,
            filters: {
                paginate: 10,
                search: ""
            }
        };
    },
    methods: {
        fetch: _.debounce(function(url = null) {
            this.loading = !this.loading;
            axios
                .get(
                    url !== null
                        ? url
                        : `/phones/${JSON.stringify(this.filters)}/fetch`
                )
                .then(({ data }) => {
                    this.phones = [];
                    this.phones = data.data;
                    delete data.data;
                    this.paginate = data;
                    this.loading = !this.loading;
                })
                .catch(error => {
                    this.loading = !this.loading;
                    console.error(error);
                });
        }, 300),
        destroy(index) {
            this.phones.splice(index, 1);
        }
    },
    created() {
        this.fetch();
        eventBus.$on("filter", filter => {
            this.filters = filter;
            this.fetch();
        });

        eventBus.$on("destroy", index => {
            this.destroy(index);
        });
    }
};
</script>
