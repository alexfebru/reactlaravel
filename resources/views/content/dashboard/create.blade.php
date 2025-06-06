@extends('layouts/contentNavbarLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Category
                            <a href="{{ url('/') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('products/create') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" />
                                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" />
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" rows="3" class="form-control"></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Category</label>
                                <select class="form-select" id="category" name="category">
                                    <option>Choose Category....</option>
                                    <option value="iPad">iPad</option>
                                    <option value="iWatch">iWatch</option>
                                    <option value="iPhone">iPhone</option>
                                    <option value="Macbook">Macbook</option>
                                </select>
                                @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                              
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection