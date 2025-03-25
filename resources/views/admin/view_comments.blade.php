@extends('admin.layout.master')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">إدارة التعليقات</h2>

    <div class="row">
        @foreach ($allcomments as $comment)
        <div class="col-md-12 col-lg-6">
            <div class="card mb-4 shadow-sm border rounded-4"
                 style="border: 1px solid #ddd; transition: transform 0.3s ease-in-out; overflow: hidden;">
                <div class="row g-0">
                    <!-- صورة المقالة -->
                    @if(!empty($comment->article->image))
                    <div class="col-md-4">
                        <img src="{{ $comment->article->image }}" class="img-fluid rounded-start" alt="Article Image"
                             style="height: 250px; width: 100%; object-fit: cover;">
                    </div>
                    @endif

                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <!-- صورة المستخدم -->
                                @if(!empty($comment->user->image))
                                <img src="{{ $comment->user->image }}" class="rounded-circle me-3 border"
                                     alt="User" style="width: 50px; height: 50px; border: 2px solid #ccc;">
                                @else
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3 border"
                                     style="width: 50px; height: 50px; border: 2px solid #ccc;">
                                    <i class="bi bi-person-circle text-secondary fs-3"></i>
                                </div>
                                @endif

                                <!-- اسم المستخدم وتاريخ التعليق -->
                                <div>
                                    <h5 class="mb-1 fw-bold">{{ $comment->user->name }}</h5>
                                    <small class="text-muted"><i class="bi bi-clock"></i> {{ $comment->created_at->diffForHumans() }}</small>
                                    <p class="text-muted mb-0">{{ $comment->user->email }}</p>
                                </div>
                            </div>

                            <!-- نص التعليق -->
                            <p class="text-secondary border-start border-4 ps-3" style="border-color: #007bff; font-size: 14px;">
                                {{ $comment->comment }}
                            </p>

                            <!-- اسم المقال المرتبط بالتعليق -->
                            @if(!empty($comment->article->title))
                            <p class="text-muted"><i class="bi bi-file-earmark-text"></i> المقالة:
                                <strong class="text-dark">{{ $comment->article->title }}</strong>
                            </p>
                            @endif

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge {{ $comment->status ? 'bg-success' : 'bg-warning text-dark' }} py-2 px-2"
                                      style="border-radius: 8px; font-size: 14px;font-weight: bold;">
                                    {{ $comment->status ? '✔️ موافق عليه' : '⌛ بانتظار الموافقة' }}
                                </span>
                                <div>
                                    @if(!$comment->status)
                                    <a href="{{ route('approveComment', $comment->id) }}" class="btn btn-outline-success btn-sm"
                                       style="border-radius: 8px; transition: 0.3s;font-weight: bold;">
                                        <i class="bi bi-check-circle"></i> موافقة
                                    </a>
                                    @else
                                    <a href="{{ route('disapproveComment', $comment->id) }}" class="btn btn-outline-warning btn-sm"
                                       style="border-radius: 8px; transition: 0.3s;font-size: 10px; color: #007bff;font-weight: bold;">
                                        <i class="bi bi-x-circle"></i> إلغاء الموافقة
                                    </a>
                                    @endif
                                    <a href="{{ route('deleteComment', $comment->id) }}" class="btn btn-outline-danger btn-sm"
                                       style="border-radius: 8px; transition: 0.3s;font-weight: bold;">
                                        <i class="bi bi-trash"></i> حذف
                                    </a>
                                </div>
                            </div>
                        </div> <!-- نهاية card-body -->
                    </div> <!-- نهاية col-md-8 -->
                </div> <!-- نهاية row g-0 -->
            </div> <!-- نهاية card -->
        </div> <!-- نهاية col-lg-6 -->
        @endforeach
    </div> <!-- نهاية row -->
</div> <!-- نهاية container -->

<!-- تأثير عند تمرير الفأرة -->
<style>
    .card:hover {
        transform: scale(1.03);
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
    }

    .btn-outline-success:hover {
        background-color: #28a745 !important;
        color: white !important;
    }

    .btn-outline-warning:hover {
        background-color: #ffc107 !important;
        color: black !important;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545 !important;
        color: white !important;
    }
</style>

@endsection
