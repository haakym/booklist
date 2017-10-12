@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('partials/status-message')
            <!-- side-bar for add and search book -->
            <div class="col-md-4">
                @include('books/_create')
                @include('books/_search')
            </div>
            <!-- book list -->
            <div class="col-md-8">
                @if($books->count())
                    @include('books/_books-list')
                @else
                    <div class="panel panel-body">
                        <div class="alert alert-warning">
                            No books to show
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
