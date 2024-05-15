<script>
import {defineComponent} from "vue";
import ProductListing from "../components/ProductListing.vue";
import Categories from "../components/Categories.vue";

export default defineComponent({
  components: {Categories, ProductListing}
})

</script>

<template>
  <nav>
    <RouterLink to="/products">Go to Home</RouterLink>
    <RouterLink to="/createProducts">Ajouté un produit</RouterLink>
    <RouterLink to="/category">Categorie</RouterLink>
  </nav>
  <main>
    <ProductListing />
    <Categories />
  </main>

</template>

<style scoped>

</style>