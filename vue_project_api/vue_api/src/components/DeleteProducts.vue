<script>
import axios from "axios";

export default {
  methods: {
    deleteProduct() {
      const token = localStorage.getItem('token')
      const productId = this.$route.params.id;
      axios
          .delete(`http://127.0.0.1:8000/api/v1/products/${productId}`,{
            headers: {
              Authorization: `Bearer ${token}`,            }
          })
          .then((response) => console.log(response))
          .catch((error) => console.error(error));
          this.$router.push({ path: '/products' })
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