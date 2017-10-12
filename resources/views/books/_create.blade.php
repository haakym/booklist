<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Add Book</h3>
    </div>
    <div class="panel-body">
        <form action="/books" method="POST" class="form" role="form">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="form-group {!! $errors->first('title', 'has-error') !!}">
                <label for="title" class="sr-only">Title:</label>
                <input type="text" name="title" class="form-control" placeholder="Title">
                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
            </div>
            <div class="form-group {!! $errors->first('title', 'has-error') !!}">
                <label for="author" class="sr-only">Author:</label>
                <input type="text" name="author" class="form-control" placeholder="Author">
                {!! $errors->first('author', '<span class="help-block">:message</span>') !!}
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>