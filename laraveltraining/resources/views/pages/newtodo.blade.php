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
                        <div class="form-group row">
                            <label for="todoName" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input
                                    id="todoName"
                                    class="form-control"
                                    type="text"
                                    name="todoName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="todoDescription"
                                class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <input
                                    id="todoDescription"
                                    name="todoDescription"
                                    class="form-control"
                                    type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="todoPublic"
                                class="col-md-4 col-form-label text-md-right">Public</label>
                            <div class="col-md-6">
                                <input
                                    id="todoPublic"
                                    name="todoPrivacity"
                                    class="form-check-input"
                                    type="radio">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="todoPrivate"
                                class="col-md-4 col-form-label text-md-right">Private</label>
                            <div class="col-md-6">
                                <input
                                    id="todoPrivate"
                                    name="todoPrivacity"
                                    class="form-check-input"
                                    type="radio">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
