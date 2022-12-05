@extends('frontend.dashboard_layouts.dashboard_layouts')
@section('content')
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="{{route('userdashboard')}}">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
       <h1 class="text-center text-light text-uppercase"> welcome to Tax Mall</h1>
      </div>
      <div class="content">
        <div class="row">
            @if ($incometaxdata->count()>0)
            <div class="col-lg-2" >
                <div class="card card-chart income_tax">
                    <div class="card-header">
                    <h6 class="card-title text-center bear-years">INCOME TAX</h6>
                    </div>
                </div>
            </div>
            @endif
            @if ($gstdata->count()>0)
            <div class="col-lg-2">
                <div class="card card-chart gst">
                    <div class="card-header">
                    <h6 class="card-title text-center" >GST</h6>
                    </div>
                </div>
            </div>
            @endif
            @if ($tdsdata->count()>0)
            <div class="col-lg-2">
                <div class="card card-chart tds">
                  <div class="card-header">
                    <h6 class="card-title text-center">TDS</h6>
                  </div>
                </div>
            </div>
            @endif
            @if ($taxauditdata->count()>0)
            <div class="col-lg-2">
                <div class="card card-chart tax_audit">
                  <div class="card-header">
                    <h6 class="card-title text-center">Tax Audit</h6>
                  </div>
                </div>
            </div>
            @endif
        {{-- <div class="col-lg-2">
            <div class="card card-chart">
                <div class="card-header">
                <h6 class="card-title text-center">ROC</h6>
                </div>
            </div>
        </div> --}}

        {{-- <div class="col-lg-2 col-md-6">
        <div class="card card-chart">
            <div class="card-header">
            <h6 class="card-title  text-center">OTHERS</h6>
            </div>
        </div>
        </div> --}}
    </div>
    <div class="income_tax_table" style="display: none">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Assessment Year</th>
                <th>Filing Type</th>
                <th>ITR</th>
                <th>Acknowledgment No.</th>
                <th>Filing Date</th>
                <th>Total Income</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($incometaxdata as $incometax)
                <tr>
                    <td>{{$incometax['assessment_year']}}</td>
                    <td>{{$incometax['filing_type']}}</td>
                    <td>{{$incometax['itr']}}</td>
                    <td>{{$incometax['acknowledgment_no']}}</td>
                    <td>{{$incometax['filing_date']}}</td>
                    <td>{{$incometax['total_income']}}</td>
                    <td class="text-center"><a href="{{url('/dashboard/income-tax/'.$incometax['id'])}}"><i class="fa-solid fa-eye"></i></a></td>
                </tr>
                @empty
                <tr>
                    <th colspan="6" class="text-center">No Record Found...</th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="gst_table" style="display: none">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ARN</th>
                <th>Return Type</th>
                <th>Financial Year</th>
                <th>Tax Period</th>
                <th>Filing Date</th>
                <th>Status</th>
                <th>Mode of Filing</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($gstdata as $gst)
                <tr>
                    <td>{{$gst['arn']}}</td>
                    <td>{{$gst['return_type']}}</td>
                    <td>{{$gst['financial_year']}}</td>
                    <td>{{$gst['tax_period']}}</td>
                    <td>{{$gst['filing_date']}}</td>
                    <td>{{$gst['status']}}</td>
                    <td>{{$gst['mode_of_filing']}}</td>
                    <td class="text-center"><a href="{{url('/dashboard/gst/'.$gst['id'])}}"><i class="fa-solid fa-eye"></i></a></td>
                </tr>
                @empty
                <tr>
                    <th colspan="7" class="text-center">No Record Found...</th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="tds_table" style="display: none">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Token Number</th>
                <th>Receipt Date</th>
                <th>Bar Code Value</th>
                <th>Deductor/Collector Name</th>
                <th>Financial Year</th>
                <th>Quarter</th>
                <th>Form No.</th>
                <th>TAN</th>
                <th>Regular Correction</th>
                <th>Original Token No.</th>
                <th>Fees Charged</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($tdsdata as $tds)
                <tr>
                    <td>{{$tds['token_number']}}</td>
                    <td>{{$tds['receipt_date']}}</td>
                    <td>{{$tds['barcode_value']}}</td>
                    <td>{{$tds['deductor_collector_name']}}</td>
                    <td>{{$tds['financial_year']}}</td>
                    <td>{{$tds['quarter']}}</td>
                    <td>{{$tds['form_no']}}</td>
                    <td>{{$tds['tan']}}</td>
                    <td>{{$tds['regular_correction']}}</td>
                    <td>{{$tds['original_token_no']}}</td>
                    <td>{{$tds['fees_charged']}}</td>
                    <td class="text-center"><a href="{{url('/dashboard/tds/'.$tds['id'])}}"><i class="fa-solid fa-eye"></i></a></td>
                </tr>
                @empty
                <tr>
                    <th colspan="11" class="text-center">No Record Found...</th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="tax_audit_table" style="display: none">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>PAN No.</th>
                <th>Acknowledgment No.</th>
                <th>Assessment Year</th>
                <th>Filing Date</th>
                <th>Filing By</th>
                <th>Filing Type</th>
                <th>Status</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($taxauditdata as $tax_audit)
                <tr>
                    <td>{{$tax_audit['pan_card']}}</td>
                    <td>{{$tax_audit['acknowledgment_no']}}</td>
                    <td>{{$tax_audit['assessment_year']}}</td>
                    <td>{{$tax_audit['filing_date']}}</td>
                    <td>{{$tax_audit['filed_by']}}</td>
                    <td>{{$tax_audit['filing_type']}}</td>
                    <td>{{$tax_audit['status']}}</td>
                    <td class="text-center"><a href="{{url('/dashboard/tax-audit/'.$tax_audit['id'])}}"><i class="fa-solid fa-eye"></i></a></td>
                </tr>
                @empty
                <tr>
                    <th colspan="11" class="text-center">No Record Found...</th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
