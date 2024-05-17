<script>
import axios from "axios";

export default {
  data() {
    return {
      products: []
    }
  },
  mounted() {
    const token = localStorage.getItem('token');
    axios.get('http://127.0.0.1:8000/api/v1/products', {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    })
        .then((response) => {
          this.products = response.data.data
        })
        .catch((error) => {
          console.error(error);
        });
  },
  methods: {
    getImageUrl(image) {
      if (image) {
        return "http://127.0.0.1:8000/" + image;
      }
    }
  }
}
</script>

<template>
  <div class="card-container">
    <div v-for="product in products" :key="product.id" class="card">
        <img :src="getImageUrl(product.image)">
      <div class="text-card">
        <h2>{{ product.name }}</h2>
        <p>{{ product.description }}</p>
        <p>Prix: {{ product.price }}</p>
      </div>
      <div class="button-card">
        <nav>
          <router-link :to="{ name: 'updateProduct', params: {
        id: product.id,
        name: product.name,
        description: product.description,
        price: product.price,
        stock: product.stock,
      } }">
            <button>Modifier</button>
          </router-link>
          <router-link :to="{ name: 'deleteProduct', params: {id: product.id} }">
            <button>Supprimer</button>
          </router-link>
        </nav>
      </div>

    </div>
  </div>

</template>

<style>
.card-container{
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
}
.card{
  height: auto;
  width: 250px;
  border-radius: 10px;
  filter: drop-shadow(5px 6px 6px #000000);
  -webkit-filter: drop-shadow(5px 6px 6px #000000);
  -moz-filter: drop-shadow(5px 6px 6px #000000);
  background: #ffffff;
  margin: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  flex-wrap: wrap;
  padding: 10px;
}
img {
  height: auto;
  width: 150px;
}
h2{
  width: 250px;
  text-align: start;
}
.text-card{
  display: flex;
  flex-direction: column;
}
p{
  margin: 5px;
}
.button-card{
  width: 200px;
  display: flex;
  justify-content: end;
}
button {
  color: white;
  background: #181818;
  border-radius: 20px;
}
</style>