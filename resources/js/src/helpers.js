import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)

export const toast = (message, title, variant = "secondary") => {
    this.$bvToast.toast(message, {
        title,
        variant,
        solid: true
    });
}
