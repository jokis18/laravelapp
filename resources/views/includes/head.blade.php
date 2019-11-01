<!doctype html>
<html lang="{{config('app.locale')}}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://whamedia.com/wp-content/themes/whamedia-theme/images/whamedia.png">

    <title>{{config('app.name', 'Shopify Export App')}}</title>

    <!-- Bootstrap core CSS -->
    <link 
      rel="stylesheet" 
      href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" 
      integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" 
      crossorigin="anonymous"
    >
    <!--FontAwesome Icons-->
    <script src="https://kit.fontawesome.com/3225022780.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    @include('includes.styles')
  </head>