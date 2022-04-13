<template>
    <div>
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{title}}</h1>
                <h2 class="card-text">{{category?category.name:'Not Set'}}</h2>
                <p class="card-text">{{cutText(content, textLen)}}</p>
                <router-link class="nav-link" :to="{name:'single-post', params:{'slug': slug}}">Vedi Post</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Post',
    props: ['title', 'content', 'slug', 'category', 'tags'],

    data(){
        return{
            textLen: 30
        }
       
    },

    methods:{

        cutText(text, len){
            
            if(text.length > len){
                return text.substring(0, len) + '...';
            }else{
                return text
            }
           
        }
    }
}
</script>

<style>

</style>