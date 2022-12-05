    @extends('admin.layouts.admin_layouts')
    @section('title', 'Dashboard - Tax Mail')
    @section('content')
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="content-header row pt-3">
                            <div class="content-header-left col-md-6 col-12">
                                <h4 class="card-title">Update User</h4>
                            </div>
                            <div class="content-header-right col-md-6 col-12">
                                <div class="btn-group" style="float: right!important;" role="group"
                                    aria-label="Button group with nested dropdown">
                                    <div class="btn-group mb-1" role="group">
                                        <a href="{{url('/admin/users')}}"
                                            class="btn btn-outline-primary dropdown-menu-right"><i
                                                class="feather uil-arrow-left icon-left"></i> Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{url('admin/update-user/'.$user['id'])}}" id="userform" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-12 col-md-6">
                                <label  class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$user['name']}}"  placeholder="Enter Name">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label  class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" value="{{$user['email']}}"  placeholder="Enter email">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label  class="form-label">Mobile</label>
                                <input type="number" class="form-control" name="number" value="{{$user['number']}}" placeholder="Enter Mobile Number">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label  class="form-label">PAN No.</label>
                                <input type="text" class="form-control" name="pan_card" value="{{$user['pan_card']}}" placeholder="Enter PAN No.">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label  class="form-label">City</label>
                                <input type="text" class="form-control" name="city" value="{{$user['city']}}"   placeholder="Enter City">
                            </div>
                            <div class="mb-3 col-12 col-md-6 excel">
                                <label class="form-label">Tax Type</label>
                                <select class="form-control" name="tax_type" id="tax_type">
                                    <option selected disabled>Select Tax Type</option>
                                    <option value="income_tax">Income Tax</option>
                                    <option value="gst">GST</option>
                                    <option value="tds">TDS</option>
                                    <option value="tax_audit">Tax Audit</option>
                                </select>
                            </div>
                            <div class="mb-3 col-12 col-md-6 excel" style="display: none">
                                <label class="form-label">Excel File Upload Here</label>
                                <input class="form-control" type="file" accept=".xlsx" name="file" >
                                @error('file')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    <hr>
                    @if ($income_tax_data->count()>0)
                    <div class="row">
                        <div class="content-header row pt-3">
                            <div class="content-header-left col-md-6 col-12">
                                <h4 class="card-title">Showing {{ $income_tax_data->count() }} of {{ $income_tax_data->total() }} User Income Tax Data </h4>
                            </div>
                            <div class="content-header-right col-md-6 col-12">
                                {{-- <div class="btn-group" style="float: right!important;" role="group"
                                    aria-label="Button group with nested dropdown">
                                    <div class="btn-group mb-1" role="group">
                                        <a href="{{url('/admin/upload-documents')}}"
                                            class="btn btn-outline-primary dropdown-menu-right"><i
                                                class="feather uil-plus icon-left"></i> Add Data</a>
                                    </div>
                                </div> --}}
                                {{-- <form action="{{ url()->current() }}" class=" col-md-12 float-right p-0">
                                    <div class="input-group">
                                        <input type="search" class="form-control" name="search"
                                            value="{{ request('search') }}" placeholder="Search by first name,email,role">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="uil-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                        <div class="col-12">
                            <table class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Assessment Year</th>
                                        <th>Filing Type</th>
                                        <th>ITR</th>
                                        <th>Acknowledgment No.</th>
                                        <th>Filing Date</th>
                                        <th>Total Income</th>
                                        <th>Action</th>
                                        {{-- <th>Document</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($income_tax_data as $data)
                                    <tr>
                                        <td>
                                            {{$data['assessment_year']}}
                                        </td>
                                        <td>{{$data['filing_type']}}</td>
                                        <td>{{$data['itr']}}</td>
                                        <td>{{$data['acknowledgment_no']}}</td>
                                        <td>{{$data['filing_date']}}</td>
                                        <td>{{$data['total_income']}}</td>
                                        <td class="table-action">
                                            <a href="{{url('/admin/upload-documents/income-tax/'.$data['id'])}}" class="action-icon"><i
                                                class="mdi mdi-pencil"></i></a>
                                                <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/delete-income-tax/'.$data['id'])}}" class="action-icon"> <i
                                                    class="mdi mdi-delete"></i></a>
                                        </td>
                                        {{-- <td><label for="image_upload"><i class="uil-cloud-upload" style="font-size: 35px" ></i></label><input type="file" id="image_upload" hidden ></td>
                                        <td><a href="javascript: void(0);" class="action-icon"> <i
                                            class="mdi mdi-pencil"></i></a></td> --}}
                                    </tr>
                                    @empty
                                    <tr class="text-center">
                                        <th colspan="5">
                                            No records found
                                        </th>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            {{$income_tax_data->links()}}
                        </div>
                    </div>
                    @endif
                    @if ($gst_data->count()>0)
                    <hr>
                    <div class="row">
                        <div class="content-header row pt-3">
                            <div class="content-header-left col-md-6 col-12">
                                <h4 class="card-title">Showing {{ $gst_data->count() }} of {{ $gst_data->total() }} User GST Data </h4>
                            </div>
                            <div class="content-header-right col-md-6 col-12">
                                {{-- <div class="btn-group" style="float: right!important;" role="group"
                                    aria-label="Button group with nested dropdown">
                                    <div class="btn-group mb-1" role="group">
                                        <a href="{{url('/admin/upload-documents')}}"
                                            class="btn btn-outline-primary dropdown-menu-right"><i
                                                class="feather uil-plus icon-left"></i> Add Data</a>
                                    </div>
                                </div> --}}
                                {{-- <form action="{{ url()->current() }}" class=" col-md-12 float-right p-0">
                                    <div class="input-group">
                                        <input type="search" class="form-control" name="search"
                                            value="{{ request('search') }}" placeholder="Search by first name,email,role">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="uil-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form> --}}
                            </div>
                        </div>

                        <div class="col-12">
                            <table class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>ARN</th>
                                        <th>Return Type</th>
                                        <th>Financial Year</th>
                                        <th>Tax Period</th>
                                        <th>Filing Date</th>
                                        <th>Status</th>
                                        <th>Mode of Filing</th>
                                        <th>Action</th>
                                        {{-- <th>Document</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($gst_data as $data)
                                    <tr>
                                        <td>{{$data['arn']}}</td>
                                        <td>{{$data['return_type']}}</td>
                                        <td>{{$data['financial_year']}}</td>
                                        <td>{{$data['tax_period']}}</td>
                                        <td>{{$data['filing_date']}}</td>
                                        <td>{{$data['status']}}</td>
                                        <td>{{$data['mode_of_filing']}}</td>
                                        <td class="table-action">
                                            <a href="{{url('/admin/upload-documents/gst-data/'.$data['id'])}}" class="action-icon"><i
                                                class="mdi mdi-pencil"></i></a>
                                                <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/delete-gst/'.$data['id'])}}" class="action-icon"> <i
                                                    class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="text-center">
                                        <th colspan="5">
                                            No records found
                                        </th>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            {{$gst_data->links()}}
                        </div>
                    </div>
                    @endif
                    @if ($tax_audit->count()>0)
                    <hr>
                    <div class="row">
                        <div class="content-header row pt-3">
                            <div class="content-header-left col-md-6 col-12">
                                <h4 class="card-title">Showing {{ $tax_audit->count() }} of {{ $tax_audit->total() }} User Tax Audit Data </h4>
                            </div>
                            <div class="content-header-right col-md-6 col-12">
                                {{-- <div class="btn-group" style="float: right!important;" role="group"
                                    aria-label="Button group with nested dropdown">
                                    <div class="btn-group mb-1" role="group">
                                        <a href="{{url('/admin/upload-documents')}}"
                                            class="btn btn-outline-primary dropdown-menu-right"><i
                                                class="feather uil-plus icon-left"></i> Add Data</a>
                                    </div>
                                </div> --}}
                                {{-- <form action="{{ url()->current() }}" class=" col-md-12 float-right p-0">
                                    <div class="input-group">
                                        <input type="search" class="form-control" name="search"
                                            value="{{ request('search') }}" placeholder="Search by first name,email,role">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="uil-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form> --}}
                            </div>
                        </div>

                        <div class="col-12">
                            <table class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>PAN Card</th>
                                        <th>Acknowledgment No.</th>
                                        <th>Assessment Year</th>
                                        <th>Filing Date</th>
                                        <th>Filing By</th>
                                        <th>Filing Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        {{-- <th>Document</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tax_audit as $data)
                                    <tr>
                                        <td>{{$data['pan_card']}}</td>
                                        <td>{{$data['acknowledgment_no']}}</td>
                                        <td>{{$data['assessment_year']}}</td>
                                        <td>{{$data['filing_date']}}</td>
                                        <td>{{$data['filed_by']}}</td>
                                        <td>{{$data['filing_type']}}</td>
                                        <td>{{$data['status']}}</td>
                                        <td class="table-action">
                                            <a href="{{url('/admin/upload-documents/tax-audit-data/'.$data['id'])}}" class="action-icon"><i
                                                class="mdi mdi-pencil"></i></a>
                                                <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/delete-tax-audit/'.$data['id'])}}" class="action-icon"> <i
                                                    class="mdi mdi-delete"></i></a>
                                        </td>
                                        {{-- <td><label for="image_upload"><i class="uil-cloud-upload" style="font-size: 35px" ></i></label><input type="file" id="image_upload" hidden ></td>
                                        <td><a href="javascript: void(0);" class="action-icon"> <i
                                            class="mdi mdi-pencil"></i></a></td> --}}
                                    </tr>
                                    @empty
                                    <tr class="text-center">
                                        <th colspan="8">
                                            No records found
                                        </th>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            {{$gst_data->links()}}
                        </div>
                    </div>
                    @endif
                    @if ($tds_data->count()>0)
                    <hr>
                    <div class="row">
                        <div class="content-header row pt-3">
                            <div class="content-header-left col-md-6 col-12">
                                <h4 class="card-title">Showing {{ $tds_data->count() }} of {{ $tds_data->total() }} User TDS Data </h4>
                            </div>
                            <div class="content-header-right col-md-6 col-12">
                                {{-- <div class="btn-group" style="float: right!important;" role="group"
                                    aria-label="Button group with nested dropdown">
                                    <div class="btn-group mb-1" role="group">
                                        <a href="{{url('/admin/upload-documents')}}"
                                            class="btn btn-outline-primary dropdown-menu-right"><i
                                                class="feather uil-plus icon-left"></i> Add Data</a>
                                    </div>
                                </div> --}}
                                {{-- <form action="{{ url()->current() }}" class=" col-md-12 float-right p-0">
                                    <div class="input-group">
                                        <input type="search" class="form-control" name="search"
                                            value="{{ request('search') }}" placeholder="Search by first name,email,role">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="uil-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form> --}}
                            </div>
                        </div>

                        <div class="col-12">
                            <table class="table table-striped table-centered mb-0">
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
                                        <th>Action</th>
                                        {{-- <th>Document</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tds_data as $data)
                                    <tr>
                                        <td>{{$data['token_number']}}</td>
                                        <td>{{$data['receipt_date']}}</td>
                                        <td>{{$data['barcode_value']}}</td>
                                        <td>{{$data['deductor_collector_name']}}</td>
                                        <td>{{$data['financial_year']}}</td>
                                        <td>{{$data['quarter']}}</td>
                                        <td>{{$data['form_no']}}</td>
                                        <td>{{$data['tan']}}</td>
                                        <td>{{$data['regular_correction']}}</td>
                                        <td>{{$data['original_token_no']}}</td>
                                        <td>{{$data['fees_charged']}}</td>
                                        <td class="table-action">
                                            <a href="{{url('/admin/upload-documents/tds-data/'.$data['id'])}}" class="action-icon"><i
                                                class="mdi mdi-pencil"></i></a>
                                                <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/delete-tds-data/'.$data['id'])}}" class="action-icon"> <i
                                                    class="mdi mdi-delete"></i></a>
                                        </td>
                                        {{-- <td><label for="image_upload"><i class="uil-cloud-upload" style="font-size: 35px" ></i></label><input type="file" id="image_upload" hidden ></td>
                                        <td><a href="javascript: void(0);" class="action-icon"> <i
                                            class="mdi mdi-pencil"></i></a></td> --}}
                                    </tr>
                                    @empty
                                    <tr class="text-center">
                                        <th colspan="5">
                                            No records found
                                        </th>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            {{$tds_data->links()}}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    @endsection
    @section('js')
    <script type="text/javascript">
        $("#tax_type").on('change', function(){
            $('.excel').show();
        });
        // $("#userform").submit(function(){
        //     if($("#tax_type").val()==null){
        //         alert("null");
        //     }else{
        //         alert("value");
        //     }
        // })
    </script>
    @endsection
