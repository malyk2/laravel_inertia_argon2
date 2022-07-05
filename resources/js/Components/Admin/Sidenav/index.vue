<template>
  <div
    v-show="this.$store.state.theme.layout === 'default'"
    class="min-height-300 position-absolute w-100"
    :class="`${this.$store.state.theme.darkMode ? 'bg-transparent' : 'bg-success'}`"
  />

  <aside
    class="my-3 overflow-auto border-0 sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl"
    :class="`${
      this.$store.state.theme.isRTL
        ? 'me-3 rotate-caret fixed-end'
        : 'fixed-start ms-3'
    }
    ${
      this.$store.state.theme.layout === 'landing'
        ? 'bg-transparent shadow-none'
        : ' '
    } ${this.$store.state.theme.sidebarType}`"
    id="sidenav-main"
  >
    <div class="sidenav-header">
      <i
        class="top-0 p-3 cursor-pointer fas fa-times text-secondary opacity-5 position-absolute end-0 d-none d-xl-none"
        aria-hidden="true"
        id="iconSidenav"
      ></i>
      <Link href="/admin/example/dashboard" class="m-0 navbar-brand" v-bind="$attrs">
        <img
          :src="
            this.$store.state.theme.darkMode ||
            this.$store.state.theme.sidebarType === 'bg-default'
              ? logoWhite
              : logo
          "
          class="navbar-brand-img h-100"
          alt="main_logo"
        />
        <span class="ms-2 font-weight-bold me-2">Argon Dashboard 2</span>
      </Link>
    </div>
    <hr class="mt-0 horizontal dark" />
    <sidenav-list />
  </aside>
</template>
<script>
import SidenavList from "./SidenavList.vue";
import logo from "@/assets/img/logo-ct-dark.png";
import logoWhite from "@/assets/img/logo-ct.png";
import { Link } from '@inertiajs/inertia-vue3'

export default {
  name: "index",
  components: {
    SidenavList,
    Link,
  },
  data() {
    return {
      logo,
      logoWhite
    };
  },
  props: ["layout"]
};
</script>
