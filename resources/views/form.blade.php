<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create / Edit Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">
        {{ isset($event) ? 'Edit Event' : 'Create Event' }}
    </h1>

    <form action="{{ isset($event) ? route('events.update', $event) : route('events.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @if(isset($event))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input name="title" value="{{ old('title', $event->title ?? '') }}" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
            <select name="status" class="shadow border rounded w-full py-2 px-3">
                <option value="published" {{ (old('status', $event->status ?? '') == 'published') ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ (old('status', $event->status ?? '') == 'draft') ? 'selected' : '' }}>Draft</option>
                <option value="pused" {{ (old('status', $event->status ?? '') == 'pused') ? 'selected' : '' }}>Pused</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Visibility</label>
            <select name="visibility" class="shadow border rounded w-full py-2 px-3">
                <option value="live" {{ (old('visibility', $event->visibility ?? '') == 'live') ? 'selected' : '' }}>Live</option>
                <option value="draft" {{ (old('visibility', $event->visibility ?? '') == 'draft') ? 'selected' : '' }}>Draft</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Start Date</label>
            <input name="start_date" value="{{ old('start_date', isset($event->start_date) ? $event->start_date->format('Y-m-d') : '') }}" type="date" class="shadow border rounded w-full py-2 px-3">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">End Date</label>
            <input name="end_date" value="{{ old('end_date', isset($event->end_date) ? $event->end_date->format('Y-m-d') : '') }}" type="date" class="shadow border rounded w-full py-2 px-3">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">URL</label>
            <input name="url" value="{{ old('url', $event->url ?? '') }}" type="text" class="shadow border rounded w-full py-2 px-3">
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                {{ isset($event) ? 'Update' : 'Create' }}
            </button>
            <a href="{{ route('events.index') }}" class="text-blue-500 hover:underline text-sm">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
