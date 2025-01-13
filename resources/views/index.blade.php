<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel- by Ahmad</title>
    <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaVE7nSkWScd-bzKgvQjQ1Cl6c0Bfr2hGfTA&s" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')

</head>

<body class="bg-black">
    @include('components.navbar');
    @include('components.carousal');
    @include('components.about');
    @include('components.footer');

</body>

</html>