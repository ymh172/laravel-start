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
    {{-- {{ $categories }} --}}
    <a href="{{ route('category.create') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Create New Category</a>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Player Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Team Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $player->player_name }}
                        </th>
                        <td class="px-6 py-4">
                            {{  $player->team->team_name }}
                        </td>
{{--
                        <td class="px-6 py-4">
                            <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('category.edit', $category) }}">Edit</a>
                            <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('category.edit', $category) }}">Detail</a>

                            <form class="inline" action="{{ route('category.destroy', $category) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach



            </tbody>
        </table>
        <div class="px-6 py-4">
            {{-- {{ $categories->links('pagination::tailwind') }} --}}

        </div>
    </div>


</body>

</html>
