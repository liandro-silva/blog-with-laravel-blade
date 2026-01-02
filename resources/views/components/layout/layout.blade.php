<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>THE BLOG</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
            rel="stylesheet">

        <link rel="icon" href="{{ asset('th.svg') }}" type="image/svg+xml">

        <x-head.tinymce-config />

        <style>
          body {
            font-family: 'Inter', sans-serif;
          }
        </style>
    </head>

    <body class="h-full bg-white flex flex-col">
        <x-shared.navbar.navbar />
        <main class="flex flex-col m-auto flex-1 pt-4 pb-10 w-4/5">
            {{$slot}}
        </main>
        <x-shared.footer />
    </body>

</html>

<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TinyMCE in Laravel</title>
    <x-head.tinymce-config/>
  </head>
  <body>
    <h1>TinyMCE in Laravel</h1>
    <x-forms.tinymce-editor/>
  </body>
</html> -->