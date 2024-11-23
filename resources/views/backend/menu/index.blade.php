@extends('layouts.master_backend')

@section('con')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="margin-top:2cm">Menu</h4>
                <div class="table-responsive">
                    <a href="{{ route('admin.m.create') }}"class="btn btn-success mx-3"
                        style="margin-top:0.4cm ; margin-bottom:0.4cm"><i class='bx bxs-plus-circle'
                            style="margin-top: 1cm ; "></i> Add menu</a>
                    <table class="table table-bordered" style="margin-top: 0.5cm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Updated_at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu as $me)
                                <tr>
                                    <td>{{ $menu->firstItem() + $loop->index }}</td>
                                    <td>{{ $me->name }}</td>
                                    <td>{{ optional($me->category)->name }}</td>
                                    <td>{{ $me->price }}</td>
                                    <td>
                                        <img src="{{ asset('backend/menu/resize/' . $me->image) }}" alt=""
                                            style="border-radius:5%">
                                    </td>
                                    <td>{{ $me->description }}</td>
                                    <td>{{ $me->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.m.edit', $me->menu_id) }}" class="btn btn-warning">edit</>
                                            <a href="{{ url('admin/menu/delete/' . $me->menu_id) }}"
                                                class="btn btn-danger mx-2">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="mt-3 ms-3">
                        {!! $menu->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
