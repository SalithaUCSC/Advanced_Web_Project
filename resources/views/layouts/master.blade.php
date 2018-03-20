<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--  <title>{{ $title }}</title>  --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    {{--  <link href="{{ asset('css/lumenBootstrap.min.css') }}" rel="stylesheet">  --}}
    <!-- Font Awesome -->
    {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  --}}
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('dropify/css/dropify.css' )}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Oswald|Michroma" rel="stylesheet" type="text/css">
</head>
<body>

        @yield('content')
    
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>
            
    <script src="{{ asset('js/font-awesome/fontawesome-all.min.js') }}"></script>
    {{--  <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>  --}}
        <script src="{{ asset('dropify/js/dropify.js' )}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.dropify').dropify();
        });
    </script>
    <script>
        $( function() {

          $( "#search-item" ).autocomplete({
            source: 'http://localhost:8000/search'
          });
        });

        $(document).on('click', '.ui-autocomplete-input', function(){
           
        });
    </script>
    {{--  <script>
      $('#search-form').submit(function(){
        data = $(this).seriallize();
        $.post('/search', data, function(search_item){
            $('#data').html('');
            $.each(search_item, function(key, val){
               $('#data').append( '<p>'+val.name+'</p>');
            });
        });
      });
    </script>  --}}
</body>
</html>