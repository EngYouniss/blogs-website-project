@extends('admin.layout.master')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Articles</h4>

            <div style="overflow-x: auto; max-width: 100%;">
                <table class="table table-bordered" style="min-width: 1000px; border-collapse: collapse;">
                    <thead class="table-layout">
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">Title</th>
                            <th style="text-align: center;">Content</th>
                            <th style="text-align: center;">Views</th>
                            <th style="text-align: center;">Comments Number</th>
                            <th style="text-align: center;">Image</th>
                            <th style="text-align: center;">Writer Name</th>
                            <th style="text-align: center;">Category</th>
                            <th style="text-align: center;">Created At</th>
                            <th style="text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_articles as $article)
                        <tr>
                            <td style="text-align: center;">{{$article->id}}</td>
                            <td style="word-wrap: break-word; white-space: normal;">{{$article->title}}</td>
                            <td style="word-wrap: break-word; white-space: normal;">{{$article->content}}</td>
                            <td style="text-align: center;">{{$article->views}}</td>
                            <td style="text-align: center;">{{$article->comment->count()}}</td>
                            <td style="text-align: center;">
                                <img src="{{$article->image}}" alt="Article Image" width="50" style="width: 100px;height:100px">
                            </td>
                            <td style="text-align: center;">{{$article->user->name}}</td>
                            <td style="text-align: center;">{{$article->category->name}}</td>
                            <td style="text-align: center;">{{$article->created_at->format('Y-m-d')}}</td>
                            <td style="text-align: center;">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ url('/edit_article/'.$article->id) }}" class="btn btn-sm btn-gradient-primary btn-rounded mx-1">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>

                                    <form action="{{ route('delete_article', $article->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-gradient-dark btn-rounded mx-1" onclick="return confirm('هل أنت متأكد من حذف هذا المقال؟')">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </form>


                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
