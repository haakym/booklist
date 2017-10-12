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
                            <button class="btn btn-default btn-sm">&#10006;</button>
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