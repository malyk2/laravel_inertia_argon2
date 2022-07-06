<template>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item" v-for="page in pagesNumber" :key="page">
        <a class="page-link" href="#" @click.prevent="changePage(page)">{{
          page
        }}</a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "PaginatorAdmin",
  props: {
    meta: {
      type: Object,
      required: true,
    },
    offset: {
      type: Number,
      default: 2,
    },
  },
  computed: {
    pagesNumber() {
      if (!this.meta.to) {
        return [];
      }
      let from = this.meta.current_page - this.offset;
      if (from < 1) {
        from = 1;
      }
      let to = from + this.offset * 2;
      if (to >= this.meta.last_page) {
        to = this.meta.last_page;
      }
      let pagesArray = [];
      for (let page = from; page <= to; page++) {
        pagesArray.push(page);
      }
      return pagesArray;
    },
  },
  methods: {
    changePage(page) {
      this.$emit("paginate", page);
    },
  },
};
</script>

<style>
</style>
