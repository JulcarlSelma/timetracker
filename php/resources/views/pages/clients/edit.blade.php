@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Client') }}</div>

                <div class="card-body">
                    @include('pages.clients.parts', [
                        'isEdit' => true,
                        'name' => $client->name,
                        'contact_person' => $client->contact_person,
                        'email' => $client->email,
                        'phone' => $client->phone,
                        'mobile' => $client->mobile,
                        'address' => $client->address,
                        'buttonText' => 'Update'
                    ])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
