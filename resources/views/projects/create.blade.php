@extends('layouts.app')

@section('content')
<div id="root">
    <example></example>
        <div class="container-fluid">
                @include('projects.list')
            </div>
            

            <div class="container">
                <form action="/projects" method="post" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Name</label>
                        <input name="name" type="text" v-model="form.name" class="form-control">
                        <span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" v-model="form.description" ></textarea>
                        <span class="help is-danger"  v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>

                    </div>
                    <div class="container-fluid">
                        <button class="btn btn-primary" :disabled="form.errors.any()">Create</button>
                    </div>
                </form>
            </div>
</div>
    

    
<script src="/js/app.js"></script>
@endsection