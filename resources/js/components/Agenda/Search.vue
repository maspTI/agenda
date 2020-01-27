<template>
    <div class="col-md-12 form-group search">
        <input
            type="text"
            class="search form-control search-input"
            @keyup="fetch"
            v-model="search"
            placeholder="Nome do contato"
        />
        <i class="fas fa-search search-icon text-muted"></i>
    </div>
</template>
<script>
import { eventBus } from "../../agenda";
export default {
    data() {
        return {
            contacts: [],
            search: ""
        };
    },
    methods: {
        fetch: _.debounce(function() {
            eventBus.$emit("loading");
            axios
                .get(`/contacts/${JSON.stringify(this.search)}/fetch`)
                .then(({ data }) => {
                    this.contacts = [];
                    this.contacts = data;
                    eventBus.$emit("contacts", this.contacts);
                })
                .catch(error => {
                    console.log(error);
                });
        }, 150)
    },
    created() {
        this.fetch();
    }
};
</script>
