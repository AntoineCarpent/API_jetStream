<script>
import axios from "axios";

export default {
  methods: {
    deleteProduct() {
      const productId = this.$route.params.id;
      axios
          .delete(`http://127.0.0.1:8000/api/v1/products/${productId}`,{
            headers: {
              Authorization: `Bearer 3|LOIHy4tRRlrNYdGQf4wFLfnQtLe2KqGeOMBH1jRL7937f2ee`
            }
          })
          .then((response) => console.log(response))
      this.$router.push({ path: '/' })
          .catch((error) => console.error(error));
    }
  }
};
</script>

<template>
<p>Supprimer ce produit ?</p>
  <button @click = "deleteProduct">Delete</button>
  <router-link to="/"><button>Cancel</button></router-link>
</template>

<style scoped>

</style>