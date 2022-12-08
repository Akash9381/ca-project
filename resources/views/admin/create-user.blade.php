@extends('admin.layouts.admin_layouts')
@section('title', 'Dashboard - Tax Mail')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="content-header row pt-3">
                        <div class="content-header-left col-md-6 col-12">
                            <h4 class="card-title">Create User </h4>
                        </div>
                        <div class="content-header-right col-md-6 col-12">
                            <div class="btn-group" style="float: right!important;" role="group"
                                aria-label="Button group with nested dropdown">
                                <div class="btn-group mb-1" role="group">
                                    <a href="{{url('/admin/users')}}"
                                        class="btn btn-outline-primary dropdown-menu-right"><i
                                            class="feather uil-arrow-left icon-left"></i>Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="POST" id="userform" action="{{route('insertuser')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Name</label>
                            <input type="text" class="form-control" style="text-transform: capitalize" name="name"  placeholder="Enter Name">
                            @error('name')
                                <label id="name-error" class="error" for="name">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email"  placeholder="Enter Email">
                            @error('email')
                                <label id="email-error" class="error" for="email">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Mobile</label>
                            <input type="number" class="form-control" name="number" placeholder="Enter Mobile Number">
                            @error('number')
                                <label id="number-error" class="error" for="number">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">PAN No.</label>
                            <input type="text" class="form-control" name="pan_card" style="text-transform: uppercase"  placeholder="PAN No.">
                            @error('pan_card')
                                <label id="pan_card-error" class="error" for="pan_card">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">City</label>
                            <input type="text" class="form-control" style="text-transform: capitalize" name="city"  placeholder="Enter City">
                            @error('city')
                                <label id="city-error" class="error" for="city">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
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
                            <input class="form-control" id="file" name="file" accept=".xlsx, .xls" type="file" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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
