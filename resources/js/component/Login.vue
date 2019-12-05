<template>
    <section>
        <b-field :label="$t('g.LoginMail')" label-position="on-border">
            <b-input v-model="email" type="email" maxlength="30"></b-input>
        </b-field>
        <b-button size="is-small" type="is-info">{{$t('g.LoginCheck')}}</b-button>
    </section>
</template>

<script>
    export default {
        name: "Login",
        data() {
            return {
                email: null
            }
        },

        mounted() {

        }
    }
</script>

<style scoped>
    section {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        padding: 0;
        margin: 0;
    }

    .control.has-icons-left .icon,
    .control.has-icons-right .icon {
        pointer-events: auto !important;
    }
</style>
