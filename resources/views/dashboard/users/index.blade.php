@extends('layouts.primary')

@section('content')
    <main>
        <h1 class="title">{{ $title }}</h1>
        <ul class="breadcrumbs">
            <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="divider">/</li>
            <li><a href="{{ url('users-page') }}">Users</a></li>
            <li class="divider">/</li>
            <li><span class="text-muted">Credit</span></li>
        </ul>

        <div class="info-data">
            <div class="row">
                <div class="col-lg-12 text-end py-4 px-5">
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#sendMessageModal"
                        class="btn btn-primary"><i class='bx bx-plus'></i> Create
                        User</a>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive container">
                        <table class="table" id="tables">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Box --}}
        <div class="modal fade" id="sendMessageModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="{{ url('users') }}" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Masukkan Email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label" for="floatingSelect">Role</label>
                                            <select class="form-select" id="floatingSelect" name="role_id">
                                                <option selected disabled>Pilih Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Phone</label>
                                            <input type="number" class="form-control" name="phone"
                                                placeholder="Masukkan Nomor" value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Masukkan Password Baru">
                                        </div> --}}
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3 mb-0">
                                        <input type="submit" value="Save" class="submit btn btn-primary" name="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- /Modal Box --}}
    </main>
@endsection
@section('js')
    <script>
        $(function() {
            $('#tables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/users/json',
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'role_id',
                        name: 'role_id'
                    },
                    {
                        orderable: false,
                        render: (data, type, row, meta) => {
                            return `<div class="ms-auto">
                                        <a href="{{ url('users/${row.id}') }}" class="btn btn-warning btn-sm text-white"><i class='bx bxs-pencil'></i></a>
                                    </div>
                                    <div class="ms-auto">
                                        <form action="{{ url('users/${row.id}') }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="deleteData(event)" class="btn btn-danger btn-sm"><i class='bx bxs-trash'></i></button>
                                        </form>
                                    </div>`
                        }
                    }
                ],
                order: [
                    [1, 'asc']
                ]
            });
        });

        function deleteData(event) {
            if (!confirm("Are you sure you want to delete this user?")) {
                event.preventDefault();
            }
        }
    </script>
@endsection
