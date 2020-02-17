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

                    <a class="btn btn-primary btn-sm" href="{{ url('/create-todo') }}">New todo.</a>

                    <ul>
                        @foreach($todos as $todo)
                        <li>
                            {{ $todo->name }}
                            <br>
                            {{ $todo->description }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
