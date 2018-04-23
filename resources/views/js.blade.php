@section('jscode')
<script>
    $(document).ready(function () {
        // $('.cart-msg').hide();
        @foreach($data as $row)
        $('#upCart{{$row->id}}').on('change keyup', function () {
            var newQty = $('#upCart{{$row->id}}').val();
            var rowID = $('#rowID{{$row->id}}').val();
            // alert(rowID);
            $.ajax({
                url: '{{url('/cart/update')}}',
                data: 'rowID=' + rowID + '&newQty=' + newQty,
                type: 'get',
                success:function (res) {
                    // $('.cart-msg').show();
                    console.log(res);
                    // $('.cart-msg').html(res);
                }
            });
        });
        @endforeach


    });

</script>

@endsection