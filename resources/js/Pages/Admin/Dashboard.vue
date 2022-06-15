<template>
  <h2>Page</h2>
  <dir>
    {{ message }}
  </dir>
</template>

<script>
export default {
  name: 'Dashboard',
  props: {
    message: String,
  },
  data() {
    return {
    }
  }
}
</script>

<style>
</style>
