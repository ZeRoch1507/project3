@extends('layouts.master_backend')
@section('con')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="margin-top:2cm">Add Promotion</h4>
                <div class="table-responsive">
                    <div class="mt-3">
                        <form method="POST" action="{{ url('admin/promotion/insert') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Promotion Name Field -->
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="defaultFormControlInput"
                                placeholder="Please enter name promotion" aria-describedby="defaultFormControlHelp" />
                            <div class="mt-3">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Promotion Image Field -->
                            <label for="defaultFormControlInput" class="form-label">Image</label>
                            <input name="image" type="file" class="form-control" id="inputGroupFile02" />
                            <div class="mt-3">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <br>
                            <input type="submit" value="Submit" class="btn btn-success mt-3">
                            <a href="{{ route('admin.p.index') }}" class="btn btn-danger mt-3 mx-2">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
