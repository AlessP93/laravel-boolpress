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
                     <ul v-if="errors.name" style="color:red">
                        <li v-for="(err, index) in errors.name" :key="index">{{err}}</li>
                    </ul>
                </div>
                <div>
                    <textarea name="content" id="content" cols="30" rows="10" placeholder="Inserisci il testo del commento" v-model="formData.content"></textarea>
                    <ul v-if="errors.content" style="color:red">
                        <li v-for="(err, index) in errors.content" :key="index">{{err}}</li>
                    </ul>
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
            formData: {
                name: '',
                content: '',
            },
            errors: {}
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
            // axios
            axios.post(`/api/comments/${this.post.id}`, this.formData)
            .then((resp) => {
                console.log(resp);
            })
            .catch((error) => {
                
                this.error = error.response.data.errors;
            });
        }
    }
}

</script>

<style>

</style>