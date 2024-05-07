<script>
import axios from "axios";

export default {
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
    this.postData.image = event.target.files[0];
  },
  createProduct() {
    const formData = new FormData();
    formData.append('title', this.postData.title);
    formData.append('content', this.postData.content);
    formData.append('image', this.postData.image);
      axios
        .post('http://127.0.0.1:8000/api/v1/products', this.productData,{
          headers: {
            Authorization: `Bearer 5|MlWAOHoSBBwmECHEvUSfScjkz2K1ehifQJtHaSmY51ff9d82`
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
  <div v-for="category in categories" :key="category.id">
    <p>{{category.name}}</p>
  </div>
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
    </form>
  </section>
</template>

<style scoped>
html,body{margin:0;padding:0}
section{height:100vh;display:grid;justify-items:center;padding-top:40px}
div{margin:24px auto}
label{font-weight:bolder;display:block;margin-bottom:4px}
</style>