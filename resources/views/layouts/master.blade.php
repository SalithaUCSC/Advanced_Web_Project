<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    {{--  <link href="{{ asset('css/lumenBootstrap.min.css') }}" rel="stylesheet">  --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('dropify/css/dropify.css' )}}">
    <link rel="stylesheet" href="{{ asset('css/parsley.css' )}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Oswald|Michroma|Source+Sans+Pro|Lato" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">--}}
</head>
<body>

        @yield('content')

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="{{ asset('js/font-awesome/fontawesome-all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/parsley.js') }}"></script>
    <script src="{{ asset('dropify/js/dropify.js' )}}"></script>
        @yield('jscode')
        @include('sweet::alert')
        <script type="text/javascript">
            $(document).ready(function() {
                // $(".shopping-cart").hide('fast');
                $('.dropify').dropify();

                $('#ship-form').parsley();

                $('#passwordChange-form').hide('fast');
                $('#pwd-change').on('click', function () {
                    $('#passwordChange-form').fadeToggle();
                }) ;
            });
        </script>

        <script type="text/javascript">
            $('#cod').on('click', function () {
                $('#name').focus();
            })
        </script>
        <script>
            $(document).ready(function (){
                <?php for ($i=1; $i<20; $i++) { ?>
                $('#upCart<?php echo $i; ?>').on('change keyup', function () {
                    // alert("ok");
                    var newqty = $('#upCart<?php echo $i; ?>').val();
                    var rowId = $('#rowId<?php echo $i; ?>').val();
                    var id = $('#id<?php echo $i; ?>').val();
                    if(newqty < 0){
                        alert("Quantity should be positive");
                    }
                    else{
                        $.ajax({
                            type: 'get',
                            dataType: 'html',
                            url: '<?php echo url('/cart/update');?>/'+ id,
                            data: "qty=" + newqty + "& rowId=" + rowId + "& id=" + id,
                            success: function (response) {
                                $("#updatedCart").html(response);
                            }
                        })
                    }
                });
                <?php }?>
            });
        </script>

    @include('partials.footer')
</body>
</html>