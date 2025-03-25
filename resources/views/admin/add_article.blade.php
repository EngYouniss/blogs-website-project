@extends('admin.layout.master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic form elements</h4>
                <p class="card-description">Basic form elements</p>
                <form class="forms-sample" method="POST" action="{{ url('/store_article') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Title" name="title">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control" id="exampleSelectGender" name="category">
                            @foreach ($allCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectCategory">Author</label>
                        <select class="form-control" id="exampleSelectCategory" name="author">
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Upload Image</label>
                        <div class="input-group col-xs-12">
                            <input type="file" name="article_image" class="form-control file-upload-info" placeholder="Choose Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Content English</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Content Arabic</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="content_ar"></textarea>
                    </div>
                    <input type="submit" class="btn btn-gradient-primary me-2" value="Submit">
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
