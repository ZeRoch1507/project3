@extends('layouts.master_backend')
@section('con')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="margin-top:2cm">Add Category</h4>
            <div class="table-responsive">
                <div class="mt-3">
          <div class="card-body">
            <form method="POST" action="{{ url('admin/category/insert') }}">
              @csrf
            <div>
              <label for="defaultFormControlInput" class="form-label">Name</label>
              <input
                type="text"
                name="name"
                class="form-control"
                id="defaultFormControlInput"
                placeholder="Please enter category name"
                aria-describedby="defaultFormControlHelp"
              />
              <div class="mt-3">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              </div>
              <input type="submit" value="Submit" class="btn btn-success mt-3" >
              <a href="{{ route('admin.c.index') }}" class="btn btn-danger mt-3 mx-2">back</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
