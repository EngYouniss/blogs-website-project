@extends('admin.layout.master')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
{{-- @if (Has::session('success'))
<h4 class="alert alert-danger">{{session('success')}}</h1>

@endif --}}
<h3>{{session('success')}}</h3>
        <h4 class="card-title">All Users</h4>
        <table class="table table-bordered" style="table-layout: auto; width: 100%; border-collapse: collapse;">
          <thead>
            <tr>
              <th style="width: 50px; text-align: center;">#</th>
              <th style="width: 150px; text-align: center;">Name</th>
              <th style="width: 300px; text-align: center;">password</th>
              <th style="width: 120px; text-align: center;">Email</th>
              <th style="width: 120px; text-align: center;">Role</th>
              <th style="width: 160px; text-align: center;">Created at</th>
              <th style="width: 130px; text-align: center;">Edit/Delete</th>
            </tr>
          </thead>
          <tbody>

          @foreach ($allUsers    as $user)
          <tr>
            <td style="text-align: center;">{{$user->id}}</td>
            <td style="word-break: break-word; white-space: normal; font-size: 14px;">{{$user->name}}</td>
            <td style="word-break: break-word; white-space: normal; font-size: 14px;">{{$user->password}}</td>
            <td style="word-break: break-word; white-space: normal; font-size: 14px;">{{$user->email}}</td>
            {{-- <td style="word-break: break-word; white-space: normal; font-size: 14px;">{{$user->role-name}}</td> --}}
            <td style="text-align: center;">{{$user->created_at}}</td>
            <td style="text-align: center;">{{$user->updated_at}}</td>
            <td style="text-align: center;">
              <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-sm btn-gradient-primary btn-rounded mx-1">
                  <i class="mdi mdi-pencil"></i>
                </button>
<a href="{{ route('delete_user', $user->id) }}" class="btn btn-sm btn-gradient-dark btn-rounded mx-1"> <i class="mdi mdi-delete"></i></a>

              </div>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection

@foreach($allUsers as $user)
$user->name;
@endforeach
