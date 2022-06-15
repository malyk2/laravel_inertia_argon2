<template>
  <h2>Page</h2>
  <div>
    {{ message }}
  </div>
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
