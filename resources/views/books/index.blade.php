@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- side-bar for add and search book -->
            <div class="col-md-4">
                @include('books/_create')
                @include('books/_search')
            </div>
            <!-- book list -->
            <div class="col-md-8">
                @if($books->count())
                    <div class="panel panel-default">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="{{ sort_by_attr_link('books.index', 'title') }}">
                                            Title
                                            @if(request('sortBy') === 'title')
                                                {{ request('direction') === 'asc' ? '&#8679;' : '&#8681;' }}
                                            @endif
                                        </a>
                                    </th>
                                    <th>
                                        <a href="{{ sort_by_attr_link('books.index', 'author') }}">
                                            Author
                                            @if(request('sortBy') === 'author')
                                                {{ request('direction') === 'asc' ? '&#8679;' : '&#8681;' }}
                                            @endif
                                        </a>
                                    </th>
                                    <th class="fit">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>
                                            <form  action="/books/{{ $book->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-default btn-sm">x</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="text-align:center;">
                        {{ $books->appends($append)->links() }}
                    </div>
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
