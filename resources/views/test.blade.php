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
         .table-row-odd {
              @apply bg-gray-50
         }
         .table-row-even {
              @apply bg-white
         }
         .pagination-active {
              @apply bg-blue-500 text-white
         }
      }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
      <div class="flex justify-between items-center my-5">
         <h2 class="text-blue-600 text-2xl font-bold">Rights List</h2>
         <a href="/create" class="bg-green-500 text-white rounded py-2 px-4 hover:bg-green-600">+ Add New</a>
      </div>
    </div>
    <div class="container my-8">
                        <!-- Table -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                        <th scope="col" class="px-6 py-4 text-start text-sm font-semibold">Id</th>
                        <th scope="col" class="px-6 py-4 text-start text-sm font-semibold">Name</th>
                        <th scope="col" class="px-6 py-4 text-start text-sm font-semibold">Description</th>
                        <th scope="col" class="px-6 py-4 text-center text-sm font-semibold">Photo</th>
                        <th scope="col" class="px-6 py-4 text-center text-sm font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($rights as $right)
                            <tr class="{{ $loop->odd ? 'table-row-odd' : 'table-row-even' }} hover:bg-blue-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $right->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $right->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ Str::limit($right->description, 50) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($right->photo)
                                        <img src="{{ asset('storage/images/' . $right->photo) }}" alt="{{ $right->name }}" class="w-16 h-16 object-cover rounded inline-block shadow">
                                    @else
                                        <span class="text-gray-400 text-xs">No image</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                    <a href="{{ route('edit', $right->id) }}" class="bg-yellow-500 text-white rounded py-2 px-3 hover:bg-yellow-600 inline-block mr-2">Edit</a>
                                    
                                    <form action="{{ route('delete', $right->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white rounded py-2 px-3 hover:bg-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
                <!-- End Table -->

                <!-- Pagination -->
                <div class="my-6 flex justify-center">
                    {{ $rights->links() }}
                </div>
                <!-- End Pagination -->
        @if(session('success'))
            <div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-4 rounded-lg shadow-2xl flex items-center gap-3 animate-pulse max-w-md border-l-4 border-green-700">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <p class="font-bold text-sm">Success!</p>
                    <p class="text-xs">{{ session('success') }}</p>
                </div>
                <button onclick="this.parentElement.style.display='none'" class="ml-auto text-green-200 hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif
    </div>
</body>
</html>