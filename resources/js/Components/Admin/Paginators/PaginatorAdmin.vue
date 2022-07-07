<template>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item" v-if="meta.current_page > 2">
        <a class="page-link" href="#" @click.prevent="changePage(1)">
          <i class="fas fa-chevron-left"></i>
          <i class="fas fa-chevron-left"></i>
        </a>
      </li>
      <li class="page-item" v-if="meta.current_page > 1">
        <a class="page-link" href="#" @click.prevent="changePage(meta.current_page - 1)">
          <i class="fas fa-chevron-left"></i>
        </a>
      </li>
      <li class="page-item" :class="{ 'active': page == meta.current_page }" v-for="page in pagesNumber" :key="page">
        <a class="page-link" href="#" @click.prevent="changePage(page)">{{
            page
        }}</a>
      </li>
      <li class="page-item" v-if="meta.last_page > meta.current_page">
        <a class="page-link" href="#" @click.prevent="changePage(meta.current_page + 1)">
          <i class="fas fa-chevron-right"></i>
        </a>
      </li>
      <li class="page-item" v-if="(meta.last_page - meta.current_page) > 1">
        <a class="page-link" href="#" @click.prevent="changePage(meta.last_page)">
          <i class="fas fa-chevron-right"></i>
          <i class="fas fa-chevron-right"></i>
        </a>
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
      default: 1,
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
