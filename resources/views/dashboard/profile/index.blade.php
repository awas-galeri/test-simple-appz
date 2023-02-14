@extends('layouts.primary')

@section('content')
    <main>
        <h1 class="title">{{ $title }}</h1>
        <ul class="breadcrumbs">
            <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="divider">/</li>
            <li><span class="text-muted">{{ $title }}</span></li>
        </ul>
        <div class="info-data">
            <div class="col-lg-12">
                <div class="profile card card-body p-3 pb-0">
                    <div class="profile-head">
                        <div class="profile-cover">
                            <div class="profile-cover-wrap">
                                <img src="https://source.unsplash.com/1219x400?nature" class="profile-cover-img"
                                    alt="cover.jpg">
                            </div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{ auth()->user()->photo ?? 'https://source.unsplash.com/200x200?person' }}"
                                    class="img-fluid rounded-circle" alt="profile.png" id="photo-profile">
                                <label for="avatar_upload" style="cursor: pointer">
                                    <form action="{{ route('profile.change-photo') }}" method="POST"
                                        id="form-update-photo">
                                        @csrf
                                        <input style="display: none" type="file" id="avatar_upload" name="photo">
                                    </form>
                                    <span
                                        class="position-absolute top-50 py-1 px-2 start-100 translate-middle rounded-circle">
                                        <i class='bx bx-pencil' style="font-size: 25px; color: #5bcfc5"></i>
                                    </span>
                                </label>
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    {{-- @foreach ($users as $user) --}}
                                    <h3 class="text-primary mb-0 fw-bold">{{ auth()->user()->name ?? '-' }}</h3>
                                    {{-- <p>{{ $user->status }}</p> --}}
                                    <ul class="list-inline fs-5">
                                        {{-- <li class="list-inline-item"> --}}
                                        {{-- <i class="far fa-user"></i> <span>{{ $user->role->display }}</span> --}}
                                        {{-- </li> --}}
                                        <li>
                                            {{-- <i class="far fa-calendar-alt"></i>
                                            <span>{{ date('d F Y', strtotime($user->tgl_lahir)) }}</span> --}}
                                            {{ auth()->user()->phone ?? '-' }}
                                        </li>
                                        <li>
                                            {{-- <i class="fas fa-map-marker-alt"></i> --}}
                                            {{ auth()->user()->email ?? '-' }}
                                        </li>
                                    </ul>
                                    {{-- @endforeach --}}
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    {{-- <h4 class="text-muted mb-0">{{ $user->email }}</h4> --}}
                                    {{-- <p>Email</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-7 d-flex justify-content-center">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-flex justify-content-between">
                                    <span>Profile</span>
                                </h4>
                                <a class="btn btn-sm btn-primary" href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#sendMessageModal">Edit</a>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mb-0 fs-5">
                                    <li class="py-0">
                                        <h5>Nama Lengkap</h5>
                                    </li>
                                    <li>
                                        {{ auth()->user()->name }}
                                    </li>
                                    <li class="pt-2 pb-0">
                                        <h5>Email</h5>
                                    </li>
                                    <li>
                                        {{ auth()->user()->email }}
                                    </li>
                                    <li class="pt-2 pb-0">
                                        <h5>No. HP</h5>
                                    </li>
                                    <li>
                                        {{ auth()->user()->phone }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Box --}}
        <div class="modal fade" id="sendMessageModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="{{ url('profile-edit/{id}') }}" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Username</label>
                                            <input type="text" class="form-control" name="username"
                                                placeholder="Masukkan Username" value="{{ auth()->user()->username }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Masukkan Email" value="{{ auth()->user()->email }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Masukkan Nama Lengkap" value="{{ auth()->user()->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">No. HP</label>
                                            <input type="number" class="form-control" name="phone"
                                                placeholder="Masukkan Nomor" value="{{ auth()->user()->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Masukkan Password Baru">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3 mb-0">
                                            <input type="submit" value="Update" class="submit btn btn-primary"
                                                name="submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script>
        let srcIMG = $('#photo-profile').attr('src');

        $('#form-update-photo').on('submit', function(event) {
            event.preventDefault();
            const form = $('#form-update-photo').get(0);

            var formData = new FormData(form);
            // upload
            $.ajax({
                type: 'POST',
                url: form.action,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    srcIMG = data.path;
                    $('#photo-profile-nav').attr('src', srcIMG);
                },
                error: function(err) {
                    $('#photo-profile').attr('src', srcIMG);
                    if (err.status == 422) {
                        alert(err.responseJSON.message);
                    } else {
                        alert('Gagal mengupdate foto profile');
                    }
                }
            });
        })

        document.getElementById('avatar_upload').addEventListener('change', function(event) {
            var input = document.getElementById('avatar_upload');
            $('#form-update-photo').submit()
            $('#photo-profile').attr('src', URL.createObjectURL(input.files[0]))
        })
    </script>
@endsection
