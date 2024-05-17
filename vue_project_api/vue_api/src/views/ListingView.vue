<script>
import {defineComponent} from "vue";
import ProductListing from "../components/ProductListing.vue";
import Categories from "../components/Categories.vue";

export default defineComponent({
  components: {Categories, ProductListing},
  methods: {
    logout() {
      localStorage.removeItem("token");
      this.$router.push({path: '/login'})
    }
  }
});


</script>

<template>
  <nav>
    <RouterLink to="/createProducts">Ajouté un produit</RouterLink>
    <button @click="logout">Déconnexion</button>
  </nav>
  <main>
    <ProductListing/>
    <Categories/>
  </main>

</template>

<style>
</style>