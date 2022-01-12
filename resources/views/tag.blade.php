<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="flex-center position-ref full-height">
    <h2>Tag Posts</h2>
    @foreach($tags as $tag)
        <div class="panel panel-default">
            <div class="panel-heading"><h2>{{ $tag->name }}</h2></div>
            <div class="panel-body">
                <div class="panel panel-info">
                    <div class="panel-heading">POST:
                        @foreach($tag->posts as $post)
                            <span>{{ $post->title }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
</body>
</html>
