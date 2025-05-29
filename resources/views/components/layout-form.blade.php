<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Organizer</title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100">

    <div class="w-full flex flex-col items-center px-24 py-12 gap-8">
        <span class="poppins-semibold text-teal-500 text-5xl text-center">{{ $heading }}</span>
        {{ $slot }}
    </div>

</body>
</html>