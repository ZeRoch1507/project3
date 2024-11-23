@extends('layouts.master_backend')
@section('con')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="margin-top:2cm">Category</h4>
                <div class="table-responsive">
                    <a href="{{ route('admin.c.create') }}"class="btn btn-success mx-3"
                        style="margin-top:0.4cm ; margin-bottom:0.2cm"><i class='bx bxs-plus-circle'
                            style="margin-top: 1cm"></i> Add category</a>
                    <table class="table table-bordered" style="margin-top: 0.5cm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $cat)
                                <tr>
                                    <td>{{ $category->firstItem() + $loop->index }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td>{{ $cat->created_at }}</td>
                                    <td>{{ $cat->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.c.edit', $cat->category_id) }}"
                                            class="btn btn-warning">edit</a>
                                        <a href="{{ url('admin/category/delete/' . $cat->category_id) }}"
                                            class="btn btn-danger mx-2">delete</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3 ms-3">
                        {!! $category->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
