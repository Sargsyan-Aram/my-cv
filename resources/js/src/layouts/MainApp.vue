<template>
    <div>
        <main-header />
        <router-view />
        <h1>Footer</h1>
    </div>
</template>

<script>
import MainHeader from "../components/MainHeader";
export default {
    name: 'MainApp',
    components: {MainHeader},
}
</script>
