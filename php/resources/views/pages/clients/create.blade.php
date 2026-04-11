@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Client') }}</div>

                <div class="card-body">
                    @include('pages.clients.parts', [
                        'isEdit' => false,
                        'name' => '',
                        'contact_person' => '',
                        'email' => '',
                        'phone' => '',
                        'mobile' => '',
                        'address' => '',
                        'buttonText' => 'Register'
                    ])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
