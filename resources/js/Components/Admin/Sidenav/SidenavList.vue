<template>
  <div class="collapse navbar-collapse w-auto h-auto h-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="mt-3 nav-item">
        <h6 v-if="this.$store.state.theme.isRTL" class="text-xs ps-4 text-uppercase font-weight-bolder opacity-6"
          :class="this.$store.state.theme.isRTL ? 'me-4' : 'ms-2'">
          صفحات المرافق
        </h6>
        <h6 v-else class="text-xs ps-4 text-uppercase font-weight-bolder opacity-6"
          :class="this.$store.state.theme.isRTL ? 'me-4' : 'ms-2'">
          EXAMPLE PAGES
        </h6>
      </li>
      <li class="nav-item">
        <sidenav-item url="/admin/example/dashboard" :class="{ 'active': $page.url === '/admin/example/dashboard' }"
          :navText="this.$store.state.theme.isRTL ? 'لوحة القيادة' : 'Dashboard'">
          <template v-slot:icon>
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </template>
        </sidenav-item>
      </li>
      <li class="nav-item">
        <sidenav-item url="/admin/example/tables" :class="{ 'active': $page.url === '/admin/example/tables' }"
          :navText="this.$store.state.theme.isRTL ? 'الجداول' : 'Tables'">
          <template v-slot:icon>
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
          </template>
        </sidenav-item>
      </li>
      <li class="nav-item">
        <sidenav-item url="/admin/example/billing" :class="{ 'active': $page.url === '/admin/example/billing' }"
          :navText="this.$store.state.theme.isRTL ? 'الفواتیر' : 'Billing'">
          <template v-slot:icon>
            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
          </template>
        </sidenav-item>
      </li>
      <li class="nav-item">
        <sidenav-item url="/admin/example/vr" :class="{ 'active': $page.url === '/admin/example/vr' }" :navText="
          this.$store.state.theme.isRTL ? 'الواقع الافتراضي' : 'Virtual Reality'
        ">
          <template v-slot:icon>
            <i class="ni ni-app text-info text-sm opacity-10"></i>
          </template>
        </sidenav-item>
      </li>
      <li class="nav-item">
        <sidenav-item url="/admin/example/rtl" :class="{ 'active': $page.url === '/admin/example/rtl' }" navText="RTL">
          <template v-slot:icon>
            <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
          </template>
        </sidenav-item>
      </li>
      <li class="mt-3 nav-item">
        <h6 v-if="this.$store.state.theme.isRTL" class="text-xs ps-4 text-uppercase font-weight-bolder opacity-6"
          :class="this.$store.state.theme.isRTL ? 'me-4' : 'ms-2'">
          صفحات المرافق
        </h6>
        <h6 v-else class="text-xs ps-4 text-uppercase font-weight-bolder opacity-6"
          :class="this.$store.state.theme.isRTL ? 'me-4' : 'ms-2'">
          ACCOUNT PAGES
        </h6>
      </li>
      <li class="nav-item">
        <sidenav-item url="/admin/example/profile" :class="{ 'active': $page.url === '/admin/example/profile' }"
          :navText="this.$store.state.theme.isRTL ? 'حساب تعريفي' : 'Profile'">
          <template v-slot:icon>
            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
          </template>
        </sidenav-item>
      </li>
      <li class="nav-item">
        <sidenav-item url="/signin" :class="getRoute() === 'signin' ? 'active' : ''"
          :navText="this.$store.state.theme.isRTL ? 'تسجيل الدخول' : 'Sign In'">
          <template v-slot:icon>
            <i class="ni ni-single-copy-04 text-danger text-sm opacity-10"></i>
          </template>
        </sidenav-item>
      </li>
      <li class="nav-item">
        <sidenav-item url="/signup" :class="getRoute() === 'signup' ? 'active' : ''"
          :navText="this.$store.state.theme.isRTL ? 'اشتراك' : 'Sign Up'">
          <template v-slot:icon>
            <i class="ni ni-collection text-info text-sm opacity-10"></i>
          </template>
        </sidenav-item>
      </li>
    </ul>
  </div>
  <div class="pt-3 mx-3 mt-3 sidenav-footer">
    <sidenav-card :class="this.$store.state.theme.mcolor" textPrimary="Need Help?"
      textSecondary="Please check our docs" />
  </div>
</template>
<script>
import SidenavItem from "./SidenavItem.vue";
import SidenavCard from "./SidenavCard.vue";

export default {
  name: "SidenavList",
  props: {},
  data() {
    return {
      title: "Argon Dashboard 2",
      controls: "dashboardsExamples",
      isActive: "active"
    };
  },
  components: {
    SidenavItem,
    SidenavCard
  },
  methods: {
    getRoute() {
      const routeArr = location.pathname.split('/')
      return routeArr[2] ?? null;
    }
  }
};
</script>
