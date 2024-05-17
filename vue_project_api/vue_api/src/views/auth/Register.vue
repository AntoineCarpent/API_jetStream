<script>
import axios from "axios";

export default {
  name: 'login',
  data() {
    return {
      User: {
        email: '',
        name: '',
        password: '',
        password_confirmation: '',
      }
    }
  },
  methods: {
    createAccount() {
      axios
          .post('http://127.0.0.1:8000/api/v1/users/register', this.User, {
            headers: {
              'Accept': 'application/json',
            }
          })
          .then(response => {
            console.log(response);
            const token = response.data.token;
            localStorage.setItem('token', token);
            this.$router.push('/login');
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
    <h1>Inscription</h1>
    <p>Tu as déjà un compte ?
      <RouterLink to="/login">Se connecter</RouterLink>
    </p>
    <form @submit.prevent="createAccount">
      <div>
        <label for="email">Email </label>
        <input type="text" id="email" v-model="User.email">
      </div>
      <div>
        <label for="name">Nom </label>
        <input type="text" id="name" v-model="User.name">
      </div>
      <div>
        <label for="password">Mot de passe </label>
        <input type="password" id="password" rows="6" cols="22" v-model="User.password">
      </div>
      <div>
        <label for="password">Confirmation mot de passe </label>
        <input type="password" id="password" rows="6" cols="22" v-model="User.password_confirmation">
      </div>
      <button type="submit" class="button">
        Créer mon compte
      </button>
    </form>
  </section>
</template>

<style scoped>

</style>