@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="/todo">
                        @csrf
                        <div class="form-group">
                            <label for="todoName">Name</label>
                            <input class="form-control my-form-control" id="todoName" type="text" name="todoName">
                        </div>
                        <div class="form-group">
                            <label for="todoDescription">Description</label>
                            <input class="form-control" id="todoDescription" type="text" name="todoDescription">
                        </div>
                        <select class="custom-select my-custom-select">
                            <option selected>Select the todo privacity</option>
                            <option value="1">Public</option>
                            <option value="2">Private</option>
                        </select>
                        <div class="my-buttons-block">
                            <button type="submit" class="btn btn-primary">Add todo</button>
                            <a href="/home" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
