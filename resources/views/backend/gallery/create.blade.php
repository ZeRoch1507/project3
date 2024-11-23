@extends('layouts.master_backend')
@section('con')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="margin-top:2cm">Add Gallery</h4>
            <div class="table-responsive">
                <div class="mt-3">
                            <form method="post" enctype="multipart/form-data" action="{{ url('admin/gallery/insert') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputText1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputText1"
                                        placeholder="Please enter name Gallery">
                                </div>

                                <div class="mt-3">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="exampleInputNumber1">Image</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputNumber1">
                                </div>

                                <div class="mt-3">
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <input type="submit" value="Submit" class="btn btn-success">
                                <a href="{{ route('admin.g.index') }}" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
