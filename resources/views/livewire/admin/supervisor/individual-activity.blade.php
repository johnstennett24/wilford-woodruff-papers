<div wire:init="loadStats">

    <div class="mx-auto mt-4 max-w-7xl">
        <div class="pt-4 pb-0">

            <h1 class="mb-2 text-2xl font-semibold">
                Individual Activity
            </h1>

            <form wire:submit.prevent="update" class="flex gap-x-4">
                <div>
                    <label for="user" class="block text-sm font-medium text-gray-700">User Name</label>
                    <div class="mt-1">
                        <select wire:model="currentUserId"
                               id="currentUserId"
                               class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm focus:border-indigo-500 focus:ring-indigo-500"
                        >
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <label for="start" class="block text-sm font-medium text-gray-700">Starting Date</label>
                    <div class="mt-1">
                        <input wire:model.defer="dates.start"
                               id="start"
                               type="date"
                               class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm focus:border-indigo-500 focus:ring-indigo-500"
                        />
                    </div>
                </div>
                <div>
                    <label for="end" class="block text-sm font-medium text-gray-700">Ending Date</label>
                    <div class="mt-1">
                        <input wire:model.defer="dates.end"
                               id="end"
                               type="date"
                               class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm focus:border-indigo-500 focus:ring-indigo-500"
                        />
                    </div>
                </div>
                <div>
                    <button type="submit"
                            class="inline-flex justify-center items-center py-2 px-8 mt-6 text-sm font-medium text-gray-700 bg-white rounded-md border border-gray-300 shadow-sm sm:ml-3 xl:ml-0 xl:w-full hover:bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none"
                    >
                        Update
                    </button>
                </div>
            </form>

            <div class="relative my-12">
                <div wire:loading
                     class="absolute w-full h-full bg-white opacity-75"
                >
                    <div class="flex justify-center py-40">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24 animate-spin">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>

                    </div>
                </div>

                <div>
                    @foreach($activities as $key => $activity)
                        <div class="mb-12">
                            <div>
                                <div class="my-2">
                                    @if(count($activity['stats']) > 0)
                                        <h2 class="text-xl font-semibold">
                                            {{ str($key)->snake()->replace('_', ' ')->title() }} Task Stats
                                        </h2>
                                        <table class="divide-y divide-gray-30">
                                            <thead class="bg-black">
                                            <tr>
                                                <th class="py-3.5 pr-3 pl-4 text-sm font-semibold text-left text-white sm:pl-6">Steps</th>
                                                <th class="py-3.5 pr-3 pl-4 text-sm font-semibold text-center text-white sm:pl-6">Letters<br/>(pages)</th>
                                                <th class="py-3.5 pr-3 pl-4 text-sm font-semibold text-center text-white sm:pl-6">Discourses<br/>(pages)</th>
                                                <th class="py-3.5 pr-3 pl-4 text-sm font-semibold text-center text-white sm:pl-6">Journals<br/>(pages)</th>
                                                <th class="py-3.5 pr-3 pl-4 text-sm font-semibold text-center text-white sm:pl-6">Additional<br/>(pages)</th>
                                                <th class="py-3.5 pr-3 pl-4 text-sm font-semibold text-center text-white sm:pl-6">Autobiographies<br/>(pages)</th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white">
                                            @foreach($activity['stats'] as $taskName => $stat)
                                                <tr>

                                                    <td class="py-3.5 pr-3 pl-4 text-sm font-semibold text-left text-gray-900 sm:pl-6">
                                                        {{ str($taskName) }}
                                                    </td>

                                                    @foreach($docTypes as $docType)
                                                        <td class="text-sm font-semibold text-center text-gray-900">
                                                            <div class="flex flex-col">
                                                                <div>
                                                                    {{ $stat->where('document_type', $docType)->first()?->total ?? 0}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @endforeach

                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot></tfoot>
                                        </table>
                                    @endif
                                </div>
                            </div>
                            <div>
                                @if(count($activity['tasks']) > 0)
                                    <div class="flex flex-col mt-8">
                                        <h1 class="py-1 text-xl font-semibold">
                                            {{ str($key)->snake()->replace('_', ' ')->title() }} Task List
                                        </h1>
                                        <div class="">
                                            <table>
                                                <thead></thead>
                                                <tbody class="bg-white">
                                                @foreach($activity['tasks'] as $task)
                                                    <tr>
                                                        <td class="py-2 px-3">
                                                            <span class="inline-flex">
                                                                {{ $task->pcf_unique_id_full }}
                                                            </span>

                                                        </td>
                                                        <td class="py-2 px-3">
                                                            <a href="{{ route('admin.dashboard.document', ['item' => $task]) }}"
                                                               class="font-medium text-indigo-600 capitalize"
                                                               target="_blank"
                                                            >
                                                                {{ $task->name }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot></tfoot>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
