import Vue from 'vue';
import axios from 'axios';

import Form from './core/Form'

import Example from './components/Example'

// the statements below makes it possible to use the form class and axios anywhere on the application
window.axios = axios;
window.Form = Form;


new Vue({
    el: '#root',

    data: {
        // skills: [],
        // name: '',
        // description: '',
        form: new Form({
            name: '',
            description: '',
        }),
        // errors: new Errors(),

    },

    components: {
        Example
    },
    // mounted(){
    //     axios.get('/skills').then(response => this.skills = response.data)
    // },

    methods: {
        onSubmit(){
            this.form.submit('post', '/projects')
            // // alert('Submitting');
            // axios.post('/projects', this.$data)
            // // call an onSuccess method which clears the input after submit
            // .then(this.onSuccess)
            // .catch(error =>this.form.errors.record(error.response.data.errors))
        },

       
    }
})