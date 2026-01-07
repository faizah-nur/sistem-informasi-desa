<div class="bg-gray-100 rounded-lg p-4 max-h-[400px] overflow-y-auto mb-4" id="chat-box">
    @forelse ($pengajuan->messages as $msg)
        @if ($msg->sender_role === 'admin')
            <!-- ADMIN -->
            <div class="flex justify-start mb-2">
                <div class="bg-green-500 text-white px-4 py-2 rounded-lg max-w-[70%]">
                    <div class="text-xs font-semibold mb-1">Admin</div>
                    <div>{{ $msg->pesan }}</div>
                    <div class="text-[10px] text-blue-50 mt-1 text-right">
                        {{ $msg->created_at->format('d M Y H:i') }}
                    </div>
                </div>
            </div>
        @else
            <!-- WARGA -->
            <div class="flex justify-end mb-2">
                <div class="bg-white border px-4 py-2 rounded-lg max-w-[70%]">
                    <div class="text-xs font-semibold mb-1 text-green-600">
                        {{ $msg->user->name ?? 'Warga' }}
                    </div>
                    <div>{{ $msg->pesan }}</div>
                    <div class="text-[10px] text-gray-400 mt-1 text-right">
                        {{ $msg->created_at->format('d M Y H:i') }}
                    </div>
                </div>
            </div>
        @endif
        <div id="komentar"></div>
    @empty
        <p class="text-center text-gray-500 text-sm">
            Belum ada percakapan
        </p>
    @endforelse
</div>

{{-- kirim pesan --}}
<form method="POST" action="{{ route('pengajuan.messages.store', $pengajuan->id) }}#komentar">
    @csrf

    <div class="flex gap-2">
        <textarea
            name="pesan"
            rows="2"
            required
            placeholder="Tulis pesan..."
            class="w-full rounded-md border-green-300 focus:ring focus:ring-green-200"
        ></textarea>

        <button
            type="submit"
            class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700"
        >
            Kirim
        </button>
    </div>
</form>
