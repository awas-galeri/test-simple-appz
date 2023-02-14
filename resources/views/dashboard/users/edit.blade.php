@extends('layouts.primary')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-10 d-flex justify-content-center mt-2">
            <div class="card-fluid" role="document">
                <form action="/users/{{ $users->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">User</h5>
                        </div>
                        <div class="modal-body">
                            <form class="comment-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Input Name" value="{{ $users->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Input Email" value="{{ $users->email }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label" for="floatingSelect">Role</label>
                                            <select class="form-select" id="floatingSelect" name="role_id">
                                                <option selected disabled>Pilih Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}"
                                                        {{ $role->id == $users->role_id ? 'selected' : '' }}>
                                                        {{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Phone</label>
                                            <input type="number" class="form-control" name="phone"
                                                placeholder="Input Phone" value="{{ $users->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-2 text-end">
                                        <div class="mb-3 mb-0">
                                            <input type="submit" value="Save" class="submit btn btn-primary"
                                                name="submit">
                                            <a href="{{ url('users') }}" class="submit btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
