@extends('admin.layouts.admin_layouts')
@section('title', 'Tax Mail - Tax Audit')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="content-header row pt-3">
                        <div class="content-header-left col-md-6 col-12">
                            <h4 class="card-title">Update Tax Audit Data </h4>
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
                <form method="POST" id="userform" action="{{url('admin/update-documents/tax-audit-data/'.$taxauditdata['id'])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Pan No.</label>
                            <input type="text" class="form-control"  value="{{$taxauditdata['pan_card']}}" name="pan_card"  placeholder="Enter Pan No.">
                            @error('pan_card')
                            <label id="pan_card-error" class="error" for="pan_card">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label">Acknowledgment No.</label>
                            <input type="number" class="form-control" value="{{$taxauditdata['acknowledgment_no']}}" name="acknowledgment_no">
                            @error('acknowledgment_no')
                                <label id="acknowledgment_no-error" class="error" for="acknowledgment_no">{{ $message }}</label>
                            @enderror

                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Filing Date</label>
                            <input type="date" class="form-control" name="filing_date" value="{{$taxauditdata['filing_date']}}"  placeholder="Enter Filing Date">
                            @error('filing_date')
                            <label id="filing_date-error" class="error" for="filing_date">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Assessment Year</label>
                            <input type="text" class="form-control" style="text-transform: capitalize" name="assessment_year" value="{{$taxauditdata['assessment_year']}}"  placeholder="Enter Assessment Year">
                            @error('assessment_year')
                                <label id="assessment_year-error" class="error" for="assessment_year">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Filing Type</label>
                            <select class="form-control" name="filing_type" id="filing_type">
                                <option selected style="display:none;">Select Filing Type</option>
                                <option @if ($taxauditdata['filing_type']=='Original')
                                    selected
                                @endif value="Original">Original</option>
                                <option @if ($taxauditdata['filing_type']=='Revised')
                                    selected
                                @endif value="Revised">Revised</option>
                            </select>
                            @error('filing_type')
                                <label id="filing_type-error" class="error" for="filing_type">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Status</label>
                            <select class="form-control" name="status" >
                            <option selected style="display:none;">Select Status</option>
                                <option @if ($taxauditdata['status']=='Form verified')
                                    selected
                                @endif value="Form verified">Form verified</option>
                            </select>
                            @error('status')
                                <label id="form_no-error" class="error" for="form_no">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Filed By</label>
                            <select class="form-control" name="filed_by" id="filed_by">
                                <option selected style="display:none;">Select Status</option>
                                    <option @if ($taxauditdata['filed_by']=='SELF')
                                        selected
                                    @endif value="SELF">SELF</option>
                                    <option @if ($taxauditdata['filed_by']=='REP')
                                        selected
                                    @endif value="REP">REP</option>
                                </select>
                            @error('filed_by')
                                <label id="filed_by-error" class="error" for="filed_by">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Type</label>
                            <select class="form-control" name="type" id="type">
                                <option selected disabled>Select Type</option>
                                <option value="Achnowledgement">Achnowledgement</option>
                                <option value="Form">Form</option>
                                <option value="Final Statement">Final Statement</option>
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
                        @isset($taxauditdocuments)
                        <label class="form-label"><strong>Uploded Documents </strong></label><br>
                        <label class="form-label">Achnowledgement Documents</label>
                        @foreach ($taxauditdocuments as $item)
                        @if ($item['type']=='Achnowledgement')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/tax-audit-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TaxAudit/'.$item['documents'])}}" ></iframe><br>
                        </div>
                        @endif
                        @endforeach
                        <label class="form-label">Form Documents</label>
                        @foreach ($taxauditdocuments as $item)
                        @if ($item['type']=='Form')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/tax-audit-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TaxAudit/'.$item['documents'])}}" ></iframe><br>
                        </div>
                        @endif
                        @endforeach
                        <label class="form-label">Final Statement Documents</label>
                        @foreach ($taxauditdocuments as $item)
                        @if ($item['type']=='Final Statement')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/tax-audit-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/TaxAudit/'.$item['documents'])}}" ></iframe><br>
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
