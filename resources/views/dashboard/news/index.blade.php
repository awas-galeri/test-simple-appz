@extends('layouts.primary')

@section('content')
    <main>
        <h1 class="title">{{ $title }}</h1>
        <ul class="breadcrumbs">
            <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="divider">/</li>
            <li><a href="{{ url('news-page') }}">News</a></li>
            <li class="divider">/</li>
            <li><span class="text-muted">Credit</span></li>
        </ul>

        <div class="info-data">
            <div class="row">
                <div class="col-lg-12 text-end py-4 px-5">
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#sendMessageModal"
                        class="btn btn-primary"><i class='bx bx-plus'></i> Create
                        News</a>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive container">
                        <table class="table" id="tables">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Excerpt</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    {{-- <th scope="col">Body</th> --}}
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
                <form action="{{ url('news') }}" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">News</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form class="comment-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label" for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Input Title" value="{{ old('title') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label" for="excerpt">Excerpt</label>
                                            <textarea class="form-control" name="excerpt" placeholder="Input Excerpt" id="excerpt" style="height: 75px"
                                                value="{{ old('excerpt') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label" for="body">Content</label>
                                            <textarea class="form-control" name="content" placeholder="Input Content" id="body" style="height: 150px"
                                                value="{{ old('content') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-end">
                                        <div class="mb-3 mb-0">
                                            <input type="submit" value="Save" class="submit btn btn-primary"
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
        {{-- /Modal Box --}}

        {{-- Edit Box --}}
        {{-- <div class="modal fade" id="editModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="/news/auth()->user()" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">News</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form class="comment-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label" for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Input Title" value="{{ $newses->title }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label" for="excerpt">Excerpt</label>
                                            <textarea class="form-control" name="excerpt" placeholder="Input Excerpt" id="excerpt" style="height: 75px"
                                                value="{{ old('excerpt') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label" for="body">Content</label>
                                            <textarea class="form-control" name="content" placeholder="Input Content" id="body" style="height: 150px"
                                                value="{{ old('content') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3 mb-0">
                                            <input type="submit" value="Save" class="submit btn btn-primary"
                                                name="submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}
        {{-- /Edit Box --}}

    </main>
@endsection
@section('js')
    <script>
        $(function() {
            $('#tables').DataTable({
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
                    {
                        data: 'excerpt',
                        name: 'excerpt'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    // {
                    //     data: 'body',
                    //     name: 'body'
                    // },
                    {
                        orderable: false,
                        render: (data, type, row, meta) => {
                            return `<div class="ms-auto" style="float: left;">
                                        <a href="{{ url('news/${row.id}') }}" class="btn btn-warning btn-sm text-white"><i class='bx bxs-pencil'></i></a>
                                    </div>
                                    <div class="ms-auto" style="float: left;">
                                        <form action="{{ url('news/${row.id}') }}" method="post">
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
            if (!confirm("Are you sure you want to delete this data?")) {
                event.preventDefault();
            }
        }
    </script>
@endsection
