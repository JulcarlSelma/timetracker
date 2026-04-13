@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12 d-flex mb-3" style="gap: 10px;">
        <button id="printBtn" class="btn btn-primary" style="float: right;" onclick="window.print();">{{__('Print')}}</button>
        <a href="{{route('service_orders.index')}}" class="btn btn-light" style="float: right;">{{__('Back')}}</a>
    </div>

    <div class="row justify-content-center">
        <div class="printable row">
            <div class="col-md-12 mb-2">
                <div class="header d-flex" style="gap: 20px;">
                    <div class="col-md-1 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('images/logo-icon.png') }}" alt="Logo" class="w-50 img-fluid" />
                    </div>
                    <div class="d-flex flex-column col-md-8 text-sm details">
                        <p>
                            Computer Sales * Service * Parts & Accessories * CCTV * Voice & Data Structured <br />
                            Cabling * Office Supplies * Audio / Video * Air Condition Unit * FDAS
                        </p>
                        <p>
                            Address: Cansaga, Consolacion, Cebu <br />
                            Telephone #: (032)3540115 Mobile #: 09178770881, 09171403283
                        </p>
                        <p class="email">Email: <span>bytencoolts@gmail.com</span></p>
                    </div>
                    <div class="d-flex align-items-end justify-content-end col-md-3">
                        <h6 class="m-0">Service Order: {{$serviceOrder->order_no}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-12 d-flex" style="gap: 20px;">
                <div class="col-md-8">
                    <div class="contents">
                        <table class="table">
                            <tr>
                                <td style="width: 100px;"><strong>Name/Company:</strong></td>
                                <td style="width: 200px;">{{$serviceOrder->client->name}}</td>
                                <td style="width: 50px;"><strong>Date:</strong></td>
                                <td style="width: 20%;">{{date('Y-m-d', strtotime($serviceOrder->requested_date))}}</td>
                            </tr>
                            <tr>
                                <td style="width: 100px;"><strong>Contact No:</strong></td>
                                <td style="width: 200px;">{{$serviceOrder->client->phone}}</td>
                                <td style="width: 100px;"><strong>Mobile:</strong></td>
                                <td style="width: 200px;">{{$serviceOrder->client->mobile}}</td>
                            </tr>
                            <tr>
                                <td style="width: 100px;"><strong>Address:</strong></td>
                                <td colspan="3" style="width: 200px;">{{$serviceOrder->client->address}}</td>
                            </tr>
                            <tr>
                                <td style="width: 100px;"><strong>Complain/Request:</strong> </td>
                                <td colspan="3" style="width: 200px;">{{$serviceOrder->complain_or_request}}</td>
                            </tr>
                            <tr>
                                <td style="width: 100px;"><strong>Jobs Done:</strong></td>
                                <td colspan="3" style="width: 200px;">{{$serviceOrder->jobs_done}}</td>
                            </tr>
                            <tr>
                                <td style="width: 100px;"><strong>Findings:</strong></td>
                                <td colspan="3" style="width: 200px;">{{$serviceOrder->findings}}</td>
                            </tr>
                            <tr>
                                <td style="width: 100px;"><strong>Remarks:</strong></td>
                                <td colspan="3" style="width: 200px;">{{$serviceOrder->remarks}}</td>
                            </tr>
                        </table>
                        <div class="note w-100">
                            <p><strong>SUMMARY OF CHARGES</strong></p>
                            <div class="w-100 borders">&nbsp;</div>
                            <div class="w-100 borders">&nbsp;</div>
                            <div class="w-100 borders">&nbsp;</div>
                            <p class="mt-2 text-right">TOTAL: ____________________________</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="note">
                        <p><strong>IMPORTANT : (PLEASE READ)</strong></p>
                        <p>1. Equipment not claimed within 60 days will be forfeited.</p>
                        <p>2. Client must present copy of service order upon claiming the equipment.</p>
                        <p>3. BYTE N COOL Technical Services shall not be liable for any damage to equipment due to flood and fortuitous events beyond its control.</p>
                        <p>4. BYTE N COOL Technical Services, Strongly recommends that separate records (back-up) copy be kept of all important data as it might be lost under circumstances. BYTE N COOL Technical Services, assumes no responsibility for data loss or otherwise rendered unusable whether as a result of improper use, repair, defects, or any other cause.</p>
                        <p>5. All Software installed in this unit subject for repair is the sole property of the client and BYTE N COOL Technical Services, Should not be held liable for any copyright, patent, intellectual property infringement for any unlicensed, pirated or illegal copy of said software inside the unit.</p>
                    </div>
                    <div class="note">
                        <p><strong>READ, UNDERSTAND, AND AGREED TO</strong></p>
                        <p>Name / Signature / Date</p>
                        <br />
                    </div>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-end mt-4 d-flex flex-column" style="gap: 40px;">
                <p><strong>RECEIVED ABOVE UNITS IN GOOD ORDER AND CONDITION</strong></p>
                <div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p>{{$serviceOrder->client->contact_person}}</p>
                        <p>&nbsp;</p>
                        <p style="width: 120px;">{{$serviceOrder->assignee->person->fullname}}</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between" style="gap: 20px; border-top: 1px solid #000;">
                        <p>Printed Name:</p>
                        <p>Signature / Date: </p>
                        <p>Released / Delivered / Installed By:</p>
                    </div>
                <div>
            </div>
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