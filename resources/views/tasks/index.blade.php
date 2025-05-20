<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('task.my_task') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex justify-end mb-4">
        <a href="{{ route('tasks.create') }}"
          class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
          Создать задачу
        </a>
      </div>

      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
          @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
        {{ session('success') }}
        </div>
      @endif

          <div class="space-y-4">
            @foreach ($tasks as $task)
        <div class="border-b border-gray-200 pb-4">
          <h3 class="text-lg font-semibold text-white">{{ $task->title }}</h3>
          <p class="text-gray-600 text-white">{{ $task->description }}</p>
          <div class="flex space-x-2 mt-2">
          <a href="{{ route('tasks.edit', $task->id) }}"
            class="text-yellow-600 hover:text-yellow-800">Изменить</a>
          <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-800">Удалить</button>
          </form>
          </div>
        </div>
      @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>