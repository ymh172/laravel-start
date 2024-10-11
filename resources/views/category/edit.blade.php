<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    {{-- {{ $cateogry }} --}}
    <form method="POST" action="{{ route('category.update',$category) }}" class="w-full max-w-sm mx-auto"   >
        @method('PUT')
        @csrf
        <div class="grid gap-6 mb-6  ">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <input value="{{ old('category',$category->category) }}" type="text" name="category" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('category') border-red-500

                @enderror" placeholder="Product Name"  />
                @error('category')
                   <p class="text-red-500"> {{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <input value="{{ old('description',$category->description) }}" type="text" id="price" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                @error('description')
                   border-red-500
                @enderror" placeholder="500"  />
                @error('description')
                   <p class="text-red-500"> {{ $message }}</p>
                @enderror
            </div>


        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
    </form>

</body>
</html>
