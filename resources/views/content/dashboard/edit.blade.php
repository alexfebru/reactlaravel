@extends('layouts/contentNavbarLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Product
                            <a href="{{ url('/') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('products/' . $products->id . '/update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $products->title  }}"/>
                                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" value="{{ $products->price }}" />
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" rows="3" class="form-control">{{ $products->description }}</textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Category</label>
                                <select class="form-select" id="category" name="category">
                                    <option disabled>Choose Category...</option>
                                    <option value="iPad" {{ $products->category == 'iPad' ? 'selected' : '' }}>iPad</option>
                                    <option value="iWatch" {{ $products->category == 'iWatch' ? 'selected' : '' }}>iWatch</option>
                                    <option value="iPhone" {{ $products->category == 'iPhone' ? 'selected' : '' }}>iPhone</option>
                                    <option value="Macbook" {{ $products->category == 'Macbook' ? 'selected' : '' }}>Macbook</option>
                                </select>
                                @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" />
                                @if($products->image)
                                    <small class="text-muted">Current Image: {{ $products->image }}</small>
                                @endif
                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
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