@extends('admin.layouts.admin_layouts')
@section('title', 'Dashboard - Tax Mail')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="content-header row pt-3">

                        <div class="content-header-left col-md-6 col-12">
                            <h4 class="card-title mb-3">Showing {{$contact->count()}} of {{$contact->total()}} Contact List </h4>
                        </div>
                        <div class="content-header-right col-md-6 col-12">
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
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contact as $index => $data)
                                <tr>
                                    <td>{{ $index + $contact->firstItem() }}</td>
                                    <td>{{$data['name']}}</td>
                                    <td>{{$data['email']}}</td>
                                    <td>{{$data['number']}}</td>
                                    <td>{{$data['subject']}}</td>
                                    <td>{{$data['message']}}</td>
                                    {{-- <td class="table-action">
                                        <a href="#" title="Edit User" class="action-icon"> <i
                                                class="mdi mdi-eye"></i></a>
                                    </td> --}}
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
                        {{ $contact->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

