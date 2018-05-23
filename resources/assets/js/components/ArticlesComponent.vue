<template>
    <div>
        <h2>Articles</h2>

        <form @submit.prevent="addArticle" class="mb-3">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter title" v-model="article.title">
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Enter body" v-model="article.body"></textarea>
            </div>
            <button type="submit" class="btn btn-dark btn-block">Save</button>
        </form>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item" :class="{disabled: !pagination.prev_page_url}">
                    <a class="page-link" @click="fetchArticles(pagination.prev_page_url)">Previous</a>
                </li>

                <li class="page-item disabled">
                    <a class="page-link">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a>
                </li>

                <li class="page-item" :class="{disabled: !pagination.next_page_url}">
                    <a class="page-link" @click="fetchArticles(pagination.next_page_url)">Next</a>
                </li>
            </ul>
        </nav>

        <div class="card card-body mb-3" v-for="article in articles" v-bind:key="article.id">
            <h3>{{ article.title }}</h3>
            <p>{{ article.body }}</p>
            <hr>
            <button class="btn btn-info mb-1" @click="editArticle(article)">Edit</button>
            <button class="btn btn-danger" @click="deleteArticle(article.id)">Delete</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ArticleComponent",
        data(){
            return {
                articles: [],
                article: {
                    id: '',
                    title: '',
                    body: ''
                },
                article_id: '',
                pagination: {},
                edit: false
            }
        },

        created(){
            this.fetchArticles();
        },

        methods: {
            fetchArticles(page_url){
                let self = this;
                page_url = page_url || 'api/articles';
                fetch(page_url)
                    .then(response => response.json())
                    .then(response => {
                        this.articles = response.data;
                        self.makePagination(response.meta, response.links);
                    })
                    .catch(error => console.log(error))
            },
            makePagination(meta,links){
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                }
                this.pagination = pagination;
            },
            deleteArticle(id){
                fetch(`api/article/${id}`, {
                    method: 'delete'
                })
                    .then(resource => resource.json())
                    .then(resource => {
                        console.log(resource);
                        this.fetchArticles();
                    })
                    .catch(error => console.log(error))
            },
            addArticle(){
                if(this.edit === false){
                    //Add
                    fetch('api/article',{
                        method: 'post',
                        body: JSON.stringify(this.article),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                        .then(resource => resource.json())
                        .then(resource => {
                            this.clearFields();
                            this.fetchArticles();
                        })
                        .catch(error => console.log(error));
                } else {
                    //Edit
                    fetch('api/article',{
                        method: 'put',
                        body: JSON.stringify(this.article),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                        .then(resource => resource.json())
                        .then(resource => {
                            this.clearFields();
                            this.fetchArticles();
                        })
                        .catch(error => console.log(error));
                }
            },
            editArticle(article){
                this.edit = true;
                this.article.id = article.id;
                this.article.title = article.title;
                this.article.body = article.body;
                // this.article.article_id = article.id;
            },
            clearFields(){
                this.article.title = '';
                this.article.body = '';
            }
        }
    }
</script>

<style scoped>

</style>