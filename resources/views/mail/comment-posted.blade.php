<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comment Posted</title>
</head>
<body style="background-color: #181A18; font-family: 'VT323', monospace; color: white; margin: 0; padding: 0;">
    <div style="padding: 1.5rem; display: flex; justify-content: center;">
        <div style="max-width: 600px; width: 100%; background-color: #282a28; padding: 2rem;">
            <h1 style="font-size: 2rem; margin: 0;">A new comment was posted on your blog!</h1>
            <p style="margin-top: 1rem; font-size: 1.25rem;">
                Someone has commented on your post: <strong>{{ $post->title }}</strong>
            </p>
            <p style="margin-top: 1rem; font-size: 1.25rem;">
                <a href="{{ route('posts.show', $post) }}" style="color: #F97316; text-decoration: none;">Click here to view the comment.</a>
            </p>
        </div>
    </div>
</body>
</html>
