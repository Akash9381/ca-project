@extends('admin.layouts.admin_layouts')
@section('title', 'Tax Mail - Income Tax')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="content-header row pt-3">
                        <div class="content-header-left col-md-6 col-12">
                            <h4 class="card-title">Update Income Tax Data </h4>
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
                <form method="POST" id="userform" action="{{url('admin/update-documents/income-tax-data/'.$incometaxdata['id'])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Assessment Year</label>
                            <input type="text" class="form-control" value="{{$incometaxdata['assessment_year']}}" name="assessment_year"  placeholder="Enter Assessment Year">
                            @error('assessment_year')
                                <label id="assessment_year-error" class="error" for="assessment_year">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label">Filing Type</label>
                            <select class="form-control" name="filing_type" id="filing_type">
                                <option selected disabled style="display:none;">Select Filing Type</option>
                                <option @if ($incometaxdata['filing_type']=='Original')
                                    selected
                                @endif value="Original">Original</option>
                                <option value="" disabled>Other</option>
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">ITR</label>
                            <select class="form-control" name="itr" id="itr">
                                <option selected disabled>Select ITR</option>
                                <option @if ($incometaxdata['itr']=='ITR-1')
                                selected
                            @endif value="ITR-1" >ITR-1</option>
                                <option  @if ($incometaxdata['itr']=='ITR-2')
                                selected
                            @endif value="ITR-2" >ITR-2</option>
                                <option @if ($incometaxdata['itr']=='ITR-3')
                                selected
                            @endif value="ITR-3" >ITR-3</option>
                                <option @if ($incometaxdata['itr']=='ITR-4')
                                selected
                            @endif value="ITR-4" >ITR-4</option>
                                <option @if ($incometaxdata['itr']=='ITR-5')
                                selected
                            @endif value="ITR-5" >ITR-5</option>
                                <option @if ($incometaxdata['itr']=='ITR-6')
                                selected
                            @endif value="ITR-6" >ITR-6</option>
                                <option @if ($incometaxdata['itr']=='ITR-7')
                                selected
                            @endif value="ITR-7" >ITR-7</option>
                            </select>
                            @error('itr')
                                <label id="email-error" class="error" for="email">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Acknowledgment No.</label>
                            <input type="text" class="form-control" value="{{$incometaxdata['acknowledgment_no']}}" name="acknowledgment_no">
                            @error('acknowledgment_no')
                                <label id="acknowledgment_no-error" class="error" for="acknowledgment_no">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Filing Date</label>
                            <input type="date" class="form-control" value="{{$incometaxdata['filing_date']}}" name="filing_date">
                            @error('filing_date')
                                <label id="filing_date-error" class="error" for="filing_date">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Total Income</label>
                            <input type="number" class="form-control" value="{{$incometaxdata['total_income']}}" name="total_income">
                            @error('mode_of_filing')
                                <label id="total_income-error" class="error" for="total_income">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Type</label>
                            <select class="form-control" name="type" id="type">
                                <option selected disabled>Select Type</option>
                                <option value="ITR Achnowledgement">ITR Achnowledgement</option>
                                <option value="Computation">Computation</option>
                                <option value="ITR Form">ITR Form</option>
                                <option value="Challan">Challan</option>
                                <option value="Form 26AS">Form 26AS</option>
                                <option value="AIS/TIS">AIS/TIS</option>
                                <option value="MISC Documents">MISC Documents</option>
                            </select>
                            @error('type')
                                <label id="type-error" class="error" for="type">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6" >
                            <label class="form-label">Upload Documents</label>
                            <input class="form-control" id="documents" accept=".png, .jpg, .jpeg, .pdf, .docx, .doc" name="documents[]" multiple type="file" >
                        </div>
                    </div>
                    <div class="row">
                        @isset($incometaxdocuments)
                        <label class="form-label"><strong>Uploded Documents </strong></label><br>
                        <label class="form-label">ITR Achnowledgement Documents</label>
                        @foreach ($incometaxdocuments as $item)
                        @if ($item['type']=='ITR Achnowledgement')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/income-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/IncomeTax/'.$item['documents'])}}" ></iframe><br>
                        </div>
                        @endif
                        @endforeach
                        <label class="form-label">Computation Documents</label>
                        @foreach ($incometaxdocuments as $item)
                        @if ($item['type']=='Computation')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/income-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/IncomeTax/'.$item['documents'])}}" ></iframe><br>
                        </div>
                        @endif
                        @endforeach
                        <label class="form-label">Challan Documents</label>
                        @foreach ($incometaxdocuments as $item)
                        @if ($item['type']=='Challan')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/income-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/IncomeTax/'.$item['documents'])}}" ></iframe><br>
                        </div>
                        @endif
                        @endforeach
                        <label class="form-label">ITR Form Documents</label>
                        @foreach ($incometaxdocuments as $item)
                        @if ($item['type']=='ITR Form')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/income-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/IncomeTax/'.$item['documents'])}}" ></iframe><br>
                        </div>
                        @endif
                        @endforeach
                        <label class="form-label">Form 26AS Documents</label>
                        @foreach ($incometaxdocuments as $item)
                        @if ($item['type']=='Form 26AS')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/income-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/IncomeTax/'.$item['documents'])}}" ></iframe><br>
                        </div>
                        @endif
                        @endforeach
                        <label class="form-label">AIS/TIS Documents</label>
                        @foreach ($incometaxdocuments as $item)
                        @if ($item['type']=='AIS/TIS')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/income-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/IncomeTax/'.$item['documents'])}}" ></iframe><br>
                        </div>
                        @endif
                        @endforeach
                        <label class="form-label">MISC Documents</label>
                        @foreach ($incometaxdocuments as $item)
                        @if ($item['type']=='MISC Documents')
                        <div class="mb-3 col-md-6 col-12 text-center">
                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/income-document-delete/'.$item['id'])}}"><i class="mdi mdi-delete"></i></a><br>
                            <iframe width="50%" class="mb-3" height="300" src="{{asset('Library/IncomeTax/'.$item['documents'])}}" ></iframe><br>
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
