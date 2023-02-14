@extends('layouts.pages')

@section('content')
    <div class="container p-3">
        <div class="row justify-content-center">
            <div class="col-md-12 d-flex justify-content-center">
                {{-- <h1>Users</h1> --}}
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Blog</th>
                            <th>News</th>
                            {{-- <th>Status</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ count($user->blog) }}</td>
                                <td>{{ count($user->news) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $users->links() }}
    </div>
@endsection
