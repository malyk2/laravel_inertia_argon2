<template>
  <!-- <div class="container top-0 position-sticky z-index-sticky"> -->
  <!-- <div class="row">
      <div class="col-12">
        <navbar
          isBlur="blur  border-radius-lg my-3 py-2 start-0 end-0 mx-4 shadow"
          v-bind:darkMode="true"
          isBtn="bg-gradient-success"
        />
      </div>
    </div> -->
  <!-- </div> -->
  <main class="mt-0 main-content">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="mx-auto col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0">
              <div class="card card-plain">
                <div class="pb-0 card-header text-start">
                  <h4 class="font-weight-bolder">Sign In</h4>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">
                  <form role="form" class="needs-validation" @submit.prevent="submit">
                    <div class="mb-3">
                      <argon-input type="email" placeholder="Email" name="email" size="lg" v-model="form.email"
                        :errorText="form.errors.email" />
                    </div>
                    <div class="mb-3">
                      <argon-input type="password" placeholder="Password" name="password" size="lg"
                        v-model="form.password" :errorText="form.errors.password" />
                    </div>
                    <argon-switch id="rememberMe" v-model:checked="form.remember_me">Remember me</argon-switch>

                    <div class="text-center">
                      <argon-button class="mt-4" variant="gradient" color="success" fullWidth size="lg"
                        :disabled="form.processing">Sign in
                      </argon-button>
                    </div>
                  </form>
                </div>
                <div class="px-1 pt-0 text-center card-footer px-lg-2">
                  <p class="mx-auto mb-4 text-sm">
                    Don't have an account?
                    <a href="javascript:;" class="text-success text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div
              class="top-0 my-auto text-center col-6 d-lg-flex d-none h-100 pe-0 position-absolute end-0 justify-content-center flex-column">
              <div
                class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-success opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                <p class="text-white position-relative">The more effortless the writing looks, the more effort the
                  writer actually put into the process.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
import Navbar from "@/Components/Admin/Navbars/Navbar.vue";
import ArgonInput from "@/Components/Admin/ArgonInput.vue";
import ArgonSwitch from "@/Components/Admin/ArgonSwitch.vue";
import ArgonButton from "@/Components/Admin/ArgonButton.vue";
import { Inertia } from '@inertiajs/inertia'
import { useForm } from '@inertiajs/inertia-vue3'
// const body = document.getElementsByTagName("body")[0];

export default {
  name: "PagesAdminAuthLogin",
  layout: null,
  components: {
    Navbar,
    ArgonInput,
    ArgonSwitch,
    ArgonButton,
  },
  data() {
    return {
      form: useForm({
        email: null,
        password: null,
        remember_me: true,
      })
    }
  },
  methods: {
    submit() {
      console.log('submit');
      console.log(this.form);
      // Inertia.post('/admin/login', this.form)
      this.form.post('/admin/login')
    }
  },
  created() {
    // this.$store.state.theme.hideConfigButton = true;
    // this.$store.state.theme.showNavbar = false;
    // this.$store.state.theme.showSidenav = false;
    // this.$store.state.theme.showFooter = false;
    // body.classList.remove("bg-gray-100");
  },
  beforeUnmount() {
    // this.$store.state.theme.hideConfigButton = false;
    // this.$store.state.theme.showNavbar = true;
    // this.$store.state.theme.showSidenav = true;
    // this.$store.state.theme.showFooter = true;
    // body.classList.add("bg-gray-100");
  },
};
</script>
