<script>
import axios from "axios";

export default {
  data() {
    return {
      categories: []
    }
  },
  mounted() {
    const token = localStorage.getItem('token')
    axios
        .get('http://127.0.0.1:8000/api/v1/categories', {
          headers: {
            Authorization: `Bearer ${token}`,
          }
        })
        .then((response) => {
          this.categories = response.data.data
        })
        .catch((error) => {
          console.error(error);
        });
  }
}
</script>

<template>

</template>

<style scoped>

</style>