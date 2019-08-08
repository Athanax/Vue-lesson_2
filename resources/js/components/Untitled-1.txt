class Errors{
    constructor (){
        this.errors = {};
    }

    get(field){
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    has(field){
        return this.errors.hasOwnProperty(field);
    }

    any(){
        return Object.keys(this.errors).length >0;
    }
    

    record(errors){
        this.errors = errors;
    }

    clear(field){
        if(field){
            delete this.errors[field];
            return;
        } 
        
        this.errors = {};
    }
}

class Form{
    constructor(data){
        this.originalData = data;

        for(let field in data){
            this[field] = data[field];
        }
        this.errors = new Errors()
    }

    data(){
        let data = Object.assign({}, this); 

        delete data.originalData;
        delete data.errorsl;

        return data;
    }

    reset(){
        for(let field in this.originalData){
            this[field] = '';
        }
        
    }

    submit(requestType, url){
         axios[requestType](url, this.data())
            // call an onSuccess method which clears the input after submit
            .then(this.onSuccess.bind(this))
            .catch(this.onFail.bind(this))
    }

    onSuccess(response){
        alert(response.data.message);

        this.errors.clear();

        this.reset();
    }
    onFail(error){
        this.errors.record(error.response.data.errors)
    }
}

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