@extends('layouts.primary')

@section('content')
    <!-- MAIN -->
    <main>
        <h1 class="title">{{ $title }}</h1>
        <ul class="breadcrumbs">
            {{-- <li><a href="#">Main</a></li> --}}
            {{-- <li class="divider">/</li> --}}
            <li><span class="text-muted">{{ $title }}</span></li>
        </ul>
        <div class="info-data">
            <div class="card">
                <div class="head">
                    <div>
                        <h2>{{ $blogs->count() }}</h2>
                        <p>Blog</p>
                    </div>
                    {{-- <i class='bx bx-trending-up icon'></i> --}}
                </div>
                {{-- <span class="progress" data-value="{{ $blogs->count() }}%"></span> --}}
                {{-- <span class="label">{{ $blogs->count() }}%</span> --}}
            </div>
            <div class="card">
                <div class="head">
                    <div>
                        <h2>{{ $newses->count() }}</h2>
                        <p>News</p>
                    </div>
                    {{-- <i class='bx bx-trending-down icon down'></i> --}}
                </div>
                {{-- <span class="progress" data-value="{{ $newses->count() }}%"></span> --}}
                {{-- <span class="label">{{ $newses->count() }}%</span> --}}
            </div>
            @if (auth()->user()->role_id == 1)
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>{{ $users->count() }}</h2>
                            <p>User</p>
                        </div>
                        {{-- <i class='bx bx-trending-up icon'></i> --}}
                    </div>
                    {{-- <span class="progress" data-value="{{ $users->count() }}%"></span> --}}
                    {{-- <span class="label">{{ $users->count() }}%</span> --}}
                </div>
            @endif
            {{-- <div class="card">
                    <div class="head">
                        <div>
                            <h2>465</h2>
                            <p>Pageviews</p>
                        </div>
                        <i class='bx bx-trending-up icon'></i>
                    </div>
                    <span class="progress" data-value="30%"></span>
                    <span class="label">30%</span>
                </div> --}}
            {{-- <div class="card">
                    <div class="head">
                        <div>
                            <h2>235</h2>
                            <p>Visitors</p>
                        </div>
                        <i class='bx bx-trending-up icon'></i>
                    </div>
                    <span class="progress" data-value="80%"></span>
                    <span class="label">80%</span>
                </div> --}}
        </div>
        <hr>
        {{-- <div class="data">
                <div class="content-data">
                    <div class="head">
                        <h3>Sales Report</h3>
                        <div class="menu">
                            <i class='bx bx-dots-horizontal-rounded icon'></i>
                            <ul class="menu-link">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Save</a></li>
                                <li><a href="#">Remove</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="chart">
                        <div id="chart"></div>
                    </div>
                </div>
                <div class="content-data">
                    <div class="head">
                        <h3>Chatbox</h3>
                        <div class="menu">
                            <i class='bx bx-dots-horizontal-rounded icon'></i>
                            <ul class="menu-link">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Save</a></li>
                                <li><a href="#">Remove</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="chat-box">
                        <p class="day"><span>Today</span></p>
                        <div class="msg">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                                alt="">
                            <div class="chat">
                                <div class="profile">
                                    <span class="username">Alan</span>
                                    <span class="time">18:30</span>
                                </div>
                                <p>Hello</p>
                            </div>
                        </div>
                        <div class="msg me">
                            <div class="chat">
                                <div class="profile">
                                    <span class="time">18:30</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque voluptatum eos quam
                                    dolores eligendi exercitationem animi nobis reprehenderit laborum! Nulla.</p>
                            </div>
                        </div>
                        <div class="msg me">
                            <div class="chat">
                                <div class="profile">
                                    <span class="time">18:30</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, architecto!</p>
                            </div>
                        </div>
                        <div class="msg me">
                            <div class="chat">
                                <div class="profile">
                                    <span class="time">18:30</span>
                                </div>
                                <p>Lorem ipsum, dolor sit amet.</p>
                            </div>
                        </div>
                    </div>
                    <form action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Type...">
                            <button type="submit" class="btn-send"><i class='bx bxs-send'></i></button>
                        </div>
                    </form>
                </div>
            </div> --}}
        <div class="info-data">
            <div class="row">
                <h3>Blog</h3>
                <div class="col-lg">
                    <div class="table-responsive container">
                        <table class="table" id="tables">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Title</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="info-data">
            <div class="row">
                <h3>News</h3>
                <div class="col-lg">
                    <div class="table-responsive container">
                        <table class="table" id="tabless">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Title</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="info-data">
            <div class="row">
                <h3>Users</h3>
                <div class="col-lg">
                    <div class="table-responsive container">
                        <table class="table" id="tablesss">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN -->
@endsection
@section('js')
    <script>
        $(function() {
            $('#tables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/blog/json',
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                ],
                order: [
                    [1, 'asc']
                ]
            });
        });
    </script>
    <script>
        $(function() {
            $('#tabless').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/news/json',
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                ],
                order: [
                    [1, 'asc']
                ]
            });
        });
    </script>
    <script>
        $(function() {
            $('#tablesss').DataTable({
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
                ],
                order: [
                    [1, 'asc']
                ]
            });
        });
    </script>
@endsection
