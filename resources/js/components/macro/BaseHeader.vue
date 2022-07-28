<template>
  <header>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Boolean Ale</h1>
            </div>
            <div class="col">
              <nav>
                <ul class="d-flex">
                  <li><router-link :to="{ name: 'home' }">Home</router-link></li>
                  <li><router-link :to="{ name: 'about' }">Chi Siamo</router-link></li>
                  <li><router-link :to="{ name: 'categories' }">Categorie</router-link></li>
                  <li><a href="/admin/home">Area Riservata</a></li>
                </ul>
              </nav>
            </div>
        </div>
    </div>
  </header>
</template>

<script>
export default {
    name: 'BaseHeader',
}
</script>

<style>
ul {
      justify-content: space-between;
      align-content: center;
}
li {
  margin: 0 1.25rem;
  list-style: none;
}
</style>