@extends('layouts.master_backend')
@section('con')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="margin-top:2cm">Gallery</h4>
                <div class="table-responsive">
                    <a href="{{ route('admin.g.create') }}"class="btn btn-success mx-3"
                        style="margin-top:0.4cm ; margin-bottom:0.4cm"><i class='bx bxs-plus-circle'
                            style="margin-top: 1cm ; "></i> Add gallery</a>
                    <table class="table table-bordered" style="margin-top: 0.5cm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Images</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallery as $key => $gall)
                                <tr>
                                    <td>{{ $gall->gallery_id }}</td>
                                    <td>{{ $gall->name }}</td>
                                    <td><img
                                            src="{{ asset('backend/gallery/resize/' . $gall->image) }}"style="border-radius:5%">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.g.edit', $gall->gallery_id) }}"
                                            class="btn btn-warning">Edit
                                            </>
                                            <a href="{{ url('admin/gallery/delete/' . $gall->gallery_id) }}"
                                                class="btn btn-danger mx-2">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 ms-3">
                    {!! $gallery->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
