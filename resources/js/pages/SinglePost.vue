<template>
    <div v-if="post" class="container">
        <h1>{{post.title}}</h1>
        <p>{{post.content}}</p>
        <h4>Autore di questo post: {{post.user.name}}</h4>
        <p v-if="post.category">Categoria: {{post.category.name}}</p>
    </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return {
            post: null
        }
    },
    created() {
        // console.log(this.$route.params.slug);
        axios.get(`/api/posts/${this.$route.params.slug}`)
            .then((response) => {
                this.post = response.data;
            })
            .catch((e) => {
                // redirect alla pagina 404
                this.$router.push({name: 'page-404'});
            });
    }
}

</script>

<style>

</style>