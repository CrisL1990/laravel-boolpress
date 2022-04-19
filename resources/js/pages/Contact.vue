<template>
    <form @submit.prevent="SendForm">

        <div v-if="success" class="alert alert-sucess">
            Tutto ok
        </div>

        <div class="form-group">
            <label for="name">Inserisci il tuo nome</label>
            <input type="text" class="form-control" :class="{'is-invalid':errors.name}" id="name" name="name" v-model="name"> 
             <p v-for="(error, index) in errors.name" :key="'error-name' + index" class="invalid-feedback">
                {{error}}
            </p>
        </div>

        <div class="form-group">
            <label for="email">Inserisci la tua Email</label>
            <input type="email" class="form-control" :class="{'is-invalid':errors.email}" id="email" name="email" v-model="email">
            <p v-for="(error, index) in errors.email" :key="'error-email' + index" class="invalid-feedback">
                {{error}}
            </p>
        </div>

        <div class="form-group">
            <label for="message">Contenuto messaggio:</label>
            <textarea class="form-control" :class="{'is-invalid':errors.message}" id="message" rows="10" name="message" v-model="message"></textarea>
            <p v-for="(error, index) in errors.message" :key="'error_message'+index" class="invalid-feedback">
                {{error}}
            </p>
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

          this.sending = true;

          axios.post('/api/contacts', {
              'name': this.name,
              'email': this.email,
              'message': this.message
          }).then(response => {
            this.sending = false;
              
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