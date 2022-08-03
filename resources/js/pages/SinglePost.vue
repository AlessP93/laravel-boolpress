<template>
    <div v-if="post" class="container">
        <h1>{{post.title}}</h1>

        <!-- <img v-if="post.image_path" :src="post.image_path" :alt="post.title"> -->
        <img width="100" v-if="post.image" :src="`/storage/${post.image}`" :alt="post.title">

        <p>{{post.content}}</p>
        <h4>Autore di questo post: {{post.user.name}}</h4>
        <!-- tag -->
        <div v-if="post.tags.length > 0">
            <h4>Lista tags</h4>
            <ul>
                <li v-for="tag in post.tags" :key="tag.id"><router-link :to="{ name: 'single-tag', params: {slug: tag.slug} }">{{tag.name}}</router-link></li>
            </ul>
        </div>
        <!-- commento -->
        <div class="mt-3">
            <h3>Lascia un commento</h3>
            <form @submit.prevent="addComment()">
                <div class="mb-1">
                    <input type="text" name="name" placeholder="Inserisci il nome" v-model="formData.name">
                </div>
                <div>
                    <textarea name="content" id="content" cols="30" rows="10" placeholder="Inserisci il testo del commento" v-model="formData.content"></textarea>
                </div>
                <div>
                    <button type="submit">Aggiungi Commento</button>
                </div>
            </form>
        </div>
        <!-- categoria -->
        <p v-if="post.category">Categoria: {{post.category.name}}</p>
    </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return {
            post: null,
            FormData: {
                name: '',
                content: '',
            }
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
    },
    methods: {
        addComment() {
            console.log(this.FormData);
        }
    }
}

</script>

<style>

</style>