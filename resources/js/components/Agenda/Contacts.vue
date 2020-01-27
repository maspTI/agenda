<template>
    <div class="col-md-12">
        <contact
            v-for="(contact, index) in contacts"
            :contact="contact"
            :key="contact.cod_usuario"
            :index="index"
        ></contact>
    </div>
</template>
<script>
import { eventBus } from "../../agenda";
import Contact from "./Contact";
export default {
    components: {
        Contact
    },
    data() {
        return {
            contacts: [],
        };
    },
    created() {
        eventBus.$on("contacts", contacts => {
            this.contacts = [];
            this.contacts = contacts;
        });
    }
};
</script>
