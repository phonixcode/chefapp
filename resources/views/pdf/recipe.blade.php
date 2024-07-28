<!DOCTYPE html>
<html>
<head>
    <title>Recipe Information</title>
</head>
<body>
    <div class="container">
        <h1>Recipe Information</h1>
        {{-- <h2>{{ $recipe->title }}</h2> --}}
        <div class="recipe">
            <p>{!! $recipe->recipe_information !!}</p>
        </div>
        <div class="footer">
            <p>Thank you for your purchase!</p>
        </div>
    </div>
</body>
</html>
