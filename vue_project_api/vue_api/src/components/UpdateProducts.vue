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
        image: null,

      }
    }
  },
  methods: {
    onFileChange(event) {
      this.productData.image = event.target.files[0];
    },
    updateProduct() {
      const token = localStorage.getItem('token')
      const productId = this.$route.params.id;
      axios
          .post(`http://127.0.0.1:8000/api/v1/products/${productId}?_method=PUT`, this.productData, {
            headers: {
              Authorization: `Bearer ${token}`,
              'Content-Type': 'multipart/form-data'
            }
          })
          .then((response) => {
            console.log(response);
            this.$router.push({path: '/products'});
          })
          .catch((error) => {
            console.error(error);
        });
    }
  }
}
</script>

<template>
  <header>
    <img alt="Vue logo" class="logo" src="../assets/logo.svg" width="125" height="125"/>

  </header>
  <h1>Modifier un produit</h1>
  <section>
    <form @submit.prevent="updateProduct" class="card">
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
      <div class="button-card">
        <button>Modifier</button>
        <button><router-link to="/products" class="cancel">Cancel</router-link></button>
      </div>

    </form>
  </section>
</template>

<style scoped>
html, body {
  margin: 0;
  padding: 0
}

section {
  height: 100vh;
  display: grid;
  justify-items: center;
  padding-top: 40px
}

div {
  margin: 24px auto
}

label {
  font-weight: bolder;
  display: block;
  margin-bottom: 4px
}
.cancel{
  color: white;
}
</style>