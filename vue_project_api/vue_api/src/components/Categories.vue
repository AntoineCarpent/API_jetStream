<script>
import axios from "axios";

export default {
  data() {
    return {
      categories: []
    }
  },
  mounted() {
    axios
        .get('http://127.0.0.1:8000/api/v1/categories', {
          headers: {
            Authorization: `Bearer 3|LOIHy4tRRlrNYdGQf4wFLfnQtLe2KqGeOMBH1jRL7937f2ee`
          }
        })
        .then((response) => {
          this.products = response.data.data
        })
  }
}
</script>

<template>
  <h2>{{ categories.name }}</h2>
  <p>{{ categories.description }}</p>
</template>

<style scoped>

</style>