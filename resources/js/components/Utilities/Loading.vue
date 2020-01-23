<template>
    <!--<div class="d-flex justify-content-center" v-if="loading"> -->
    <div class="d-flex justify-content-center">
        <div
            class="spinner-border spinner-border-sm"
            :class="spinner ? spinner : 'text-light'"
            role="status"
        >
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</template>
<script>
import { eventBus } from "../../agenda_dash";
export default {
    data() {
        return {
            loading: false
        };
    },
    props: ["spinner"],
    created() {
        eventBus.$on("loading", () => {
            this.loading = !this.loading
        });
    }
};
</script>
