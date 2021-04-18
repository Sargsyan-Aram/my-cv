<template>
    <router-view></router-view>
</template>
<script>
import {mapActions, mapGetters} from 'vuex'
export default {
    name: 'App',
    methods: {
        ...mapActions([
            'setLocales'
        ])
    },
    computed: {
        ...mapGetters([
            'getCurrentLocale'
        ])
    },

    created() {
        if (!this.getCurrentLocale) {
            this.setLocales();
        }
    }
}
</script>
