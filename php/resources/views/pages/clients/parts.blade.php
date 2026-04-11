
<form method="POST" action="{{$isEdit ? route('clients.update', $client->id) : route('clients.store')}}">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif
    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name *') }}</label>

        <div class="col-md-6">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $name) }}" required autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="contact_person" class="col-md-4 col-form-label text-md-end">{{ __('Contact Person') }}</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="contact_person" value="{{ old('contact_person', $contact_person) }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

        <div class="col-md-6">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $email) }}">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

        <div class="col-md-6">
            <input type="tel" class="form-control" name="phone" value="{{ old('phone', $phone) }}" maxlength="20">
        </div>
    </div>

    <div class="row mb-3">
        <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Mobile') }}</label>

        <div class="col-md-6">
            <input type="tel" class="form-control" name="mobile" value="{{ old('mobile', $mobile) }}" maxlength="20">
        </div>
    </div>

    <div class="row mb-3">
        <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="address" value="{{ old('address', $address) }}">
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
