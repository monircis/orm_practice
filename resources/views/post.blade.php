<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    </head>
    <body>

        <div class="flex-center position-ref full-height">
            <h2>Posts Info</h2>
                <table class="table" border="1">
                  <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th>Name: {{optional($post->user)->name}}</th>
                            <th>Title: {{$post->title}}</th>
                            <th>Content: {{$post->description}}</th>
                        </tr>
                    @endforeach
                  </tbody>
                </table>

        </div>
    </body>
</html>
