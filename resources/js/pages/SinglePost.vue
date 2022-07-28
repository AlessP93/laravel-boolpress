<template>
    <div class="container">
        <h1>{{post.title}}</h1>
        <p>{{post.content}}</p>
        <h4>{{post.user.name}}</h4>
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