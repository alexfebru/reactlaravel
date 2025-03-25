<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Uploaded Images</title>
   <style>
       /* Styling for gallery */
       /* Add responsive grid and hover effects */
   </style>
</head>
<body>
   <div class="container">
       <h1>Uploaded Images</h1>
       @if(count($images) > 0)
           <div class="gallery">
               @foreach($images as $image)
                   <img src="{{ $image }}" alt="Uploaded Image">
               @endforeach
           </div>
       @else
           <p>No images uploaded yet.</p>
       @endif
       <a href="{{ route('image.form') }}">Upload Another Image</a>
   </div>
</body>
</html>