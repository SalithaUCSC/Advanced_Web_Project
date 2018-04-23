@extends('layouts.master')

@section('content')

    @include('partials.navbar_noscroll')

    {{--<h1>Price List</h1><br><br>--}}
    <div class="container" style="margin-bottom: 100px;margin-top: 100px;">
        <h1>Price List of mobile phones</h1>
        <a href="/pdf" class="btn btn-primary btn-md">Get PDF</a>
        <br><br>
        {{--<table class="table table-bordered table-striped" id="priceTable">--}}
            <table id="priceTable" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="30%">Name</th>
                    <th width="20%">Ram</th>
                    <th width="10%">Internal Memory</th>
                    <th width="20%">Back Camera</th>
                    <th width="10%">Front Camera</th>
                    <th width="10%" class="text-right">Price(LKR)</th>
                </tr>
            </thead>
            {{--@foreach($phones as $row)--}}
                <tbody>
                    {{--<tr>--}}
                        {{--<td>{{$row->name}}</td>--}}
                        {{--<td>{{$row->ram}}</td>--}}
                        {{--<td>{{$row->internal}}</td>--}}
                        {{--<td>{{$row->cam_primary}}</td>--}}
                        {{--<td>{{$row->cam_secondary}}</td>--}}
                        {{--<td class="text-right">{{$row->price}}</td>--}}
                    {{--</tr>--}}
                </tbody>
            {{--@endforeach--}}
            <tfoot>
                {{--<tr>--}}
                    {{--<th width="30%">Name</th>--}}
                    {{--<th width="20%">Ram</th>--}}
                    {{--<th width="10%">Internal Memory</th>--}}
                    {{--<th width="20%">Back Camera</th>--}}
                    {{--<th width="10%">Front Camera</th>--}}
                    {{--<th width="10%" class="text-right">Price(LKR)</th>--}}
                {{--</tr>--}}
            </tfoot>
        </table>
        {{--{{$phones->links()}}--}}
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#priceTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('get_data') }}",
                "columns":[
                    { "data": "name" },
                    { "data": "ram" },
                    { "data": "internal" },
                    { "data": "cam_primary" },
                    { "data": "cam_secondary" },
                    { "data": "price" }
                ]
            });
        });
    </script>
@endsection