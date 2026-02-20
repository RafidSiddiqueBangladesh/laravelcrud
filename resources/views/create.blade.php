<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
     <style type="text/tailwindcss">
      @layer utilities {
         .container {
              @apply px-20 mx-auto
         }
        
      }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
      <div class="flex justify-between my-5 ">
         <h2 class="text-red-500  text-xl">create</h2>
         <a href="/" class="bg-green-500 text-white rounded py-2 px-4 ">home </a>
      </div>
    </div>
    <div class="container">
        <form method="POST" action="{{ route('test') }}" enctype="multipart/form-data">
            @csrf
         <div class="flex flex-col gap-4">
            <label for="">Name</label>
            <input type="text" name="name" value="{{old('name')}}" class="border-2 border-gray-300 p-2 rounded w-full" placeholder="Enter your name">
            @error('name')
                <div class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </div>
            @enderror
            
            <label for="">Description</label>       
            <input type="text" name="description" value="{{old('description')}}" class="border-2 border-gray-300 p-2 rounded w-full" placeholder="Enter your description">
            @error('description')
                <div class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </div>
            @enderror
            <label for="">Photo</label>
            <input type="file" name="photo" value="{{old('photo')}}" class="border-2 border-gray-300 p-2 rounded w-full" placeholder="Enter your photo URL">
            @error('photo')
                <div class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </div>
            @enderror
            <div>
                
                 <input type="submit" class="bg-blue-500 text-white rounded py-2 px-4 mt-4 inline-block" value="Submit">
            
            </div>
         </div>
        </form>
    </div>
</body>
</html>