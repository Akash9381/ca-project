@extends('admin.layouts.admin_layouts')
@section('title', 'Tax Mail - Edit TDS')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="content-header row pt-3">
                        <div class="content-header-left col-md-6 col-12">
                            <h4 class="card-title">Edit TDS Data </h4>
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
                <form method="POST" id="userform" action="{{url('admin/update-documents/tds-data/'.$tdsdata['id'])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Token No.</label>
                            <input type="number" class="form-control"  value="{{$tdsdata['token_number']}}" name="token_number"  placeholder="Enter Token No.">
                            @error('token_number')
                            <label id="token_number-error" class="error" for="token_number">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label">Receipt Date</label>
                            <input type="date" class="form-control" value="{{$tdsdata['receipt_date']}}" name="receipt_date">
                            @error('receipt_date')
                                <label id="receipt_date-error" class="error" for="receipt_date">{{ $message }}</label>
                            @enderror

                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">BarCode Value</label>
                            <input type="text" class="form-control" name="barcode_value" value="{{$tdsdata['barcode_value']}}"  placeholder="Enter Financial Year">
                            @error('barcode_value')
                            <label id="barcode_value-error" class="error" for="barcode_value">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Deductor/Collector Name</label>
                            <input type="text" class="form-control" style="text-transform: capitalize" name="deductor_collector_name" value="{{$tdsdata['deductor_collector_name']}}"  placeholder="Enter Deductor/Collector Name">

                            @error('deductor_collector_name')
                                <label id="deductor_collector_name-error" class="error" for="deductor_collector_name">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Financial Year</label>
                            <input type="text" class="form-control" value="{{$tdsdata['financial_year']}}" name="financial_year">
                            @error('financial_year')
                                <label id="financial_year-error" class="error" for="financial_year">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Quarter</label>
                            <select class="form-control" name="quarter" id="quarter">
                                <option selected style="display:none;">Select Quarter</option>
                                <option @if ($tdsdata['quarter']=='Q1')
                                    selected
                                @endif value="Q1">Q1</option>
                                <option @if ($tdsdata['quarter']=='Q2')
                                selected
                            @endif value="Q2">Q2</option>
                                <option @if ($tdsdata['quarter']=='Q3')
                                selected
                            @endif value="Q3">Q3</option>
                                <option @if ($tdsdata['quarter']=='Q4')
                                selected
                            @endif value="Q4">Q4</option>
                            </select>
                            @error('quarter')
                                <label id="quarter-error" class="error" for="quarter">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Form No.</label>
                            <input class="form-control" id="form_no" name="form_no" value="{{$tdsdata['form_no']}}" type="text" >
                            @error('form_no')
                                <label id="form_no-error" class="error" for="form_no">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">TAN</label>
                            <input class="form-control" id="tan" name="tan" value="{{$tdsdata['tan']}}" type="text" >
                            @error('tan')
                                <label id="tan-error" class="error" for="tan">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Regular/Correction</label>
                            <select class="form-control" name="regular_correction" id="regular_correction">
                                <option selected style="display:none;">Select</option>
                                <option @if ($tdsdata['regular_correction']=='Regular')
                                selected
                                @endif value="Regular">Regular</option>
                                <option @if ($tdsdata['regular_correction']=='Correction')
                                selected
                                @endif value="Correction">Correction</option>
                            </select>
                            @error('regular_correction')
                            <label id="regular_correction-error" class="error" for="regular_correction">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Original Token No.</label>
                            <input class="form-control" id="original_token_no" name="original_token_no" value="{{$tdsdata['original_token_no']}}" type="text" >
                            @error('original_token_no')
                                <label id="original_token_no-error" class="error" for="original_token_no">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Fees Charged</label>
                            <input class="form-control" id="fees_charged" name="fees_charged" value="{{$tdsdata['fees_charged']}}" type="text" >
                            @error('fees_charged')
                                <label id="fees_charged-error" class="error" for="fees_charged">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Type</label>
                            <select class="form-control" name="type" id="type">
                                <option selected disabled>Select Type</option>
                                <option value="Achnowledgement">Achnowledgement</option>
                                <option value="Form">Form</option>
                                <option value="Challan">Challan</option>
                                <option value="Challan Status Enquiry">Challan Status Enquiry</option>
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
                        @isset($tdsdatadocuments)
                        <label class="form-label"><strong>Uploded Documents </strong></label><br>
                        <label class="form-label">Achnowledgement Documents</label>
                        @foreach ($tdsdatadocuments as $item)
                        @if ($item['type']=='Achnowledgement')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/tds-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TDS/'.$item['documents'])}}" ></iframe><br>
                        </div>
                        @endif
                        @endforeach
                        <label class="form-label">Form Documents</label>
                        @foreach ($tdsdatadocuments as $item)
                        @if ($item['type']=='Form')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/tds-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TDS/'.$item['documents'])}}" ></iframe><br>
                        </div>
                        @endif
                        @endforeach
                        <label class="form-label">Challan Documents</label>
                        @foreach ($tdsdatadocuments as $item)
                        @if ($item['type']=='Challan')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/tds-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TDS/'.$item['documents'])}}" ></iframe><br>
                        </div>
                        @endif
                        @endforeach
                        <label class="form-label">Challan Status Enquiry Documents</label>
                        @foreach ($tdsdatadocuments as $item)
                        @if ($item['type']=='Challan Status Enquiry')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/tds-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TDS/'.$item['documents'])}}" ></iframe><br>
                        </div>
                        @endif
                        @endforeach
                        @endisset
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
