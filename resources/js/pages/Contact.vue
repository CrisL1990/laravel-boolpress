<template>
    <form @submit.prevent="SendForm">

        <div v-if="success" class="alert alert-sucess">
            Tutto ok
        </div>

        <div class="form-group">
            <label for="name">Inserisci il tuo nome</label>
            <input type="text" class="form-control" :class="{'is-valid':errors.name}" id="name" name="name" v-model="name"> 
        </div>

        <div class="form-group">
            <label for="email">Inserisci la tua Email</label>
            <input type="email" class="form-control" :class="{'is-valid':errors.name}" id="email" name="email" v-model="email">
            <p v-for="(error, index) in error.name" :key="'error-name' + index">
                {{error}}
            </p>
        </div>

        <div class="form-group">
            <label for="message">Contenuto del messaggio</label>
            <text-area type="text" class="form-control" :class="{'is-valid':errors.message}" id="message" name="message" v-model="message"></text-area>
        </div>
       
        <button type="submit" class="btn btn-primary">{{sending?'Invio in corso':'Invia'}}</button>
        </form>
</template>

<script>
export default {
    name:'Contact',

    data(){
        return{
            'name':'',
            'email':'',
            'message':'',

            sending: false,
            success: false,
            
            errors: {},
        }
    },

     methods: {
      sendForm() {

          this.sending = false
          axios.post('/api/contacts', {
              'name': this.name,
              'email': this.email,
              'message': this.message
          }).then(response => {
            this.sending = true;
              
            if(response.data.errors){
                this.errors = response.data.errors;
                this.success = false;
                  
            }else{
                this.success = true,
                this.email = '',
                this.name = '',
                this.message = '',
                this.errors = {}
            }
          });
      }
  }
};
</script>

<style>

</style>