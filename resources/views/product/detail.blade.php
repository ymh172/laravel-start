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

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Column
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Data
                    </th>

                </tr>
            </thead>
            <tbody>

                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Name
                        </th>
                        <td class="px-6 py-4">
                            {{ $product->name }}
                        </td>
                    </tr>
                    <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Price
                    </th>
                    <td class="px-6 py-4">
                        {{ $product->price }}
                    </td>
                </tr>
                <tr
                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Description
                </th>
                <td class="px-6 py-4">
                    {{ $product->description }}
                </td>
            </tr>
            <tr
            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
            <th scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Category
            </th>
            <td class="px-6 py-4">
                {{ $product->category->category }}
            </td>
        </tr>
        <tr
        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
        <th scope="row"
            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            Status
        </th>
        <td class="px-6 py-4">
            {{ $product->status }}
        </td>
    </tr>




            </tbody>
        </table>
    </div>


</body>

</html>
