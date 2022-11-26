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
                <form action="{{url('admin/updateuser/'.$user['id'])}}" id="userform" method="POST" enctype="multipart/form-data">
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
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label">Excel File Upload Here</label>
                            <input class="form-control" type="file" name="file" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <hr>
                <div class="row">
                    <div class="content-header row pt-3">
                        <div class="content-header-left col-md-6 col-12">
                            <h4 class="card-title">Showing {{ $excel_data->count() }} of {{ $excel_data->total() }} User Data </h4>
                        </div>
                        <div class="content-header-right col-md-6 col-12">
                            <div class="btn-group" style="float: right!important;" role="group"
                                aria-label="Button group with nested dropdown">
                                <div class="btn-group mb-1" role="group">
                                    <a href="{{url('/admin/upload-documents')}}"
                                        class="btn btn-outline-primary dropdown-menu-right"><i
                                            class="feather uil-plus icon-left"></i> Add Data</a>
                                </div>
                            </div>
                            <form action="{{ url()->current() }}" class=" col-md-12 float-right p-0">
                                <div class="input-group">
                                    <input type="search" class="form-control" name="search"
                                        value="{{ request('search') }}" placeholder="Search by first name,email,role">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="uil-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
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
                                    <th>Filed By</th>
                                    <th>Filing Date</th>
                                    <th>Filing Section</th>
                                    <th>Action</th>
                                    {{-- <th>Document</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($excel_data as $data)
                                <tr>
                                    <td class="table-user">
                                        {{$data['assessment_year']}}
                                    </td>
                                    <td>{{$data['filing_type']}}</td>
                                    <td>ITR-3</td>
                                    <td>123456789123456789</td>
                                    <td>SELF</td>
                                    <td>31/12/2022</td>
                                    <td>139(1)</td>
                                    <td class="table-action">
                                        <a href="{{url('/admin/upload-documents/'.$data['id'])}}" class="action-icon"><i
                                            class="mdi mdi-pencil"></i></a>
                                            <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/delete_data/'.$data['id'])}}" class="action-icon"> <i
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
                        {{$excel_data->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
