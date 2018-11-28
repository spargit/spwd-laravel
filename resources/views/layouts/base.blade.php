<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link rel="shortcut icon" href="/static/spwd/favicon.ico">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="/static/spwd/vendor/css/uikit.min.css" media="screen" type="text/css">
    <link rel="stylesheet" href="/static/spwd/vendor/css/font-awesome.min.css" media="screen" type="text/css">
    <link rel="stylesheet" href="/static/spwd/vendor/css/prism.css" type-"text/css">
    <link rel="stylesheet" href="/static/spwd/css/site.css" media="screen" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
  </head>
  <body class="uk-flex uk-flex-column">
    @include('partials.navigation')

    <div id="content-wrapper" class="uk-container uk-grid">
      <aside class="uk-block uk-block-muted uk-width-large-1-5 uk-hidden-small">
        @include('partials.sidebar')
      </aside>
      <main class="uk-block uk-width-large-4-5">
        @yield('content')
      </main>
    </div>

    <div class="footer">
      <div class="uk-text-center">
        <p>
          2018
          &copy; All Rights Reserved | Powered By:
          <a href="http://php.net/">PHP</a> &amp; <a href="https://laravel.com/">Laravel</a>
        </p>
      </div>
    </div>

    <script type="text/javascript" src="/static/spwd/vendor/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/static/spwd/vendor/js/uikit.min.js"></script>
    <script type="text/javascript" src="/static/spwd/vendor/js/core/offcanvas.min.js"></script>
    <script type="text/javascript" src="/static/spwd/vendor/js/prism.js"></script>
    <script type="text/javascript" src="/static/spwd/js/scripts/main.js"></script>
  </body>
</html>
