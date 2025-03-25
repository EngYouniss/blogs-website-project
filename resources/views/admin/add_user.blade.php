@extends('admin.layout.master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New User</h4>
                <p class="card-description"></p>
                <form class="forms-sample" method="POST" action="{{ route('store_user') }}">
                    @csrf

                    <!-- عرض جميع الأخطاء في مكان واحد (اختياري) -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleInputName1">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="exampleInputName1" placeholder="Username" name="username" value="{{ old('username') }}">
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectRole">Role</label>
                        <select class="form-control" id="exampleSelectRole" name="role">
                            @foreach ($allRoles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="submit" class="btn btn-gradient-primary me-2" value="Submit">
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
