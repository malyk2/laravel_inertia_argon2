<template>
  <!-- <router-link :to="url" class="nav-link" v-bind="$attrs">
    <div
      class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center"
    >
      <slot name="icon"></slot>
    </div>
    <span
      class="nav-link-text"
      :class="this.$store.state.theme.isRTL ? ' me-1' : 'ms-1'"
      >{{ navText }}</span
    >
  </router-link> -->
  <Link :href="url" class="nav-link" v-bind="$attrs">
  <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
    <slot name="icon"></slot>
  </div>
  <span class="nav-link-text" :class="this.$store.state.theme.isRTL ? ' me-1' : 'ms-1'">{{ navText }}</span>
  </Link>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
  name: "sidenav-item",
  components: {
    Link,
  },
  props: {
    url: {
      type: String,
      required: true
    },
    navText: {
      type: String,
      required: true
    }
  }
};
</script>
