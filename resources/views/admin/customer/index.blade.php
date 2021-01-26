@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Customers List</h1>
@stop

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
    @endif

    <table class="table table-striped">

        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Subscription Expire</th>
            <th>Mobile Number</th>
            <th>Address</th>
            <th>Address Landmark</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td> {{ $customer->name }} </td>
                <td> {{ $customer->email }} </td>
                <td> {{ $customer->subscription_expire }} </td>
                <td> {{ $customer->mobile_number }} </td>
                <td> {{ $customer->address . ', ' . $customer->city . ', ' .$customer->province }} </td>
                <td> {{ $customer->address_landmark }} </td>
                <td> <a href="{{route('edit-user', $customer->id)}}" class="btn btn-primary">Edit</a> <button type="button" class="btn btn-danger">Delete</button> </td>
            </tr>
            @endforeach

        </tbody>
        
    </table>
@stop

@section('css')
@stop

@section('js')
    <script>
        $('.table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    </script>
@stop