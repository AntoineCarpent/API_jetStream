<script>
import WelcomeItem from './WelcomeItem.vue'
import DocumentationIcon from './icons/IconDocumentation.vue'
import ToolingIcon from './icons/IconTooling.vue'
import EcosystemIcon from './icons/IconEcosystem.vue'
import CommunityIcon from './icons/IconCommunity.vue'
import SupportIcon from './icons/IconSupport.vue'
import axios from "axios";

export default {
  data() {
    return {
      products: []
    }
  },
  mounted() {
    axios
        .get('http://127.0.0.1:8000/api/v1/products',{
          headers: {
            Authorization: `Bearer 5|MlWAOHoSBBwmECHEvUSfScjkz2K1ehifQJtHaSmY51ff9d82`
          }
        })
        .then((response) => {
          this.products = response.data.data
        })
  }
}
</script>

<template>
  <div v-for="product in products" :key="product.id">
    <h2>{{ product.name }}</h2>
    <p>{{ product.description }}</p>
    <p>{{ product.price }}</p>
    <img src="http://127.0.0.1:8000/{{ product.image }}">
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
</template>

<style>
button{
  color: white;
  background: #181818;
}
</style>