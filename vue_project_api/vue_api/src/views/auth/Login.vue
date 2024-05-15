<script>

import {useRouter} from 'vue-router';
import axios from "axios";

export default {
  name: 'login',
  data() {
    return {
      User: {
        email: '',
        password: '',
      }
    }
  },
  methods: {
    login() {
      axios
          .post('http://127.0.0.1:8000/api/v1/users/login', this.User, {
            headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json'
            }
          })
          .then(response => {
            console.log(response);
            const token = response.data.token;
            localStorage.setItem('token', token);
            this.$router.push('/products');
          })
          .catch(error => {
            console.error(error);
          });
    }
  }
}

</script>

<template>
  <section>
    <h1>Connexion</h1>
    <p>Vous n'avez pas de compte ?
      <RouterLink to="/register">Créer un compte</RouterLink>
    </p>
    <form @submit.prevent="login">
      <div>
        <label for="email">Email </label>
        <input type="text" id="email" v-model="User.email">
      </div>
      <div>
        <label for="password">Mot de passe </label>
        <input type="password" id="password" rows="6" cols="22" v-model="User.password">
      </div>
      <button type="submit" class="button">
        Connexion
      </button>
    </form>
  </section>
</template>

<style>

button {
  color: white;
  background: #181818;
}
</style>