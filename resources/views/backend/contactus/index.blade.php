@extends('backend.master')

@section('content')

<div class="p-8">
<div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">📬 Contact Messages</h2>
    <a href="{{ route('contactus.create') }}"
           class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition shadow">
            + Add Message
        </a>
</div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full text-left">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="py-3 px-4">#</th>
                    <th class="py-3 px-4">Full Name</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Request Type</th> {{-- ⭐ Added --}}
                    <th class="py-3 px-4">Message</th>
                    <th class="py-3 px-4">Date</th>
                    <th class="py-3 px-4 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($messages as $msg)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="py-3 px-4">{{ $msg->full_name }}</td>
                    <td class="py-3 px-4">{{ $msg->email }}</td>

                    {{-- ⭐ Request Type Value --}}
                    <td class="py-3 px-4 capitalize">
                        {{ $msg->request_type ?? 'N/A' }}
                    </td>

                    <td class="py-3 px-4">{{ Str::limit($msg->message, 40) }}</td>
                    <td class="py-3 px-4">{{ $msg->created_at->format('Y-m-d') }}</td>

                    <td class="py-3 px-4 text-center">
                        <form action="{{ route('contactus.destroy', $msg->id) }}" method="POST"
                              onsubmit="return confirm('Delete this message?');">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($messages->count() == 0)
                <tr>
                    <td colspan="7" class="text-center py-6 text-gray-500">
                        No messages found.
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $messages->links() }}
    </div>

</div>

@endsection
