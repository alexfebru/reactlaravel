<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h3>Update Post</h3>
            <form action="{{ route('posts.update', $post->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $post->price }}"
                        required min="0" step="0.01">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                        required>{{ $post->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ $post->category }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="image">Image URL</label>
                    <input type="url" class="form-control" id="image" name="image" value="{{ $post->image }}" required>
                </div>
                <button type="submit" class="btn mt-3 btn-primary">Update Post</button>
            </form>
        </div>
    </div>
</div>