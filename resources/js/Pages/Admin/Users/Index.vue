<template>
  <div class="py-4 container-fluid">
    <div class="card">
      <div class="card-header pb-0">
        <h6>Users</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th
                  class="
                    text-uppercase text-secondary text-xxs
                    font-weight-bolder
                    opacity-7
                  "
                >
                  Name
                </th>
                <th
                  class="
                    text-uppercase text-secondary text-xxs
                    font-weight-bolder
                    opacity-7
                  "
                >
                  Email
                </th>
                <th
                  class="
                    text-uppercase text-secondary text-xxs
                    font-weight-bolder
                    opacity-7
                  "
                >
                  Created
                </th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users.data" :key="user.id">
                <td class="align-middle px-4">
                  <span class="text-secondary text-xs font-weight-bold">{{
                    user.name
                  }}</span>
                </td>
                <td class="align-middle px-4">
                  <span class="text-secondary text-xs font-weight-bold">{{
                    user.email
                  }}</span>
                </td>
                <td class="align-middle px-4">
                  <span class="text-secondary text-xs font-weight-bold">{{
                    user.created_at
                  }}</span>
                </td>
                <td class="align-middle px-4">
                  <a
                    href="javascript:;"
                    class="text-secondary font-weight-bold text-xs"
                    data-toggle="tooltip"
                    data-original-title="Edit user"
                    >Edit</a
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="mt-4 row">
        <div class="col-12 text-center">
          <paginator-admin :meta="users.meta" @paginate="getUsers" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AuthorsTable from "@/Views/Examples/Admin/AuthorsTable.vue";
import ProjectsTable from "@/Views/Examples/Admin/ProjectsTable.vue";
import Panel from "@/Layouts/Admin/Panel.vue";
import PaginatorAdmin from "@/Components/Admin/Paginators/PaginatorAdmin.vue";
export default {
  name: "PagesAdminUsersIndex",
  layout: Panel,
  components: {
    AuthorsTable,
    ProjectsTable,
    PaginatorAdmin,
  },
  props: {
    users: {
      type: Object,
      default: () => ({ data: [], meta: {}, links: [] }),
    },
  },
  data() {
    return {
      current_page: 1,
    };
  },
  methods: {
    getUsers(page) {
      if (page > 0 && page != this.users.meta.current_page) {
        this.$inertia.visit("users", { data: { page: page } });
      }
    },
  },
};
</script>

<style>
</style>


