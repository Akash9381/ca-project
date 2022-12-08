@extends('frontend.dashboard_layouts.dashboard_layouts')

@section('content')
    <div class="main-panel" id="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
            <div class="row text-light">
                <div class="col-12">
                    GST ARN: <b>{{ $gstdata['arn'] }}</b>
                </div>
                <div class="col-12 mt-1">
                  Return Type: <b>{{ $gstdata['return_type'] }}</b>
                </div>
                <div class="col-12 mt-1">
                    Financial Year: <b>{{ $gstdata['financial_year'] }}</b>
                </div>
                <div class="col-12 mt-1">
                   Tax Period: <b>{{ $gstdata['tax_period'] }}</b>
                </div>
                <div class="col-12 mt-1">
                    Filing Date: <b>{{ $gstdata['filing_date'] }}</b>
                </div>
                <div class="col-12 mt-1">
                    Status: <b>{{ $gstdata['status'] }}</b>
                </div>
                <div class="col-12 my-1">
                    Mode Of Filing: <b>{{ $gstdata['mode_of_filing'] }}</b>
                </div>
                <label for=""></label>
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
            {{-- <div class="row">
                @isset($gstdocuments)
                @foreach ($gstdocuments as $item)
                @if ($item['type']=='Achnowledgement')
                <div class="col-lg-4" >
                    <div class="card card-chart achnowledgement">
                        <div class="card-header">
                        <h6 class="card-title text-center bear-years">Achnowledgement</h6>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @foreach ($gstdocuments as $item)
                @if ($item['type']=='Form')
                <div class="col-lg-4" >
                    <div class="card card-chart form">
                        <div class="card-header">
                        <h6 class="card-title text-center bear-years">Form</h6>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @foreach ($gstdocuments as $item)
                @if ($item['type']=='Challan')
                <div class="col-lg-4" >
                    <div class="card card-chart challan">
                        <div class="card-header">
                        <h6 class="card-title text-center bear-years">Challan</h6>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endisset
            </div> --}}
        @isset($gstdocuments)
        <div class="row mt-5">
            <div class="col-12">
                <h3 for=""><u>Achnowledgement</u></h3>
            </div>
        </div>
        @forelse ($gstdocuments as $item)
            <div class="row"  >
                @if ($item['type']=='Achnowledgement')
                <div class="mb-3 col-md-6 col-12">
                    <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/GST/'.$item['documents'])}}" ></iframe><br>
                </div>
                @endif
            </div>
            @empty
        <div class="row ">
            <div class="col-12">
                <h4 for=""><u>No Documents of Achnowledgement</u></h4>
            </div>
        </div>
    </label>
        @endforelse
        <hr>
        <div class="row ">
            <div class="col-12">
                <h3 for=""><u>Form</u></h3>
            </div>
        </div>
        @foreach ($gstdocuments as $item)
            <div class="row" >
                @if ($item['type']=='Form')
                <div class="mb-3 col-md-6 col-12  form_data" >
                    <iframe  width="50%" class="mb-3" height="300" src="{{asset('Library/GST/'.$item['documents'])}}" ></iframe><br>
                </div>
                @endif
            </div>
        @endforeach
        <hr>
        <div class="row ">
            <div class="col-12">
                <h3 for=""><u>Challan</u></h3>
            </div>
        </div>
        @foreach ($gstdocuments as $item)
            <div class="row">
                @if ($item['type']=='Challan')
                <div class="mb-3 col-md-6 col-12">
                    <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/GST/'.$item['documents'])}}" ></iframe><br>
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
