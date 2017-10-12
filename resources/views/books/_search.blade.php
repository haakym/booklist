<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Search</h3>
    </div>
    <div class="panel-body">
        <form action="/books" method="GET" class="form" role="form">
            <div class="form-group flex">
                <label for="title" class="sr-only">Title:</label>
                <input type="text" name="title" value="{{ request('title') }}" class="form-control" placeholder="Title">
            </div>
            <div class="form-group flex">
                <label for="author" class="sr-only">Author:</label>
                <input type="text" name="author" value="{{ request('author') }}" class="form-control" placeholder="Author">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>