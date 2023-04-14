<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Upcoming Classes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900 max-w-2xl divide-y">
                    @forelse ($scheduledClasses as $class)
                  <div class="py-6">
                     <div class="flex gap-6 justify-between">
                        <div>
                           <p class="text-2xl font-bold text-purple-700">{{ $class->classType->name }}</p>
                           <span class="text-slate-600 text-sm">{{ $class->classType->minutes }} minutes</span>
                        </div>
                        <div class="text-right flex-shrink-0">
                           <p class="text-lg font-bold">{{ $class->date_time->format('g:i a') }}</p>
                           <p class="text-sm">{{ $class->date_time->format('jS M') }}</p>
                        </div>
                     </div>
                     @can('delete', $class)
                     <div class="mt-1 text-right">
                        <form method="post" action="{{ route('schedule.destroy', $class) }}">
                           @csrf
                           @method('DELETE')
                           <x-danger-button class="px-3 py-1">Cancel</x-danger-button>
                        </form>
                     </div>
                     @endcan
                  </div>
                  @empty
                  <div>
                     <p>You don't have any upcoming classes</p>
                     <a class="inline-block mt-6 underline text-sm" href="{{ route('schedule.create') }}">
                        Schedule now
                     </a>
                  </div>
                  @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
