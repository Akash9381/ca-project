@extends('admin.layouts.admin_layouts')
@section('title', 'Dashboard - Tax Mail')
<style>
    * {
      box-sizing: border-box;
    }

    .zoom {
      /* padding: 50px; */
      background-color: green;
      transition: transform .2s;
      width: 40px;
      height: 40px;
      margin: 0 auto;
    }

    .zoom:hover {
      -ms-transform: scale(1.5); /* IE 9 */
      -webkit-transform: scale(1.5); /* Safari 3-8 */
      transform: scale(10);
      margin-bottom: 40px;
    }
    </style>
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
                @if ($data)
                    <form action="{{url('/admin/document_update/'.$data['id'])}}" method="POST" enctype="multipart/form-data">
                @else
                    <form action="{{url('/admin/document_update')}}" method="POST" enctype="multipart/form-data">
                @endif
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Select User</label>
                            <select class="myselect form-control" name="user_id">
                                @forelse ($user as $userdata)
                                <option @isset($data['user_id'])
                                    @if($data['user_id']==$userdata['id'])
                                    selected
                                    @endif
                                @endisset value="{{$userdata['id']}}">{{$userdata['pan_card']}}</option>
                                @empty
                                <option selected>No User</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Assessment Year</label>
                            <input type="text" class="form-control" name="assessment_year" @isset($data)
                            value="{{$data['assessment_year']}}"
                            @endisset   placeholder="Assessment Year">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Filing Type</label>
                            <input type="text" class="form-control" name="filing_type" @isset($data)
                            value="{{$data['filing_type']}}"
                            @endisset  placeholder="Enter Filing Type">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">ITR</label>
                            <input type="text" class="form-control" placeholder="Enter ITR">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Acknowledgment No.</label>
                            <input type="text" class="form-control" placeholder="Enter Acknowledgment No.">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Filed By</label>
                            <input type="number" class="form-control"   placeholder="Enter Filed By">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Filing Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label  class="form-label">Filing Section</label>
                            <input type="text" class="form-control" placeholder="Enter Filing Section">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label">Upload Documents</label>
                            <input class="form-control" type="file" multiple name="upload_document[]" id="inputGroupFile04">
                        </div>
                        @isset($data)
                            @if(!empty($data['upload_document']))
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label">Uploaded Documents</label><br>
                                    @foreach (json_decode($data['upload_document']) as $image)
                                    <img  class="zoom rounded " style="margin-right: 10px" src="{{asset('documents/'.$image)}}" alt="Document" >
                                    @endforeach
                            </div>
                            @endif
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
    $(".myselect").select2({
        placeholder: "Select Pan No."
    });
</script>
@endsection
