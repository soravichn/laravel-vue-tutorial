<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
</head>

<body class="antialiased">
  <div class="relative flex items-top justify-center">
    <div class="content">
      <div id="app">
        <example-component></example-component>
      </div>
    </div>
  </div>
</body>
<script src="{{ mix('js/app.js') }}"></script>

</html>
