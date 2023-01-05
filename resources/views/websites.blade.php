<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-500">
            {{ __('Website') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto">
            <form action="{{ route('websites.store') }}" method="post" class="mb-16">
                @csrf
                <input type="url" name="url" placeholder="https://example.com"
                    class="border-gray-300 shadow-sm sm:w-2/4 rounded-md sm:text-sm sm:leading-5 dark:bg-gray-700 dark:text-white dark:border-gray-600  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <x-button>add</x-button>
            </form>
            <div class="shadow overflow-y-scroll border-b border-gray-200 dark:border-gray-700 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-none">
                    <tr class="text-gray-400">
                        <th class="text-left font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">
                            ID</th>
                        <th class="text-left font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">
                            URL</th>
                        <th class="text-left font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">
                            Performance Avg(Desktop)</th>
                        <th class="text-left font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">
                            Performance Avg(Mobile)</th>
                        <th class="text-left font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">
                            Result(Desktop)</th>
                        <th class="text-left font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">
                            Result(Mobile)</th>
                        <th class="text-left font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">
                        </th>
                    </tr>

                    <tbody class="text-gray-600 dark:text-gray-100">
                        @foreach ($websites as $website)
                            <tr>
                                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                                    {{ $website->id }}
                                </td>
                                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800 ">
                                    <a href="{{ $website->url }}" class="hover:text-gray-400 dark:hover:text-yellow-200"
                                        target="_blank">{{ $website->url }}</a>

                                </td>

                                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                                    <p @class([
                                        'text-red-400' => $website->runpagespeeds_desktop_avg < 60,
                                        'text-green-500' => $website->runpagespeeds_desktop_avg >= 60,
                                    ])>{{ $website->runpagespeeds_desktop_avg }}</p>
                                </td>

                                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                                    <p @class([
                                        'text-red-400' => $website->runpagespeeds_mobile_avg < 60,
                                        'text-green-500' => $website->runpagespeeds_mobile_avg >= 60,
                                    ])>{{ $website->runpagespeeds_mobile_avg }}</p>
                                </td>

                                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                                    <a href="{{ route('websites.show', ['website' => $website]) }}?strategy=desktop&table[sorts][id]=desc"
                                        class="hover:text-gray-400 dark:hover:text-yellow-200 cursor-pointer border-b-2">
                                        {{ $website->runpagespeeds_desktop_count }}
                                    </a>
                                </td>
                                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                                    <a href="{{ route('websites.show', ['website' => $website]) }}?strategy=mobile&table[sorts][id]=desc"
                                        class="hover:text-gray-400 dark:hover:text-yellow-200 cursor-pointer border-b-2">
                                        {{ $website->runpagespeeds_mobile_count }}
                                    </a>
                                </td>

                                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                                    @livewire('delete-alert', ['name' => $website->url, 'website_id' => $website->id])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</x-app-layout>
