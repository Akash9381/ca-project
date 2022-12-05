@extends('frontend.dashboard_layouts.dashboard_layouts')

@section('content')
    <div class="main-panel" id="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
            <div class="row text-light">
                <div class="col-12">
                    Acknowledgment No.: <b>{{ $incometaxdata['acknowledgment_no'] }}</b>
                </div>
                <div class="col-12 mt-1">
                    Assessment Year: <b>{{ $incometaxdata['assessment_year'] }}</b>
                </div>
                <div class="col-12 mt-1">
                    Filing Date: <b>{{ $incometaxdata['filing_date'] }}</b>
                </div>
                <div class="col-12 mt-1">
                    ITR: <b>{{ $incometaxdata['itr'] }}</b>
                </div>
                <div class="col-12 mt-1">
                    Filing Type: <b>{{ $incometaxdata['filing_type'] }}</b>
                </div>
                <div class="col-12 mt-1">
                    Total Income: <b>{{ $incometaxdata['total_income'] }}</b>
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

        @isset($incometaxdocuments)
        <div class="row mt-5">
            <div class="col-12">
                <h3 for=""><u>ITR Achnowledgement</u></h3>
            </div>
        </div>
        @foreach ($incometaxdocuments as $item)
            <div class="row"  >
                @if ($item['type']=='ITR Achnowledgement')
                <div class="mb-3 col-md-6 col-12">
                    <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TDS/'.$item['documents'])}}" ></iframe><br>
                </div>
                @endif
            </div>
        @endforeach
        <hr>
        <div class="row">
            <div class="col-12">
                <h3 for=""><u>Computation</u></h3>
            </div>
        </div>
        @foreach ($incometaxdocuments as $item)
            <div class="row"  >
                @if ($item['type']=='Computation')
                <div class="mb-3 col-md-6 col-12">
                    <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TDS/'.$item['documents'])}}" ></iframe><br>
                </div>
                @endif
            </div>
        @endforeach
        <hr>
        <div class="row">
            <div class="col-12">
                <h3 for=""><u>ITR Form</u></h3>
            </div>
        </div>
        @foreach ($incometaxdocuments as $item)
            <div class="row"  >
                @if ($item['type']=='ITR Form')
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
        @foreach ($incometaxdocuments as $item)
            <div class="row"  >
                @if ($item['type']=='Challan')
                <div class="mb-3 col-md-6 col-12 ">
                    <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TDS/'.$item['documents'])}}" ></iframe><br>
                </div>
                @endif
            </div>
        @endforeach
        <hr>
        <div class="row">
            <div class="col-12">
                <h3 for=""><u>Form 26AS</u></h3>
            </div>
        </div>
        @foreach ($incometaxdocuments as $item)
            <div class="row"  >
                @if ($item['type']=='Form 26AS')
                <div class="mb-3 col-md-6 col-12 ">
                    <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TDS/'.$item['documents'])}}" ></iframe><br>
                </div>
                @endif
            </div>
        @endforeach
        <hr>
        <div class="row">
            <div class="col-12">
                <h3 for=""><u>AIS/TIS</u></h3>
            </div>
        </div>
        @foreach ($incometaxdocuments as $item)
            <div class="row"  >
                @if ($item['type']=='AIS/TIS')
                <div class="mb-3 col-md-6 col-12 ">
                    <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TDS/'.$item['documents'])}}" ></iframe><br>
                </div>
                @endif
            </div>
        @endforeach
        <hr>
        <div class="row">
            <div class="col-12">
                <h3 for=""><u>MISC Documents</u></h3>
            </div>
        </div>
        @foreach ($incometaxdocuments as $item)
            <div class="row"  >
                @if ($item['type']=='MISC Documents')
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

@endsection
@section('js')
    <script>
        $('.achnowledgement').click(function(){
            $("#Achnowledgement").show();
            $("#Form").hide();
            $("#Challan").hide();
            $(".achnowledgement").css('color','#fff');
            $(".achnowledgement").css('background','green');
            $(".form").css('color','black');
            $(".form").css('background','#fff');
            $(".challan").css('color','black');
            $(".challan").css('background','#fff');
        });
        $('.form').click(function(){
            $("#Achnowledgement").hide();
            $("#Form").show();
            $("#Challan").hide();
            $(".achnowledgement").css('color','black');
            $(".achnowledgement").css('background','#fff');
            $(".form").css('color','#fff');
            $(".form").css('background','green');
            $(".challan").css('color','black');
            $(".challan").css('background','#fff');
        });
        $('.challan').click(function(){
            $("#Achnowledgement").hide();
            $("#Form").hide();
            $("#Challan").show();
            $(".achnowledgement").css('color','black');
            $(".achnowledgement").css('background','#fff');
            $(".form").css('color','black');
            $(".form").css('background','#fff');
            $(".challan").css('color','#fff');
            $(".challan").css('background','green');
        });
    </script>
@endsection
