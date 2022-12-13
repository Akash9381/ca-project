@extends('admin.layouts.admin_layouts')
@section('title', 'Dashboard - Tax Mail')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="content-header row pt-3">
                        @if(session()->has('success'))
                            <div class="alert alert-success text-center">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <div class="content-header-left col-md-6 col-12">
                            <h4 class="card-title mb-3">Showing {{$user->count()}} of {{$user->total()}} User List </h4>
                            <form action="{{route('useruploded')}}" enctype="multipart/form-data" method="POST" class="col-md-12 float-right p-0">
                                @csrf
                                <div class="input-group">
                                    <input type="file" class="form-control"
                                    accept=".xlsx" name="file" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="uil-upload"></i>
                                        </button>
                                    </div>
                                    @error('file')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </form>
                        </div>
                        <div class="content-header-right col-md-6 col-12">
                            <div class="btn-group" style="float: right!important;" role="group"
                                aria-label="Button group with nested dropdown">
                                <div class="btn-group mb-1" role="group">
                                    <a href="{{ url('/admin/create-user') }}"
                                        class="btn btn-outline-primary dropdown-menu-right"><i
                                            class="feather uil-plus icon-left"></i> Add User</a>
                                </div>
                            </div>
                            <form action="{{ url()->current() }}" class=" col-md-12 float-right p-0">
                                <div class="input-group">
                                    <input type="search" class="form-control" name="search"
                                        value="{{ request('search') }}" placeholder="Search ">
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
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>PAN No.</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user as $index => $data)
                                <tr>
                                    <td>{{ $index + $user->firstItem() }}</td>
                                    <td>{{$data['name']}}</td>
                                    <td>{{$data['pan_card']}}</td>
                                    <td>{{$data['email']}}</td>
                                    <td>{{$data['number']}}</td>
                                    <td>{{$data['city']}}</td>
                                    <td class="table-action">
                                        <a href="{{url('admin/edit-user/'.$data['id'])}}" title="Edit User" class="action-icon"> <i
                                                class="mdi mdi-pencil"></i></a>
                                        <a onclick="return confirm('Are You Sure to Delete?')" href="{{url('admin/delete_user/'.$data['id'])}}" title="Delete User" class="action-icon"> <i
                                                class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <th colspan="6">
                                        No records found
                                    </th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $user->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

