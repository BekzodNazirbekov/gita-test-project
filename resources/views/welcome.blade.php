<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-2">LMS Dashboard</h1>
    <p class="text-sm text-gray-500 mb-6">Home / Events</p>

    <!-- Filter Section -->
    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-xl font-semibold mb-4">Filter</h2>
        <form method="GET" action="/" class="flex flex-wrap gap-4">
            <input type="text" name="title" placeholder="Title" value="{{ request('title') }}" class="border rounded px-4 py-2 w-full md:w-1/4">
            <select name="status" class="border rounded px-4 py-2 w-full md:w-1/4">
                <option value="">Select Status</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
            <input type="date" name="start_date" value="{{ request('start_date') }}" class="border rounded px-4 py-2 w-full md:w-1/4">
            <button type="submit" class="bg-purple-500 text-white px-4 py-2 rounded">Filter</button>
            <a href="/" class="bg-gradient-to-r from-red-400 to-orange-400 text-white px-4 py-2 rounded">Clear</a>
        </form>
    </div>

    <!-- Event Table -->
    <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Events</h2>
            <div class="flex gap-2">
                <form method="POST" action="{{ route('events.destroy', 0) }}" onsubmit="return confirm('Delete selected?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-gradient-to-r from-red-400 to-orange-400 text-white px-4 py-2 rounded">Delete</button>
                </form>
                <a href="{{ route('events.create') }}" class="bg-purple-500 text-white px-4 py-2 rounded">+ Add Event</a>
            </div>
        </div>
        <table class="w-full table-auto">
            <thead>
                <tr class="text-left text-sm text-gray-600 border-b">
                    <th class="py-2">Select</th>
                    <th class="py-2">Title</th>
                    <th class="py-2">Status</th>
                    <th class="py-2">Visibility</th>
                    <th class="py-2">Start Date</th>
                    <th class="py-2">End Date</th>
                    <th class="py-2">Copy URL</th>
                    <th class="py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2"><input type="checkbox" name="selected[]" value="{{ $event->id }}"></td>
                    <td class="py-2">{{ $event->title }}</td>
                    <td class="py-2 {{ $event->status == 'published' ? 'text-green-600' : 'text-red-600' }}">{{ ucfirst($event->status) }}</td>
                    <td class="py-2">
                        <span class="bg-{{ $event->visibility == 'live' ? 'green' : 'red' }}-100 text-{{ $event->visibility == 'live' ? 'green' : 'red' }}-600 text-xs px-2 py-1 rounded">
                            {{ ucfirst($event->visibility) }}
                        </span>
                    </td>
                    <td class="py-2">{{ $event->start_date?->format('M d, Y') }}</td>
                    <td class="py-2">{{ $event->end_date?->format('M d, Y') }}</td>
                    <td class="py-2 text-orange-400">
                        <button onclick="navigator.clipboard.writeText('{{ $event->url }}')">📋</button>
                    </td>
                    <td class="py-2 flex gap-2">
                        <a href="{{ route('events.edit', $event) }}" class="text-gray-500">✏️</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-500">🗑️</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-4">
            <div class="text-sm">Show result:
                <select class="border rounded px-2 py-1 ml-2">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
            </div>
            <div class="flex gap-2">
                {{ $events->links() }}
            </div>
        </div>
    </div>
</div>
</body>
</html>
