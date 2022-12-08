@extends('frontend.dashboard_layouts.dashboard_layouts')

@section('content')
    <div class="main-panel" id="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
            <div class="row text-light">
                <div class="col-12 mt-1">
                    Deductor/Collector Name: <b>{{ $tdsdata['deductor_collector_name'] }}</b>
                </div>
                <div class="col-md-6">
                    Token Number: <b>{{ $tdsdata['token_number'] }}</b>
                </div>
                <div class="col-md-6 mt-1">
                    Receipt Date: <b>{{ $tdsdata['receipt_date'] }}</b>
                </div>
                <div class="col-md-6 mt-1">
                    Bar Code Value: <b>{{ $tdsdata['barcode_value'] }}</b>
                </div>
                <div class="col-md-6 mt-1">
                    Financial Year: <b>{{ $tdsdata['financial_year'] }}</b>
                </div>
                <div class="col-md-6 mt-1">
                    Quarter: <b>{{ $tdsdata['quarter'] }}</b>
                </div>
                <div class="col-md-6 my-1">
                    Form No.: <b>{{ $tdsdata['form_no'] }}</b>
                </div>
                <div class="col-md-6 my-1">
                    TAN: <b>{{ $tdsdata['tan'] }}</b>
                </div>
                <div class="col-md-6 my-1">
                    Regular Correction: <b>{{ $tdsdata['regular_correction'] }}</b>
                </div>
                <div class="col-md-6 my-1">
                    Original Token No.: <b>{{ $tdsdata['original_token_no'] }}</b>
                </div>
                <div class="col-md-6 my-1">
                    Fees Charged: <b>{{ $tdsdata['fees_charged'] }}</b>
                </div>
            </div>
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    {{-- <p class="navbar-brand" href="{{route('userdashboard')}}" style="font-weight: 500"><strong>Your GST ARN:</strong> </p> --}}

                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <p>
                                <span class="d-lg-none d-md-block">Status</span>
                            </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="panel-header panel-header-lg">

            {{-- <h1 class="text-center text-light text-uppercase"> welcome to Tax Mall</h1> --}}
        </div>
        <div class="content">

        @isset($tdsdocuments)
        <div class="row mt-5">
            <div class="col-12">
                <h3 for=""><u>Achnowledgement</u></h3>
            </div>
        </div>
        @foreach ($tdsdocuments as $item)
            <div class="row"  >
                @if ($item['type']=='Achnowledgement')
                <div class="mb-3 col-md-6 col-12">
                    <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TDS/'.$item['documents'])}}" ></iframe><br>
                </div>
                @endif
            </div>
        @endforeach
        <hr>
        <div class="row">
            <div class="col-12">
                <h3 for=""><u>Form</u></h3>
            </div>
        </div>
        @foreach ($tdsdocuments as $item)
            <div class="row"  >
                @if ($item['type']=='Form')
                <div class="mb-3 col-md-6 col-12">
                    <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TDS/'.$item['documents'])}}" ></iframe><br>
                </div>
                @endif
            </div>
        @endforeach
        <hr>
        <div class="row">
            <div class="col-12">
                <h3 for=""><u>Challan</u></h3>
            </div>
        </div>
        @foreach ($tdsdocuments as $item)
            <div class="row"  >
                @if ($item['type']=='Challam')
                <div class="mb-3 col-md-6 col-12">
                    <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TDS/'.$item['documents'])}}" ></iframe><br>
                </div>
                @endif
            </div>
        @endforeach
        <hr>
        <div class="row">
            <div class="col-12">
                <h3 for=""><u>Challan Status Enquiry</u></h3>
            </div>
        </div>
        @foreach ($tdsdocuments as $item)
            <div class="row"  >
                @if ($item['type']=='Challan Status Enquiry')
                <div class="mb-3 col-md-6 col-12 ">
                    <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TDS/'.$item['documents'])}}" ></iframe><br>
                </div>
                @endif
            </div>
        @endforeach
        @endisset
    </div>
    </div>
    </div>
<!-- Footer Start -->
<footer class="footer">
    <div class="copy-right text-center">
        <div class="container">
            <div class="copy-right-content">
                <p>
                    Copyright @2022 Tax Mall. All Rights Reserved Developed by
                    <a href="http://www.design2creative.com/" target="_blank">
                    <strong>Design 2Creative</strong>
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->
@endsection
