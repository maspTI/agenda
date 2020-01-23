<template>
    <div class="col-md-12">
        <div class="form-row mb-2">
            <div class="col-md-4 form-group">
                <label for="paginate">Itens por Página</label>
                <select
                    name="paginate"
                    id="paginate"
                    class="form-control"
                    v-model="filter.paginate"
                    @change="applyFilter"
                >
                    <option :value="null">Selecione uma opção</option>
                    <option :value="10">10</option>
                    <option :value="20">20</option>
                    <option :value="40">40</option>
                    <option value="all">Todos</option>
                </select>
            </div>
            <div class="col-md-8 form-group">
                <label for="search">Busca</label>
                <input
                    type="text"
                    class="form-control"
                    v-model="filter.search"
                    @keyup="applyFilter"
                />
            </div>
        </div>
    </div>
</template>
<script>
import { eventBus } from "../../agenda_dash";
export default {
    data() {
        return {
            filter: {
                paginate: null,
                search: ""
            }
        };
    },
    methods: {
        applyFilter() {
            eventBus.$emit("filter", this.filter);
        }
    }
};
</script>
