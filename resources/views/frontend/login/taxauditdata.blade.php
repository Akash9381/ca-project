@extends('frontend.dashboard_layouts.dashboard_layouts')

@section('content')
    <div class="main-panel" id="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
            <div class="row text-light">
                <div class="col-12">
                    PAN No.: <b>{{ $taxauditdata['pan_card'] }}</b>
                </div>
                <div class="col-12 mt-1">
                    Acknowledgment No.: <b>{{ $taxauditdata['acknowledgment_no'] }}</b>
                </div>
                <div class="col-12 mt-1">
                    Assessment Year: <b>{{ $taxauditdata['assessment_year'] }}</b>
                </div>
                <div class="col-12 mt-1">
                    Filing Date: <b>{{ $taxauditdata['filing_date'] }}</b>
                </div>
                <div class="col-12 mt-1">
                    Filed By: <b>{{ $taxauditdata['filed_by'] }}</b>
                </div>
                <div class="col-12 mt-1">
                    Filing Type: <b>{{ $taxauditdata['filing_type'] }}</b>
                </div>
                <div class="col-12 mt-1">
                    Status: <b>{{ $taxauditdata['status'] }}</b>
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
        @isset($taxauditdocuments)
        <div class="row mt-5">
            <div class="col-12">
                <h3 for=""><u>Achnowledgement</u></h3>
            </div>
        </div>
        @forelse ($taxauditdocuments as $item)
            <div class="row"  >
                @if ($item['type']=='Achnowledgement')
                <div class="mb-3 col-md-6 col-12 text-center">
                    <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TaxAudit/'.$item['documents'])}}" ></iframe><br>
                </div>
                @endif
            </div>
            @empty
        <div class="row text-center">
            <div class="col-12">
                <h4 for=""><u>No Documents of Achnowledgement</u></h4>
            </div>
        </div>
    </label>
        @endforelse
        <hr>
        <div class="row">
            <div class="col-12">
                <h3 for=""><u>Form</u></h3>
            </div>
        </div>
        @forelse ($taxauditdocuments as $item)
            <div class="row" >
                @if ($item['type']=='Form')
                <div class="mb-3 col-md-6 col-12 text-center form_data" >
                    <iframe  width="50%" class="mb-3" height="300" src="{{asset('Library/TaxAudit/'.$item['documents'])}}" ></iframe><br>
                </div>
                @endif
            </div>
            @empty
            <div class="row text-center">
                <div class="col-12">
                    <h4 for=""><u>No Documents of Form</u></h4>
                </div>
            </div>
        @endforelse
        <hr>
        <div class="row text-center">
            <div class="col-12">
                <h3 for=""><u>Final Statement</u></h3>
            </div>
        </div>
        @forelse ($taxauditdocuments as $item)
            <div class="row">
                @if ($item['type']=='Final Statement')
                <div class="mb-3 col-md-6 col-12 text-center">
                    <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TaxAudit/'.$item['documents'])}}" ></iframe><br>
                </div>
                @endif
            </div>
        @empty
        <div class="row text-center">
            <div class="col-12">
                <h4 for=""><u>No Documents of Final Statement</u></h4>
            </div>
        </div>
        @endforelse
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
