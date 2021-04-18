<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">{{ this.getMessage('Register') }}</div>
            <div class="card-body">
                <form autocomplete="off" @submit.prevent="register">
                    <div class="form-group">
                        <label for="first_name">{{ this.getMessage('First_name') }}</label>
                        <input id="first_name" class="form-control" v-model="first_name">
                    </div>

                    <div class="form-group">
                        <label for="first_name">{{ this.getMessage('Last_name') }}</label>
                        <input id="last_name" class="form-control" v-model="last_name">
                    </div>

                    <div class="form-group">
                        <label for="email">{{ this.getMessage('Email') }}</label>
                        <input id="email" class="form-control" v-model="email">
                    </div>

                    <div class="form-group">
                        <label for="password">{{ this.getMessage('Password') }}</label>
                        <input id="password" class="form-control" v-model="password">
                    </div>

                    <div class="form-group">
                        <label for="password">{{ this.getMessage('Confirm_password') }}</label>
                        <input id="password_confirmation" class="form-control" v-model="password_confirmation">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        {{ this.getMessage('Register') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import {mapActions, mapGetters} from "vuex";

export default {
    data() {
        return {
            first_name: '',
            last_name: '',
            email: '',
            password: '',
            password_confirmation: '',
        }
    },
    computed: {
        ...mapGetters([
            'getMessage'
        ]),
    },
    methods: {
        ...mapActions([
            'authRegister'
        ]),
        register() {
            const data = {
                first_name: this.first_name,
                last_name: this.last_name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
            }

            this.authRegister(data);
        }
    }
}
</script>
