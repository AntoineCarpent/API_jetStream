<script setup>
import TheWelcome from '../components/TheWelcome.vue'
</script>

<template>
  <div>
    <main>
    <TheWelcome />
  </main>
  <nav>
    <RouterLink to="/login">Login</RouterLink>
    <RouterLink to="/register">Register</RouterLink>
  </nav>
  </div>
  
</template>
<style>
nav{
  display: flex;
  justify-content: space-evenly;
}
</style>
