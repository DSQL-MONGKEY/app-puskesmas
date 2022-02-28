<div>
    {{-- The best athlete wants his opponent at his best. --}}
    @if ($status == 'pending')
        <button wire:click="setPendingtoInCalling" class="w-full p-2 rounded bg-blue-400 text-white">dalam panggilan</button>
    @elseif($status == 'in calling')
        <a href="/dashboard/queue/{{ $slug }}" class="w-full p-2 rounded bg-blue-400 text-white">Tampil</a>
    @endif
</div>
