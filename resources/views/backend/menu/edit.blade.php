@extends('layouts.master_backend')
@section('con')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="margin-top:2cm ; margin-bottom:1cm">Edit Menu</h4>
            <div class="table-responsive">
                        <form action="{{ url('admin/menu/update/' . $menu->menu_id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label for="defaultFormControlInput" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" type="text" name="name"
                                    value="{{ $menu->name }}" class="form-control" id="defaultFormControlInput"
                                    placeholder="กรุณากรอกชื่อเมนู" aria-describedby="defaultFormControlHelp" />
                                <div class="mt-3">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <label for="defaultFormControlInput" class="form-label">Price</label>
                                <input name="price" type="text" class="form-control" type="text" name="price"
                                    value="{{ $menu->price }}" class="form-control" id="defaultFormControlInput"
                                    placeholder="กรุณากรอกราคาเมนู" aria-describedby="defaultFormControlHelp" />
                                <div class="mt-3">
                                    @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <label for="defaultFormControlInput" class="form-label">Description</label>
                                <input name="description" type="text" class="form-control" type="text"
                                    name="description" value="{{ $menu->description }}" class="form-control"
                                    id="defaultFormControlInput" placeholder="กรุณากรอกรายละเอียดเมนู"
                                    aria-describedby="defaultFormControlHelp" />
                                <div class="mt-3">
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="form-label">Category</label>
                                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                        <option selected>กรุณาเลือกประเภทเมนู</option>

                                        @foreach ($cat as $c)
                                            <option value="{{ $c->category_id }}"
                                                @if ($c->category_id == $menu->category_id) selected @endif>{{ $c->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <label for="defaultFormControlInput" class="form-label">Images</label>
                                <div class="input-group">
                                    <input type="file" name="image" value="{{ $menu->image }}" class="form-control"
                                        id="inputGroupFile02" />
                                </div>
                                <div class="mt-4">
                                    <img src="{{ asset('backend/menu/resize/' . $menu->image) }}" alt="">
                                </div>

                                <button type="submit" value="อัพเดท" class="btn btn-warning mt-3">Update</button>
                                <a href="{{ route('admin.m.index') }}" class="btn btn-danger mt-3 mx-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
