<script>
import axios from "axios";
import Categories from "@/components/Categories.vue";

export default {
  components: {Categories},
  data() {
    return {
      productData: {
        name: '',
        description: '',
        price: 0,
        stock: 0,
        image: null,
      }
    }
  },
  methods: {
    onFileChange(event) {
      this.productData.image = event.target.files[0];
    },
    createProduct() {
      const token = localStorage.getItem('token')
      const formData = new FormData();
      formData.append('name', this.productData.name);
      formData.append('description', this.productData.description);
      formData.append('image', this.productData.image);
      formData.append('price', this.productData.price);
      formData.append('stock', this.productData.stock);
      axios
          .post('http://127.0.0.1:8000/api/v1/products', formData, {
            headers: {
              'Content-Type': 'multipart/form-data',
              Authorization: `Bearer ${token}`,
            }
          })
          .then((response) => {
            console.log(response);
            this.$router.push({ path: '/products' });
          })
          .catch((error) => {
            console.error(error);
          });
    }
  }
}
</script>


<template>
  <h1>Ajoutée un produit</h1>
  <section>
    <form @submit.prevent="createProduct">
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
        <input type="file" @change="onFileChange">
      </div>

      <button>Ajouté</button>
      <button><router-link to="/products" class="cancel">Cancel</router-link></button>
    </form>
  </section>
</template>

<style scoped>
html,body{margin:0;padding:0}
section{height:100vh;display:grid;justify-items:center;padding-top:40px}
div{margin:24px auto}
label{font-weight:bolder;display:block;margin-bottom:4px}
.cancel{
  color: white;
}
</style>