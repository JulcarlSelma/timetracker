@extends('layouts.app')

@section('content')
<div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <a href="{{route('service_orders.create')}}" class="btn btn-primary" style="float: right;">{{__('Create Service Order')}}</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Service Order') }}</div>

                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Address</th>
                                <th>Assigned Person</th>
                                <th>Requested Date</th>
                                <th>Complain or Request</th>
                                <th>Jobs Done</th>
                                <th>Findings</th>
                                <th>Remarks</th>
                                <th>Receiver</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{$order->client->name}}</td>
                                    <td>{{$order->client->address}}</td>
                                    <td>{{$order->assignee->person->fullname}}</td>
                                    <td>{{$order->requested_date}}</td>
                                    <td>{{$order->complain_or_request}}</td>
                                    <td>{{$order->jobs_done}}</td>
                                    <td>{{$order->findings}}</td>
                                    <td>{{$order->remarks}}</td>
                                    <td>{{$order->printed_name}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('service_orders.edit', $order->id)}}" class="btn btn-warning mx-2">Edit</a>
                                        <form action="{{route('service_orders.destroy', $order->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10"><p class="text-center m-0">No Record Found</p></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$orders->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
