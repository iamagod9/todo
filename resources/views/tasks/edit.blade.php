<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('task.my_task') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4 text-white">
          {{ isset($task) ? 'Редактировать задачу' : 'Новая задача' }}
        </h2>

        <form action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}" method="POST">
          @csrf
          @if (isset($task)) @method('PUT') @endif

          <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 mb-2">Название</label>
            <input type="text" name="title" value="{{ $task->title ?? old('title') }}"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 mb-2">Описание</label>
            <textarea name="description" rows="3"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $task->description ?? old('description') }}</textarea>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 mb-2">Статус</label>
            <select name="status"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
              @foreach(App\Enums\TaskStatus::cases() as $status)
          <option value="{{ $status->value }}">
          {{ $status->label() }}
          </option>
        @endforeach
            </select>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 mb-2">Статус</label>
            <input type="datetime-local" name="deadline" value="{{ $task->deadline ?? old('deadline') }}"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>

          <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Сохранить
          </button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>