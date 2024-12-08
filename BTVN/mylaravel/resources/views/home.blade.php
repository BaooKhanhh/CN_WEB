<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài đăng</title>
</head>
<body>
    <h1>Danh sách bài đăng</h1>
    <!-- Hiển thị danh sách bài viết -->
    @foreach($posts as $post)
        <p>{{ $post->content }}</p>
    @endforeach
</body>
</html>
