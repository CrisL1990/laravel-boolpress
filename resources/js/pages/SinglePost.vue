<template>
    <div>
        <h1>{{post.title}}</h1>
        <p>{{post.content}}</p>
    </div>
</template>

<script>
export default {
    name: "SinglePost",
    data(){
        return{
            post: null
        }
    },

    mounted(){

        const slug = this.$route.params.slug;

        axios.get('/api/posts/' + slug).then(response=>{

            if(response.data.success == true){
                this.post = response.data.result;
            }else{
                this.$router.push({name: 'not-found'})
            }
            
        })
    }
}
</script>

<style>

</style>