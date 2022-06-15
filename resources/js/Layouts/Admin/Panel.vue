
<template>
  <!-- <div
    v-show="this.$store.state.theme.layout === 'landing'"
    class="landing-bg h-100 bg-gradient-primary position-fixed w-100"
  ></div> -->
  <sidenav
    :custom_class="this.$store.state.theme.mcolor"
    :class="[
      this.$store.state.theme.isTransparent,
      this.$store.state.theme.isRTL ? 'fixed-end' : 'fixed-start'
    ]"
    v-if="this.$store.state.theme.showSidenav"
  />
  <!-- <h1>Sidenav</h1> -->
  <main
    class="main-content position-relative max-height-vh-100 h-100 border-radius-lg"
  >
    <!-- nav -->
    <!-- <navbar
      :class="[navClasses]"
      :textWhite="
        this.$store.state.theme.isAbsolute ? 'text-white opacity-8' : 'text-white'
      "
      :minNav="navbarMinimize"
      v-if="this.$store.state.theme.showNavbar"
    /> -->
    <slot/>
    <!-- <app-footer v-show="this.$store.state.theme.showFooter" />
    <configurator
      :toggle="toggleConfigurator"
      :class="[
        this.$store.state.theme.showConfig ? 'show' : '',
        this.$store.state.theme.hideConfigButton ? 'd-none' : ''
      ]"
    /> -->
  </main>
</template>
<script>
import Sidenav from "@/Components/Admin/Sidenav";
// import SidenavCard from "@/Components/Admin/Sidenav/SidenavCard.vue"
// import Configurator from "@/examples/Configurator.vue";
// import Navbar from "@/examples/Navbars/Navbar.vue";
// import AppFooter from "@/examples/Footer.vue";
// import { mapMutations } from "vuex";

export default {
  name: "LayoutsAdminPanel",
  components: {
    Sidenav,
    // SidenavCard,
    // Configurator,
    // Navbar,
    // AppFooter
  },
  // methods: {
  //   ...mapMutations(["toggleConfigurator", "navbarMinimize"])
  // },
  computed: {
    navClasses() {
      return {
        "position-sticky bg-white left-auto top-2 z-index-sticky":
          this.$store.state.theme.isNavFixed && !this.$store.state.theme.darkMode,
        "position-sticky bg-default left-auto top-2 z-index-sticky":
          this.$store.state.theme.isNavFixed && this.$store.state.theme.darkMode,
        "position-absolute px-4 mx-0 w-100 z-index-2": this.$store.state.theme
          .isAbsolute,
        "px-0 mx-4": !this.$store.state.theme.isAbsolute
      };
    }
  },
  // beforeMount() {
  //   this.$store.state.theme.isTransparent = "bg-transparent";
  // }
};
</script>
