<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Image Upload</title>
   <style>
       /* Styling for form */
       /* Add styles for better design */
   </style>
</head>
<body>
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
           <button type="submit">Upload</button>
       </form>
       <a href="{{ route('images.list') }}">View All Uploaded Images</a>
   </div>
</body>
</html>