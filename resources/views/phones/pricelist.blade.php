<div class="container">
    {{--<img src="/storage/logo.png" height="50px;" width="70px;">--}}
    <h1>MOBILE4U</h1>
    <h3>Price List of mobile phones</h3>
    <table border="1" cellpadding="10" width="100%" style="margin-bottom: 100px;">
        <tr>
            <th width="40%">Name</th>
            <th width="20%">Ram</th>
            <th width="20%">Memory</th>
            <th width="20%" align="right">Price(LKR)</th>
        </tr>
        @foreach($phones as $row)
            <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->ram}}</td>
                <td>{{$row->internal}}</td>
                <td align="right">{{$row->price}}</td>
            </tr>
        @endforeach
    </table>
    <br>
    <div align="right">
        <h3>MOBILE4U</h3>
        <h5>No: 43/2</h5>
        <h5>Kavinda Place</h5>
        <h5>Kirulapana</h5>
        <h5>Contact: 0777123456</h5>
        <br>
    </div>

</div>