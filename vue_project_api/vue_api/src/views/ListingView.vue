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
  <header>
    <img alt="Vue logo" class="logo" src="../assets/logo.svg" width="125" height="125"/>
    
    <nav>
      <button><RouterLink to="/createProducts" class="add-products">Ajouté un produit</RouterLink></button>
      <button @click="logout">Déconnexion</button>
    </nav>
  </header>
  <main>
    <ProductListing/>
    <Categories/>
  </main>

</template>

<style>
header{
  margin: 10px;
}
.add-products{
  color: white;
}
</style>