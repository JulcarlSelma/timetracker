@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Client') }}</div>

                <div class="card-body">
                    @include('pages.service_orders.parts', [
                        'isEdit' => true,
                        'client_id' => $serviceOrder->client_id,
                        'assigned_employee_id' => $serviceOrder->assigned_employee_id,
                        'requested_date' => $serviceOrder->requested_date,
                        'complain_or_request' => $serviceOrder->complain_or_request,
                        'jobs_done' => $serviceOrder->jobs_done,
                        'findings' => $serviceOrder->findings,
                        'remarks' => $serviceOrder->remarks,
                        'printed_name' => $serviceOrder->printed_name,
                        'done_date' => $serviceOrder->done_date,
                        'buttonText' => 'Update'
                    ])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
