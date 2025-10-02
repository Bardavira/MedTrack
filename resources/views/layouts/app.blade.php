<!DOCTYPE html>
<html lang="en" class="text-size-base">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>@yield('title','Med-Track')</title>

  <!-- Avoid flashing-->
  
  <script>
    (function(){
      try {
        const theme = localStorage.getItem('theme');
        if (theme === 'dark' || (!theme && window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
          document.documentElement.classList.add('dark');
        }
        const size = localStorage.getItem('textSize') || 'base';
        document.documentElement.classList.add('text-size-' + size);
      } catch(e) { /* ignore */ }
    })();
  </script>

  
  <script>tailwind = window.tailwind || {}; tailwind.config = { darkMode: 'class' };</script>
  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <style>
    /* simple global text-size classes (rem-based scaling) */
    .text-size-sm   { font-size: 87.5%; }  
    .text-size-base { font-size: 100%; }   
    .text-size-lg   { font-size: 112.5%; } 
    .text-size-xl   { font-size: 125%; }   
  </style>
</head>
<body class="bg-blue-50 dark:bg-slate-800 dark:text-white transition-colors duration-300">
   
    @include('partials.menu')      
    
  <main class="min-h-screen">
    @yield('content')
  </main>

  <script src="{{ asset('js/theme.js') }}"></script>

</body>
</html>
