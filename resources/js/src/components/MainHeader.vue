<template>
    <div>
        <b-navbar toggleable="lg" class="mb-5">
            <b-navbar-brand :to="{name: 'home'}">NavBar</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav class="ml-auto">
                    <b-nav-item
                        :active-class="'active'"
                        :to="{name: 'login'}"
                        :exact="true">
                        {{ this.getMessage('Login') }}
                    </b-nav-item>
                    <b-nav-item
                        :active-class="'active'"
                        :to="{name: 'register'}"
                        :exact="true">
                        {{ this.getMessage('Register') }}
                    </b-nav-item>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "MainHeader",
    computed: {
        ...mapGetters([
            'getMessage'
        ]),
    }
}
</script>
