<template>
    <div class="row contact">
        <div class="contact-card" :id="contact.cod_usuario">
            <div
                class="col-md-12 d-flex justify-content-start align-items-center"
                @click="toggle"
            >
                <img
                    class="contact-img"
                    :src="contact.avatar"
                    :alt="contact.nome"
                    v-if="contact.avatar"
                />
                <span v-text="contact.nome"></span>
            </div>
            <div
                class="col-md-12 d-flex justify-content-around align-items-center mt-3"
                v-if="details"
            >
                <a
                    :href="`tel:015${phone.phone_number_1}`"
                    v-for="phone in contact.phones"
                    :key="phone.id"
                    ><i class="fas fa-phone contact-phone"></i
                ></a>
                <a :href="`mailto:${contact.email}`"
                    ><i class="far fa-envelope contact-mail"></i
                ></a>
                <a
                    :href="`https://wa.me/55${phone.phone_number_1}`"
                    v-for="phone in contact.phones"
                    :key="`whatsapp${phone.id}`"
                    ><i class="fab fa-whatsapp contact-whatsapp"></i></i
                ></a>
                <a
                    :href="`sms:015${phone.phone_number_1}`"
                    v-for="phone in contact.phones"
                    :key="`sms${phone.id}`"
                    ><i class="fas fa-comment-alt contact-sms"></i
                ></a>
                <a :href="`/contacts/${contact.cod_usuario}`"
                    ><i class="fas fa-info-circle contact-info"></i
                ></a>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["contact", "index"],
    data() {
        return {
            details: false
        };
    },
    methods: {
        toggle() {
            this.details = !this.details;
        }
    }
};
</script>
