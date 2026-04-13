@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12 d-flex mb-3" style="gap: 10px;">
        <button id="printBtn" class="btn btn-primary" style="float: right;" onclick="window.print();">{{__('Print')}}</button>
        <a href="{{route('service_orders.index')}}" class="btn btn-light" style="float: right;">{{__('Back')}}</a>
    </div>

    <div class="row justify-content-center">
        <div class="printable row">
            @include('pages.service_orders.print_content')
            <br />
            <hr>
            <br />
            @include('pages.service_orders.print_content')
        </div>
    </div>
</div>
@endsection
@push('css')
<style>
.printable {
    margin: 0;
    padding: 0;
    width: 816px;
}

.printable * {
    padding: 0;
}
.printable img {
    width: 80px !important;
    height: auto !important;
}

.printable p {
    font-size: 12px;
    margin-bottom: 0px;
}
.printable .header p {
    font-size: 9px;
    margin-bottom: 0px;
    width: 100%;
}
.printable p.email span {
    text-decoration: underline;
}
.printable .contents,
.printable .contents p {
    width: 100%;
    text-align: justify;
}

.printable .contents table {
    font-size: 12px;
}

.printable .contents table tr td {
    padding: 0 !important;
}

.printable .underline {
    width: max-content;
    text-decoration: underline;
}

.printable .note {
    border: 1px solid #000;
    width: 100%;
    height: auto;
    padding: 10px;
    position: relative;
}

.printable .note p {
    font-size: 8px;
}

.printable .note .borders {
    width: 100%;
    border-bottom: 1px solid #000;
    height: 12px;
}
.printable .text-right {
    text-align: right !important;
}
@media print {
    body * {
        visibility: hidden;
    }

    .printable, .printable * {
        visibility: visible;
    }

    .printable {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }

    .printable .contents {
        width: 390px;
    }

    .printable .header .details {
        width: 474px;
    }

    /* IMPORTANT FIX */
    * {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
}
</style>
@endpush