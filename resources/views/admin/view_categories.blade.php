@extends('admin.layout.master')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Bordered Table</h4>

        <table class="table table-bordered" style="table-layout: auto; width: 100%; border-collapse: collapse;">
          <thead>
            <tr>
              <th style="width: 50px; text-align: center;">#</th>
              <th style="width: 150px; text-align: center;">Name</th>
              <th style="width: 300px; text-align: center;">Description</th>
              <th style="width: 120px; text-align: center;">Type</th>
              <th style="width: 100px; text-align: center;">Status</th>
              <th style="width: 160px; text-align: center;">Created at</th>
              <th style="width: 160px; text-align: center;">Updated at</th>
              <th style="width: 130px; text-align: center;">Edit/Delete</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($category as $cat)
          <tr>
            <td style="text-align: center;">{{$cat->id}}</td>
            <td style="word-break: break-word; white-space: normal; font-size: 14px;">{{$cat->name}}</td>
            <td style="word-break: break-word; white-space: normal; font-size: 14px;">{{$cat->description}}</td>
            <td style="word-break: break-word; white-space: normal; font-size: 14px;">{{$cat->parent}}</td>
            <td style="text-align: center;">{{$cat->status}}</td>
            <td style="text-align: center;">{{$cat->created_at}}</td>
            <td style="text-align: center;">{{$cat->updated_at}}</td>
            <td style="text-align: center;">
              <div class="d-flex justify-content-center">
               <a href="{{ route('edit_category', $cat->id) }}" class="btn btn-sm btn-gradient-primary btn-rounded mx-1">
                   <i class="mdi mdi-pencil"></i>
                 </a>
                <a href="{{ route('delete_category', $cat->id) }}" class="btn btn-sm btn-gradient-dark btn-rounded mx-1"> <i class="mdi mdi-delete"></i></a>
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
