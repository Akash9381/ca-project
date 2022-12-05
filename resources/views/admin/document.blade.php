@extends('admin.layouts.admin_layouts')
@section('title', 'Dashboard - Tax Mail')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="content-header row pt-3">
                        <div class="content-header-left col-md-6 col-12">
                            <h4 class="card-title">Upload Data</h4>
                        </div>
                    </div>
                </div>
                @if(session()->has('warning'))
                    <div class="alert alert-danger">
                        <h4>{{ session()->get('warning') }}</h4>
                    </div>
                @endif
                <form id="document_form" action="{{ url('/admin/document_create') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label">Select User</label>
                            <select class="myselect form-control" name="user_id">
                                @forelse ($user as $userdata)
                                    <option
                                        @isset($data['user_id'])
                                    @if ($data['user_id'] == $userdata['id'])
                                    selected
                                    @endif
                                @endisset
                                        value="{{ $userdata['id'] }}">{{ $userdata['pan_card'] }}</option>
                                @empty
                                    <option selected>No User</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label">Tax Type</label>
                            <select class="form-control" name="tax_type" id="tax_type">
                                <option selected style="display: none">Select</option>
                                <option value="income_tax">Income Tax</option>
                                <option value="gst">GST</option>
                                <option value="tds">TDS</option>
                                <option value="tax_audit">Tax Audit</option>
                                {{-- <option value="other">Other</option> --}}
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-md-6 arn" style="display: none">
                            <label class="form-label">ARN</label>
                            <input type="text" class="form-control" style="text-transform: capitalize" name="arn"
                                placeholder="Enter ARN">
                            @error('arn')
                                <label id="name-error" class="error" for="name">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 return_type" style="display: none">
                            <label class="form-label">Return Type</label>
                            <select class="form-control" name="return_type" id="return_type">
                                <option selected disabled style="display:none;">Select GST Type</option>
                                <option value="GSTR3B">GSTR3B</option>
                                <option value="GSTR-1/IFF">GSTR-1/IFF</option>
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-md-6 financial_year" style="display: none">
                            <label class="form-label">Financial Year</label>
                            <input type="text" class="form-control" name="financial_year"
                                placeholder="Enter Financial Year">
                            @error('financial_year')
                                <label id="financial_year-error" class="error" for="financial_year">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 tax_period" style="display: none">
                            <label class="form-label">Tax Period</label>
                            <select class="form-control" name="tax_period" id="tax_period">
                                <option selected value="null" style="display:none;">Months</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            @error('tax_period')
                                <label id="tax_period-error" class="error" for="tax_period">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 filing_date" style="display: none">
                            <label class="form-label">Filing Date</label>
                            <input type="date" class="form-control" id="filing_date" name="filing_date">
                            @error('filing_date')
                                <label id="filing_date-error" class="error" for="filing_date">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 status" style="display: none">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status" id="status1">
                                <option selected style="display:none;">Status</option>
                                <option value="Filed">Filed</option>
                                <option value="Not-Field">Not-Field</option>
                            </select>
                            @error('status')
                                <label id="status-error" class="error" for="status">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 mode_of_filing" style="display: none">
                            <label class="form-label">Mode Of Filing</label>
                            <select class="form-control" name="mode_of_filing" id="mode_of_filing">
                                <option selected disabled>Mode Of Filing</option>
                                <option value="ONLINE">ONLINE</option>
                                <option value="OFFLINE">OFFLINE</option>
                            </select>
                            @error('mode_of_filing')
                                <label id="mode_of_filing-error" class="error"
                                    for="mode_of_filing">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 token_number" style="display: none">
                            <label class="form-label">Token No.</label>
                            <input type="number" class="form-control" name="token_number"
                                placeholder="Enter Token No.">
                            @error('token_number')
                                <label id="token_number-error" class="error" for="token_number">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 receipt_date" style="display: none">
                            <label class="form-label">Receipt Date</label>
                            <input type="date" class="form-control" name="receipt_date">
                            @error('receipt_date')
                                <label id="receipt_date-error" class="error" for="receipt_date">{{ $message }}</label>
                            @enderror

                        </div>
                        <div class="mb-3 col-12 col-md-6 barcode_value" style="display: none">
                            <label class="form-label">BarCode Value</label>
                            <input type="text" class="form-control" name="barcode_value"
                                placeholder="Enter Financial Year">
                            @error('barcode_value')
                                <label id="barcode_value-error" class="error"
                                    for="barcode_value">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 deductor_collector_name" style="display: none">
                            <label class="form-label">Deductor/Collector Name</label>
                            <input type="text" class="form-control" style="text-transform: capitalize"
                                name="deductor_collector_name" placeholder="Enter Deductor/Collector Name">

                            @error('deductor_collector_name')
                                <label id="deductor_collector_name-error" class="error"
                                    for="deductor_collector_name">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 quarter" style="display: none">
                            <label class="form-label">Quarter</label>
                            <select class="form-control" name="quarter" id="quarter">
                                <option value="null" selected style="display:none;">Select Quarter</option>
                                <option value="Q1">Q1</option>
                                <option value="Q2">Q2</option>
                                <option value="Q3">Q3</option>
                                <option value="Q4">Q4</option>
                            </select>
                            @error('quarter')
                                <label id="quarter-error" class="error" for="quarter">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 form_no" style="display: none">
                            <label class="form-label">Form No.</label>
                            <input class="form-control" id="form_no" placeholder="Enter Form No." name="form_no"
                                type="text">
                            @error('form_no')
                                <label id="form_no-error" class="error" for="form_no">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 tan" style="display: none">
                            <label class="form-label">TAN</label>
                            <input class="form-control" id="tan" placeholder="Enter TAN" name="tan"
                                type="text">
                            @error('tan')
                                <label id="tan-error" class="error" for="tan">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 regular_correction" style="display: none">
                            <label class="form-label">Regular/Correction</label>
                            <select class="form-control" name="regular_correction" id="regular_correction">
                                <option value="null" selected style="display:none;">Select</option>
                                <option value="Regular">Regular</option>
                                <option value="Correction">Correction</option>
                            </select>
                            @error('regular_correction')
                                <label id="regular_correction-error" class="error"
                                    for="regular_correction">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 original_token_no" style="display: none">
                            <label class="form-label">Original Token No.</label>
                            <input class="form-control" placeholder="Enter Original Token No." id="original_token_no"
                                name="original_token_no" type="text">
                            @error('original_token_no')
                                <label id="original_token_no-error" class="error"
                                    for="original_token_no">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 fees_charged" style="display: none">
                            <label class="form-label">Fees Charged</label>
                            <input class="form-control" id="fees_charged" name="fees_charged" placeholder="Fees Charged"
                                type="text">
                            @error('fees_charged')
                                <label id="fees_charged-error" class="error" for="fees_charged">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 assessment_year" style="display: none">
                            <label class="form-label">Assessment Year</label>
                            <input type="text" class="form-control" name="assessment_year"
                                placeholder="Enter Assessment Year">
                            @error('assessment_year')
                                <label id="assessment_year-error" class="error"
                                    for="assessment_year">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 filing_type" style="display: none">
                            <label class="form-label">Filing Type</label>
                            <select class="form-control" name="filing_type" id="filing_type">
                                <option value="null" selected disabled style="display:none;">Select Filing Type</option>
                                <option value="Original">Original</option>
                                <option value="" disabled>Other</option>
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-md-6 itr" style="display: none">
                            <label class="form-label">ITR</label>
                            <input style="text-transform: capitalize" type="text" class="form-control" name="itr"
                                placeholder="Enter ITR">
                            @error('itr')
                                <label id="itr-error" class="error" for="itr">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 acknowledgment_no" style="display: none">
                            <label class="form-label">Acknowledgment No.</label>
                            <input type="number" class="form-control" name="acknowledgment_no">
                            @error('acknowledgment_no')
                                <label id="acknowledgment_no-error" class="error"
                                    for="acknowledgment_no">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 filed_by" style="display: none">
                            <label class="form-label">Field By</label>
                            <input type="text" class="form-control" name="filed_by">
                            @error('filed_by')
                                <label id="filed_by-error" class="error"
                                    for="filed_by">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 total_income" style="display: none">
                            <label class="form-label">Total Income</label>
                            <input type="number" class="form-control" name="total_income">
                            @error('mode_of_filing')
                                <label id="total_income-error" class="error" for="total_income">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6 income_type" style="display: none">
                            <label class="form-label">Income Tax Type</label>
                            <select class="form-control" name="income_type" id="income_type">
                                <option selected disabled>Select Type</option>
                                <option value="ITR Achnowledgement">ITR Achnowledgement</option>
                                <option value="Computation">Computation</option>
                                <option value="ITR Form">ITR Form</option>
                                <option value="Challan">Challan</option>
                                <option value="Form 26AS">Form 26AS</option>
                                <option value="AIS/TIS">AIS/TIS</option>
                                <option value="MISC Documents">MISC Documents</option>
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-md-6 gst_type" style="display: none">
                            <label class="form-label">GST Type</label>
                            <select class="form-control" name="gst_type" id="gst_type">
                                <option selected disabled>Select Type</option>
                                <option value="Achnowledgement">Achnowledgement</option>
                                <option value="Form">Form</option>
                                <option value="Challan">Challan</option>
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-md-6 tds_type" style="display: none">
                            <label class="form-label">TDS Type</label>
                            <select class="form-control" name="tds_type" id="tds_type">
                                <option selected disabled>Select Type</option>
                                <option value="Achnowledgement">Achnowledgement</option>
                                <option value="Form">Form</option>
                                <option value="Challan">Challan</option>
                                <option value="Challan Status Enquiry">Challan Status Enquiry</option>
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-md-6 tax_audit_type" style="display: none">
                            <label class="form-label">Tax Audit Type</label>
                            <select class="form-control" name="tax_audit_type" id="tax_audit_type">
                                <option selected disabled>Select Type</option>
                                <option value="Achnowledgement">Achnowledgement</option>
                                <option value="Form">Form</option>
                                <option value="Final Statement">Final Statement</option>
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label">Upload Documents</label>
                            <input class="form-control" type="file" accept=".png, .jpg, .jpeg, .pdf, .docx, .doc" multiple name="documents[]">
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
        $(".myselect").select2({
            placeholder: "Select Pan No."
        });
        $(document).ready(function() {
            $("#tax_type").on('change', function() {
                if ($("#tax_type").val() == 'gst') {
                    $(".arn").show();
                    $(".return_type").show();
                    $(".financial_year").show();
                    $(".tax_period").show();
                    $(".filing_date").show();
                    $(".status").show();
                    $(".mode_of_filing").show();
                    $(".income_type").hide();
                    $(".tax_audit_type").hide();
                    $(".gst_type").show();
                    $(".tds_type").hide();
                    $(".token_number").hide();
                    $(".receipt_date").hide();
                    $(".barcode_value").hide();
                    $(".deductor_collector_name").hide();
                    $(".filed_by").hide();
                    $(".quarter").hide();
                    $(".form_no").hide();
                    $(".tan").hide();
                    $(".regular_correction").hide();
                    $(".original_token_no").hide();
                    $(".fees_charged").hide();
                    $(".assessment_year").hide();
                    $(".filing_type").hide();
                    $(".itr").hide();
                    $(".acknowledgment_no").hide();
                    $(".total_income").hide();
                } else if ($("#tax_type").val() == 'income_tax') {
                    $(".income_type").show();
                    $(".gst_type").hide();
                    $(".tds_type").hide();
                    $(".tax_audit_type").hide();
                    $(".arn").hide();
                    $(".return_type").hide();
                    $(".financial_year").hide();
                    $(".tax_period").hide();
                    $(".status").hide();
                    $(".mode_of_filing").hide();
                    $(".token_number").hide();
                    $(".receipt_date").hide();
                    $(".barcode_value").hide();
                    $(".deductor_collector_name").hide();
                    $(".quarter").hide();
                    $(".form_no").hide();
                    $(".filed_by").hide();
                    $(".tan").hide();
                    $(".regular_correction").hide();
                    $(".original_token_no").hide();
                    $(".fees_charged").hide();
                    $(".filing_date").show();
                    $(".assessment_year").show();
                    $(".filing_type").show();
                    $(".itr").show();
                    $(".acknowledgment_no").show();
                    $(".total_income").show();
                } else if ($("#tax_type").val() == 'tds') {
                    $(".income_type").hide();
                    $(".gst_type").hide();
                    $(".tax_audit_type").hide();
                    $(".tds_type").show();
                    $(".arn").hide();
                    $(".filed_by").hide();
                    $(".return_type").hide();
                    $(".financial_year").show();
                    $(".tax_period").hide();
                    $(".status").hide();
                    $(".mode_of_filing").hide();
                    $(".token_number").show();
                    $(".receipt_date").show();
                    $(".barcode_value").show();
                    $(".deductor_collector_name").show();
                    $(".quarter").show();
                    $(".form_no").show();
                    $(".tan").show();
                    $(".regular_correction").show();
                    $(".original_token_no").show();
                    $(".fees_charged").show();
                    $(".filing_date").hide();
                    $(".assessment_year").hide();
                    $(".filing_type").hide();
                    $(".itr").hide();
                    $(".acknowledgment_no").hide();
                    $(".total_income").hide();
                } else if ($("#tax_type").val() == 'tax_audit') {
                    $(".income_type").hide();
                    $(".gst_type").hide();
                    $(".tds_type").hide();
                    $(".tax_audit_type").show();
                    $(".filed_by").show();
                    $(".arn").hide();
                    $(".return_type").hide();
                    $(".financial_year").hide();
                    $(".tax_period").hide();
                    $(".status").show();
                    $(".mode_of_filing").hide();
                    $(".token_number").hide();
                    $(".receipt_date").hide();
                    $(".barcode_value").hide();
                    $(".deductor_collector_name").hide();
                    $(".quarter").hide();
                    $(".form_no").hide();
                    $(".tan").hide();
                    $(".regular_correction").hide();
                    $(".original_token_no").hide();
                    $(".fees_charged").hide();
                    $(".filing_date").show();
                    $(".assessment_year").show();
                    $(".filing_type").show();
                    $(".itr").hide();
                    $(".acknowledgment_no").show();
                    $(".total_income").hide();
                } else {
                    $(".income_type").hide();
                    $(".gst_type").hide();
                    $(".tds_type").hide();
                    $(".tax_audit_type").hide();
                    $(".arn").hide();
                    $(".return_type").hide();
                    $(".financial_year").hide();
                    $(".tax_period").hide();
                    $(".status").hide();
                    $(".filed_by").hide();
                    $(".mode_of_filing").hide();
                    $(".token_number").hide();
                    $(".receipt_date").hide();
                    $(".barcode_value").hide();
                    $(".deductor_collector_name").hide();
                    $(".quarter").hide();
                    $(".form_no").hide();
                    $(".tan").hide();
                    $(".regular_correction").hide();
                    $(".original_token_no").hide();
                    $(".fees_charged").hide();
                    $(".filing_date").hide();
                    $(".assessment_year").hide();
                    $(".filing_type").hide();
                    $(".itr").hide();
                    $(".acknowledgment_no").hide();
                    $(".total_income").hide();
                }
            })
        });
    </script>
@endsection
