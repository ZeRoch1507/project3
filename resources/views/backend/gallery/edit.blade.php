@extends('layouts.master_backend')
@section('con')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="margin-top:2cm">Gallery</h4>
                <div class="table-responsive">
                    <div class="card-body">
                        <p></p>
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ url('admin/gallery/update/' . $gall->gallery_id) }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="exampleInputText1">Name</label>
                                <input type="text" name="name" value="{{ $gall->name }}" class="form-control"
                                    id="exampleInputText1" placeholder="กรุณากรอกชื่อรูปภาพ">
                            </div>

                            <div class="mt-3">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="exampleInputNumber1">Image</label>
                                <input type="file" name="image" value="{{ $gall->image }}" class="form-control"
                                    id="exampleInputNumber1">
                            </div>

                            <div class="mt-3">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <img src="{{ asset('backend/gallery/resize/' . $gall->image) }}" style="border-radius:5%">
                            </div>

                            <input type="submit" value="Update" class="btn btn-warning mt-3">
                            <a href="{{ route('admin.g.index') }}" class="btn btn-danger mt-3">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
