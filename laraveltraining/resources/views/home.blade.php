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

                    <a class="btn btn-primary btn-sm" href="/todo/new">New todo.</a>

                    <ul class="list-group">
                        @foreach($todos as $todo)
                        <li class="list-group-item">
                            @if ($todo->concluded == false)
                                <div class="active-status-dot"></div>
                            @else
                                <div class="inactive-status-dot"></div>
                            @endif
                            <strong>{{ $todo->name }}</strong>
                            <div class="description-content">
                                {{ $todo->description }}
                            </div>

                            <div class="my-buttons-block">
                                <form method="POST" onsubmit="return confirm('Are you sure that you want to close this todo?')" action="/todo/delete/{{ $todo->id }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button
                                     type="submit"
                                     class="btn btn-danger">Close todo</button>
                                </form>
                                <a href="/todo/edit/{{ $todo->id }}" class="btn btn-secondary">Edit todo</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
