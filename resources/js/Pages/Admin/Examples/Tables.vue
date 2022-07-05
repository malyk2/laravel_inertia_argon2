<template>
  <div class="py-4 container-fluid">
    <div class=" row">
      <div class="col-12">
        <authors-table />
      </div>
    </div>
    <div class="mt-4 row">
      <div class="col-12">
        <projects-table />
      </div>
    </div>
  </div>
</template>

<script>
import AuthorsTable from "@/Views/Examples/Admin/AuthorsTable.vue";
import ProjectsTable from "@/Views/Examples/Admin/ProjectsTable.vue";
import Panel from '@/Layouts/Admin/Panel.vue'
export default {
  name: 'PagesAdminTables',
  layout: Panel,
  components: {
    AuthorsTable,
    ProjectsTable,
  },
  props: {},
  data() {
    return {
    }
  }
}
</script>

<style>
</style>


