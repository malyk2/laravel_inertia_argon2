<template>
  <div class="py-4 container-fluid">
    <div class="card">
      <div class="card-header pb-0">
        <h6>{{ user ? 'Edit user' : 'Create user' }} </h6>
      </div>
      <div class="card-body">
        <p class="text-uppercase text-sm">User Information</p>
        <form autocomplete="off" class="needs-validation" @submit.prevent="submit">
          <div class="row">
            <div class="col-md-6">
              <label for="example-text-input" class="form-control-label">Username</label>
              <argon-input type="text" name="name" v-model="form.name" :errorText="form.errors.name"
                autocomplete="off" />
            </div>
            <div class="col-md-6">
              <label for="example-text-input" class="form-control-label">Email address</label>
              <argon-input type="email" name="email" v-model="form.email" :errorText="form.errors.email"
                autocomplete="off" />
            </div>
            <div class="col-md-6">
              <label for="example-text-input" class="form-control-label">Password</label>
              <argon-input type="password" name="password" v-model="form.password" :errorText="form.errors.password"
                autocomplete="new-password" />
            </div>
            <div class="col-md-6 d-flex align-items-center">
              <argon-button class="mt-3" variant="gradient" color="success" :disabled="form.processing">{{ this.user ?
                  'Update' : 'Create'
              }}
              </argon-button>
            </div>
          </div>
        </form>
        <hr class="horizontal dark" />
      </div>
    </div>
  </div>
</template>

<script>
import Panel from "@/Layouts/Admin/Panel.vue";
import ArgonInput from "@/Components/Admin/ArgonInput.vue";
import ArgonButton from "@/Components/Admin/ArgonButton.vue";
import { useForm } from '@inertiajs/inertia-vue3'
export default {
  name: "PagesAdminUsersForm",
  layout: Panel,
  components: {
    ArgonInput,
    ArgonButton,
  },
  props: {
    user: {
      type: Object,
      default: null,
    },
  },
  data() {
    return {
      form: useForm({
        name: this.user ? this.user.name : null,
        email: this.user ? this.user.email : null,
        password: '',
      })
    };
  },
  methods: {
    submit() {
      if (this.user) {
        this.form.put('/admin/users/' + this.user.id);
      } else {
        this.form.post('/admin/users');
      }
    }
  },
};
</script>

<style>
</style>


