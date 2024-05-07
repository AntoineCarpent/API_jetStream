<script>
import axios from "axios";

export default {
  data() {
    return {
      productData: {
        name: this.$route.params.name,
        description: this.$route.params.description,
        price: this.$route.params.price,
        stock: this.$route.params.stock,
        image: '',
        category: 0,

      }
    }
  },
  methods: {
    updateProduct() {
      const productId = this.$route.params.id;
      axios
          .put(`http://127.0.0.1:8000/api/v1/products/${productId}`, this.productData,{
            headers: {
              Authorization: `Bearer 3|LOIHy4tRRlrNYdGQf4wFLfnQtLe2KqGeOMBH1jRL7937f2ee`
            }
          })
          .then((response) => console.log(response))
      this.$router.push({ path: '/' })
          .catch((error) => console.error(error));
    }
  }
}
</script>

<template>
  <h1>Modifier un produit</h1>
  <section>
    <form @submit.prevent="updateProduct">
      <div>
        <label for="name">Name: </label>
        <input type="text" id="name" v-model="productData.name">
      </div>
      <div>
        <label for="description">Description: </label>
        <textarea id="description" rows="6" cols="22" v-model="productData.description"></textarea>
      </div>
      <div>
        <label for="price">Prix: </label>
        <input type="decimal" id="price" v-model="productData.price">
      </div>
      <div>
        <label for="stock">Stock: </label>
        <input type="number" id="stock" v-model="productData.stock">
      </div>
      <div>
        <label for="image">Image: </label>
        <input type="file" id="image" >
      </div>
      <div>
        <label for="category">Categorie: </label>
        <input type="number" id="category"  v-model="productData.category">
      </div>
      <button>Modifier</button>
    </form>
  </section>
</template>

<style scoped>
html,body{margin:0;padding:0}
section{height:100vh;display:grid;justify-items:center;padding-top:40px}
div{margin:24px auto}
label{font-weight:bolder;display:block;margin-bottom:4px}
</style>