<!--carousel -->
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

              <div class="carousel-item active w-100  text-center" data-bs-interval="2000">
          <img src="{{asset('login/img/consultant.jpg')}}" alt="tax mall" width="500" height="200" >
              </div>

              <div class="carousel-item w-100  text-center" data-bs-interval="2000">
                <img src="{{asset('login/img/ITax.jpg')}}" alt="tax mall"  width="500" height="200">
              </div>

              <div class="carousel-item w-100  text-center" data-bs-interval="2000">
                <img src="{{asset('login/img/gst1.jpg')}}" alt="tax mall"  width="500" height="200">
              </div>

              <div class="carousel-item w-100  text-center" data-bs-interval="2000">
                <img src="{{asset('login/img/roc.jpg')}}" alt="tax mall"  width="500" height="200">
              </div>

              <div class="carousel-item w-100 text-center" data-bs-interval="2000">
                <img src="{{asset('login/img/TDS.jpg')}}" alt="tax mall"  width="500" height="200">
              </div>

            </div>
            <!--
            <button class="carousel-control-prev border border-0" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next border border-0" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>-->
          </div>

          <!-- End Example Code -->
       <!--
        <div class="row">
          <div class="col-md-6">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Backend development</h5>
                <h4 class="card-title">Tasks</h4>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" checked>
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                        <td class="text-left">Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox">
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                        <td class="text-left">Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" checked>
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                        <td class="text-left">Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">All Persons List</h5>
                <h4 class="card-title"> Employees Stats</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Country
                      </th>
                      <th>
                        City
                      </th>
                      <th class="text-right">
                        Salary
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Dakota Rice
                        </td>
                        <td>
                          Niger
                        </td>
                        <td>
                          Oud-Turnhout
                        </td>
                        <td class="text-right">
                          $36,738
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Minerva Hooper
                        </td>
                        <td>
                          Curaçao
                        </td>
                        <td>
                          Sinaai-Waas
                        </td>
                        <td class="text-right">
                          $23,789
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Sage Rodriguez
                        </td>
                        <td>
                          Netherlands
                        </td>
                        <td>
                          Baileux
                        </td>
                        <td class="text-right">
                          $56,142
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Doris Greene
                        </td>
                        <td>
                          Malawi
                        </td>
                        <td>
                          Feldkirchen in Kärnten
                        </td>
                        <td class="text-right">
                          $63,542
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Mason Porter
                        </td>
                        <td>
                          Chile
                        </td>
                        <td>
                          Gloucester
                        </td>
                        <td class="text-right">
                          $78,615
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>-->




@endsection

@section('js')
<script>
    $(document).ready(function(){
        $(".income_tax").click(function(){
            $('.income_tax').css("background-color", "green");
            $('.gst').css("background-color", "#fff");
            $('.tds').css("background-color", "#fff");
            $('.income_tax').css("color", "#fff");
            $('.gst').css("color", "black");
            $('.tds').css("color", "black");
            $(".income_tax_table").show();
            $(".gst_table").hide();
            $(".tds_table").hide();
            $('.tax_audit').css("background-color", "#fff");
            $('.tax_audit').css("color", "black");
            $('.tax_audit_table').hide();
        })
        $(".gst").click(function(){
            $('.income_tax').css("background-color", "#fff");
            $('.gst').css("background-color", "green");
            $('.tds').css("background-color", "#fff");
            $('.income_tax').css("color", "black");
            $('.gst').css("color", "#fff");
            $('.tds').css("color", "black");
            $(".income_tax_table").hide();
            $(".gst_table").show();
            $(".tds_table").hide();
            $('.tax_audit').css("background-color", "#fff");
            $('.tax_audit').css("color", "black");
            $('.tax_audit_table').hide();
        })
        $(".tds").click(function(){
            $('.income_tax').css("background-color", "#fff");
            $('.gst').css("background-color", "#fff");
            $('.tds').css("background-color", "green");
            $('.income_tax').css("color", "black");
            $('.gst').css("color", "black");
            $('.tds').css("color", "#fff");
            $(".income_tax_table").hide();
            $(".gst_table").hide();
            $(".tds_table").show();
            $('.tax_audit').css("background-color", "#fff");
            $('.tax_audit').css("color", "black");
            $('.tax_audit_table').hide();
        })
        $('.tax_audit').click(function(){
            $('.tax_audit').css("background-color", "green");
            $('.tax_audit').css("color", "#fff");
            $('.tax_audit_table').show();
            $('.income_tax').css("background-color", "#fff");
            $('.gst').css("background-color", "#fff");
            $('.tds').css("background-color", "#fff");
            $('.income_tax').css("color", "black");
            $('.gst').css("color", "black");
            $('.tds').css("color", "black");
            $(".income_tax_table").hide();
            $(".gst_table").hide();
            $(".tds_table").hide();
        })
    })

</script>
@endsection


