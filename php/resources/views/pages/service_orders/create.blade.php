@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Service Order') }}</div>

                <div class="card-body">
                    @include('pages.service_orders.parts', [
                        'isEdit' => false,
                        'client_id' => '',
                        'assigned_employee_id' => '',
                        'requested_date' => '',
                        'complain_or_request' => '',
                        'jobs_done' => '',
                        'findings' => '',
                        'remarks' => '',
                        'printed_name' => '',
                        'done_date' => '',
                        'buttonText' => 'Create'
                    ])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
