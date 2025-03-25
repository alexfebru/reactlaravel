// same as the previous file. Add the following after the nav tag and before the closing body tag.
<div class="container h-100 mt-5">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <h3>Add a Post</h3>
      <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
          <label for="body">Body</label>
          <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
        </div>
        <br>
        

        <div class="container">
       <h1>Upload an Image</h1>
       @if(session('success'))
           <div class="success">
               {{ session('success') }}
           </div>
           <img src="{{ asset('uploads/' . session('image')) }}" alt="Uploaded Image">
       @endif
       @if(session('error'))
           <div class="error">
               {{ session('error') }}
           </div>
       @endif
       <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <label for="image">Choose an Image:</label>
           <input type="file" name="image" id="image" required>
       
       </form>
       
   </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
      </form>
    </div>
  </div>
</div>