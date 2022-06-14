<template>
    <h1>
        menu 1
    </h1>
    <h2>
        menu 2
    </h2>
    <dir>
        {{ message }}
    </dir>
</template>

<script>
export default {
    name: 'Dashboard',
    data() {
        return {
            message: 'Welcome to Your Vue.js App'
        }
    }
}
</script>

<style>
</style>
