<template>
    <header class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'home'}">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'about'}">Chi Siamo</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'contact'}">Contatti</router-link>
                    </li>
                    
                
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'Header'
}
</script>

<style>
    .router-link-exact-active{
        font-weight: bold;
        text-transform: uppercase;
        
    }
</style>