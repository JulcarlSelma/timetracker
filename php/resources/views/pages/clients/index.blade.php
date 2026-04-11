@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <a href="{{route('clients.create')}}" class="btn btn-primary" style="float: right;">{{__('Add Client')}}</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Clients') }}</div>

                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Contact Person</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clients as $client)
                                <tr>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->contact_person}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->phone}}</td>
                                    <td>{{$client->mobile}}</td>
                                    <td>{{$client->address}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('clients.edit', $client->id)}}" class="btn btn-warning mx-2">Edit</a>
                                        <form action="{{route('clients.destroy', $client->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7"><p class="text-center m-0">No Record Found</p></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$clients->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
