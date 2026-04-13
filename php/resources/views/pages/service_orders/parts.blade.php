
<form method="POST" action="{{$isEdit ? route('service_orders.update', $serviceOrder->id) : route('service_orders.store')}}">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif
    <div class="row mb-3">
        <label for="client_id" class="col-md-4 col-form-label text-md-end">{{ __('Client *') }}</label>

        <div class="col-md-6">
            <select class="form-control" @error('client_id') is-invalid @enderror name="client_id" value="{{old('client_id', $client_id)}}" required autofocus>
                @foreach ($clients as $client)
                    <option value="{{$client->id}}" {{ request()->get('client_id') == $client->id ? 'selected' : '' }}>{{$client->name}}</option>
                @endforeach
            </select>
            @error('client_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="assigned_employee_id" class="col-md-4 col-form-label text-md-end">{{ __('Assigned Employee') }}</label>

        <div class="col-md-6">
            <select class="form-control" @error('assigned_employee_id') is-invalid @enderror name="assigned_employee_id">
                <option selected>Select an employee</option>
                @foreach ($employees as $employee)
                    <option value="{{$employee->id}}" {{ request()->get('assigned_employee_id') == $employee->id ? 'selected' : '' }}>{{$employee->person->fullname}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="requested_date" class="col-md-4 col-form-label text-md-end">{{ __('Requested Date *') }}</label>

        <div class="col-md-6">
            <input type="date" class="form-control @error('requested_date') is-invalid @enderror" name="requested_date" value="{{ old('requested_date', $requested_date) }}" required>

            @error('requested_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="complain_or_request" class="col-md-4 col-form-label text-md-end">{{ __('Complaint or Request *') }}</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="complain_or_request" value="{{ old('complain_or_request', $complain_or_request) }}" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="jobs_done" class="col-md-4 col-form-label text-md-end">{{ __('Jobs Done') }}</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="jobs_done" value="{{ old('jobs_done', $jobs_done) }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="findings" class="col-md-4 col-form-label text-md-end">{{ __('Findings') }}</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="findings" value="{{ old('findings', $findings) }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="remarks" class="col-md-4 col-form-label text-md-end">{{ __('Remarks') }}</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="remarks" value="{{ old('remarks', $remarks) }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="printed_name" class="col-md-4 col-form-label text-md-end">{{ __('Printed Name') }}</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="printed_name" value="{{ old('printed_name', $printed_name) }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="done_date" class="col-md-4 col-form-label text-md-end">{{ __('Done Date') }}</label>

        <div class="col-md-6">
            <input type="date" class="form-control @error('done_date') is-invalid @enderror" name="done_date" value="{{ old('done_date', $done_date) }}" />
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ $buttonText }}
            </button>
            <a href="{{route('employee.index')}}" class="btn btn-warning">Cancel</a>
        </div>
    </div>
</form>
