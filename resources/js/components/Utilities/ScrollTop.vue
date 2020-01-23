<template>
    <a
        class="arrow-top d-flex justify-content-center align-items-center"
        @click="scrollTop"
        v-if="scroll > 48"
    >
        <i class="fas fa-arrow-up arrow-top-icon"></i>
    </a>
</template>
<script>
export default {
    data(){
        return {
            scroll: window.scrollY
        }
    },
    methods: {
        scrollTop() {
            document.getElementById("app").scrollIntoView({
                behavior: "smooth"
            });
        },
        position() {
            this.scroll = window.scrollY;
        }
    },
    created: function() {
        window.addEventListener("scroll", this.position);
    },
    destroyed: function() {
        window.removeEventListener("scroll", this.position);
    }
};
</script>
<style lang="scss">
.arrow-top {
    position: fixed;
    right: 1rem;
    bottom: 1rem;
    background-color: #606060;
    border-radius: 50%;
    width: 1rem;
    height: 1rem;
    padding: 1rem;
    cursor: pointer;
    z-index: 10;

    &-icon {
        color: #fcfcfc;
    }
}
</style>
