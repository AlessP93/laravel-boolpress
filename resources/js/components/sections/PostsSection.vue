<template>
  <section>
    <div class="container">
        <ul>
            <li v-for="post in posts" :key="post.slug">
                {{post.title}}
            </li>
        </ul>
    </div>
  </section>
</template>

<script>

export default {
    name: 'PostsSection',
    data() {
        return {
            posts: []
        };
    },
    created() {
        axios.get('/api/posts')
        .then((response) => {
            this.posts = response.data;
        })
    },
}
</script>

<style lang="scss" scoped>

</style>