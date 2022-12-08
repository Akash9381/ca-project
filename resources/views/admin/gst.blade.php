@extends('admin.layouts.admin_layouts')
@section('title', 'Tax Mail - Edit GST')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="content-header row pt-3">
                        <div class="content-header-left col-md-6 col-12">
                            <h4 class="card-title">Update GST Data </h4>
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
                <form method="POST" id="userform" action="{{url('admin/update-documents/gst-data/'.$gstdata['id'])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">ARN</label>
                            <input type="text" class="form-control" style="text-transform: capitalize" value="{{$gstdata['arn']}}" name="arn"  placeholder="Enter ARN">
                            @error('arn')
                                <label id="name-error" class="error" for="name">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label">Return Type</label>
                            <select class="form-control" name="return_type" id="return_type">
                                <option selected disabled style="display:none;">Select GST Type</option>
                                <option @if ($gstdata['return_type']=='GSTR3B')
                                    selected
                                @endif value="GSTR3B">GSTR3B</option>
                                <option  @if ($gstdata['return_type']=='GSTR-1/IFF')
                                selected
                            @endif value="GSTR-1/IFF">GSTR-1/IFF</option>
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Financial Year</label>
                            <input type="text" class="form-control" name="financial_year" value="{{$gstdata['financial_year']}}"  placeholder="Enter Financial Year">
                            @error('financial_year')
                                <label id="email-error" class="error" for="email">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Tax Period</label>
                            <select class="form-control" name="tax_period" id="tax_period">
                                <option selected style="display:none;">Months</option>
                                <option @if ($gstdata['tax_period']=='January')
                                selected
                                @endif value="January">January</option>
                                <option @if ($gstdata['tax_period']=='February')
                                selected
                                @endif value="February">February</option>
                                <option @if ($gstdata['tax_period']=='March')
                                selected
                                @endif value="March">March</option>
                                <option @if ($gstdata['tax_period']=='April')
                                selected
                                @endif value="April">April</option>
                                <option @if ($gstdata['tax_period']=='May')
                                selected
                                @endif value="May">May</option>
                                <option @if ($gstdata['tax_period']=='June')
                                selected
                                @endif value="June">June</option>
                                <option @if ($gstdata['tax_period']=='July')
                                selected
                                @endif value="July">July</option>
                                <option @if ($gstdata['tax_period']=='August')
                                selected
                                @endif value="August">August</option>
                                <option @if ($gstdata['tax_period']=='September')
                                selected
                                @endif value="September">September</option>
                                <option @if ($gstdata['tax_period']=='October')
                                selected
                                @endif value="October">October</option>
                                <option @if ($gstdata['tax_period']=='November')
                                selected
                                @endif value="November">November</option>
                                <option @if ($gstdata['tax_period']=='December')
                                selected
                                @endif value="December">December</option>
                            </select>
                            @error('tax_period')
                                <label id="tax_period-error" class="error" for="tax_period">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Filing Date</label>
                            <input type="date" class="form-control" value="{{$gstdata['filing_date']}}" name="filing_date">
                            @error('filing_date')
                                <label id="filing_date-error" class="error" for="filing_date">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Status</label>
                            <select class="form-control" name="status" id="status1">
                                <option selected style="display:none;">Status</option>
                                <option @if ($gstdata['status']=='Filed')
                                    selected
                                @endif value="Filed">Filed</option>
                                <option @if ($gstdata['status']=='Not-Field')
                                selected
                            @endif value="Not-Field">Not-Field</option>
                            </select>
                            @error('status')
                                <label id="status-error" class="error" for="status">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Mode Of Filing</label>
                            <select class="form-control" name="mode_of_filing" id="mode_of_filing">
                                <option selected disabled>Mode Of Filing</option>
                                <option @if ($gstdata['mode_of_filing']=='ONLINE')
                                selected
                            @endif value="ONLINE">ONLINE</option>
                                <option @if ($gstdata['mode_of_filing']=='OFFLINE')
                                selected
                            @endif value="OFFLINE">OFFLINE</option>
                            </select>
                            @error('mode_of_filing')
                                <label id="mode_of_filing-error" class="error" for="mode_of_filing">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Type</label>
                            <select class="form-control" name="type" id="type">
                                <option selected disabled>Select Type</option>
                                <option value="Achnowledgement" >Achnowledgement</option>
                                <option value="Form" >Form</option>
                                <option value="Challan">Challan</option>
                            </select>
                            @error('type')
                                <label id="type-error" class="error" for="type">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label">Upload Documents</label>
                            <input class="form-control" id="documents" accept=".png, .jpg, .jpeg, .pdf, .docx, .doc" name="documents[]" multiple type="file" >
                        </div>
                    </div>
                    <div class="row">
                        @isset($gstdocuments)
                        <label class="form-label"><strong>Uploded Documents </strong></label><br>
                        <label class="form-label">Achnowledgement Documents</label>
                        @foreach ($gstdocuments as $item)
                        @if ($item['type']=='Achnowledgement')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/gst-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/GST/'.$item['documents'])}}" ></iframe><br>
                        </div>
                        @endif
                        @endforeach
                        <label class="form-label">Form Documents</label>
                        @foreach ($gstdocuments as $item)
                        @if ($item['type']=='Form')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/gst-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/GST/'.$item['documents'])}}" ></iframe><br>
                        </div>
                        @endif
                        @endforeach
                        <label class="form-label">Challan Documents</label>
                        @foreach ($gstdocuments as $item)
                        @if ($item['type']=='Challan')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/gst-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/GST/'.$item['documents'])}}" ></iframe><br>
                        </div>
                        @endif
                        @endforeach
                        @endisset
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
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
