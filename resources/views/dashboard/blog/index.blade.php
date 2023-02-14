@extends('layouts.primary')

@section('content')
    <main>
        <h1 class="title">{{ $title }}</h1>
        <ul class="breadcrumbs">
            <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="divider">/</li>
            <li><a href="{{ url('blog-page') }}">Blog</a></li>
            <li class="divider">/</li>
            <li><span class="text-muted">Credit</span></li>
        </ul>

        <div class="info-data">
            <div class="row">
                <div class="col-lg-12 text-end py-4 px-5">
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#sendMessageModal"
                        class="btn btn-primary"><i class='bx bx-plus'></i> Create
                        Blog</a>
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
                                {{-- @foreach ($blogs as $blog)
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->excerpt }}</td>
                                    <td>{{ $blog->body }}</td>
                                    <td>
                                        <div class="col-lg d-flex justify-content-center align-items-center"> --}}
                                {{-- <a href="{{ url('blog-page/' . $blog->id) }}" class="badge btn-primary">Show</a> --}}
                                {{-- <a href="{{ url('blog-page/' . $blog->id . '/edit') }}" class="badge btn-warning"><i
                                                    data-feather="edit"></i></a>
                                            <form action="{{ url('blog-page/' . $blog->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="badge btn-danger mb-1"><i
                                                        data-feather="trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Box --}}
        <div class="modal fade" id="sendMessageModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="{{ url('blog') }}" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Blog</h5>
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
                                            {{-- <input type="text" class="form-control" name="excerpt"
                                                placeholder="Input Excerpt" value="{{ old('excerpt') }}"> --}}
                                            <textarea class="form-control" name="excerpt" placeholder="Input Excerpt" id="excerpt" style="height: 75px"
                                                value="{{ old('excerpt') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label" for="body">Body</label>
                                            {{-- <input type="text" class="form-control" name="body"
                                                placeholder="Input Body" value="{{ old('body') }}"> --}}
                                            <textarea class="form-control" name="body" placeholder="Input Body" id="body" style="height: 150px"
                                                value="{{ old('body') }}"></textarea>
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
    </main>
@endsection
@section('js')
    {{-- <script>
        var table = $('#table').DataTable({
            serverSide: true,
            processing: 'Loading ...',
            ajax: document.location.href,
            paging: true,
            select: true,
            columns: [{
                    data: '',
                    defaultContent: '-',
                    className: 'text-center',
                },
                {
                    data: 'title',
                    defaultContent: '-',
                    className: 'text-center',
                    render: (data, type, row, meta) => {
                        return `<div class="d-flex flex-column">
                       ${row.title ?? '-'}
                    </div>`
                    }
                },
                {
                    data: 'excerpt',
                    defaultContent: '-',
                    render: (data, type, row, meta) => {
                        return `<div class="d-flex flex-column">
                        ${row.excerpt ?? '-'}
                    </div>`
                    }
                },
                // {
                //     data: 'body',
                //     defaultContent: '-',
                //     render: (data, type, row, meta) => {
                //         return `<div class="d-flex flex-column">
            //         ${row.body ?? '-'}
            //     </div>`
                //     }
                // },
                {
                    orderable: false,
                    render: (data, type, row, meta) => {
                        return `<div class="w-100 text-center"><div class="btn-group ms-auto">
                        <a href="{{ url('blog/credit?id=${row.id}') }}" class="btn btn-info btn-sm text-white"><i class="fa fa-pen"></i></a>
                        <button href="{{ url('blog/remove?id=${row.id}') }}" data-target="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </div></div>`
                    }
                }
            ]
        })

        table.on('draw.dt', function() {
            var PageInfo = $('#table').DataTable().page.info();
            table.column(0, {
                page: 'current'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            });
        });

        $('#table tbody').on('click', 'button[data-target="delete"]', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Ingin Menghapus Data?',
                text: 'Data akan terhapus permanen',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then(function(value) {
                if (value.isConfirmed == true) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            toastr.success('Data Berhasil Dihapus.');
                            table.ajax.reload()
                        },
                        error: function(err) {
                            toastr.error(err.responseJSON.message ?? 'Something went wrong');
                        }
                    })
                }
            });
        });
    </script> --}}

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
                                        <a href="{{ url('blog/${row.id}') }}" class="btn btn-warning btn-sm text-white"><i class='bx bxs-pencil'></i></a>
                                    </div>
                                    <div class="ms-auto" style="float: left;">
                                        <form action="{{ url('blog/${row.id}') }}" method="post">
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
