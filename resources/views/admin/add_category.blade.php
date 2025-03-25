@extends('admin.layout.master')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic form elements</h4>
        <p class="card-description">Basic form elements</p>
        <form class="forms-sample" method="POST" action="{{route('store_category')}}">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Category Name</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Category Name" name="category_name">
          </div>

          <div class="form-group">
            <label for="category_parent">Category Type</label>
            <select class="form-control" id="category_parent" name="category_parent">
                <option value="0">Main Category</option>
                @foreach ($allCategories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach

            </select>
          </div>
          {{-- <div class="form-group">
            <label for="category_parent">Category Type</label>
            <select class="form-control" id="category_parent" name="category_parent">
              <option value="0">Main Category</option>
            </select>
          </div> --}}
          <div class="form-group">
            <label for="categoryStatus">Category Status</label>
            <select class="form-control" id="categoryStatus" name="category_status">
              <option value="1">Hidden</option>
              <option value="0">Show</option>
            </select>
          </div>

          <div class="form-group">
            <label for="Description">Description</label>
            <textarea class="form-control" id="Description" rows="4" name="category_description"></textarea>
          </div>
          <input type="submit" class="btn btn-gradient-primary me-2" value="Submit">
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>

@endsection
