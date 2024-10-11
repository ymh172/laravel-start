<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="py-10 max-w-[1000px] mx-auto">

    <a href="{{ route('product.create') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Create
        New Product</a>
    <a href="{{ route('category.index') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View
        Category</a>
    <form action="{{ route('product.search') }}" method="GET">
        <input type="text" name="query" placeholder="Search">
        <button type="submit">Search</button>
    </form>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $product->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $product->price }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->stock }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->description }}
                    </td>
                    <td class="px-6 py-4">

                        @foreach (json_decode($product->images) as $image)
                        <img src="{{ asset('storage/productImages/'.$image) }}" class="w-[100px]">


                        @endforeach
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->category->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->status }}
                    </td>
                    <td class="px-6 py-4">
                        <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                            href="{{ route('product.show', $product->id) }}">Detail</a>

                        <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                            href="{{ route('product.edit', $product->id) }}">Edit</a>

                        <form class="inline" action="{{ route('product.destroy', $product->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach



            </tbody>
        </table>
        <div class="my-5">
            {{ $products->links('pagination::tailwind') }}
        </div>
    </div>


</body>

</html>