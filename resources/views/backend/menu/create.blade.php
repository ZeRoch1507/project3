@extends('layouts.master_backend')
@section('con')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="margin-top:2cm">Add Menu</h4>
                <div class="table-responsive">
                    <div class="mt-3">
                    <form method="POST" action="{{ url('admin/menu/insert') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <br>
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="defaultFormControlInput"
                                placeholder="Please enter name menu" aria-describedby="defaultFormControlHelp" />
                            <div class="mt-3">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <label for="defaultFormControlInput" class="form-label">Price</label>
                            <input name="price" type="text" class="form-control" id="defaultFormControlInput"
                                placeholder="Please enter price menu" aria-describedby="defaultFormControlHelp" />
                            <div class="mt-3">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <label for="defaultFormControlInput" class="form-label">Description</label>
                            <input name="description" type="text" class="form-control" id="defaultFormControlInput"
                                placeholder="Please enter description" aria-describedby="defaultFormControlHelp" />
                            <div class="mt-3">
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="form-label">Category</label>
                                <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                    <option selected value="">Please select menu category</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->category_id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-3">
                                    @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <label for="defaultFormControlInput" class="form-label">Image</label>
                            <input name="image" type="file" class="form-control" id="inputGroupFile02" />
                            <div class="mt-3">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="submit" value="Submit" class="btn btn-success mt-3">
                            <a href="{{ route('admin.m.index') }}" class="btn btn-danger mt-3 mx-2">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
