<div>
    <div class="flex flex-wrap ">
        <div class="w-2/5 h-[300px] shadow-sm rounded flex items-center justify-center">
            <div class="kotak-content ">
                <h1 class="text-center text-6xl">{{ $queue->queueing_number }}</h1>
                <p class="text-2xl">{{ $queue->user->name }}</p>
            </div>
        </div>
        <div class="w-3/5 h-[300px] flex items-center">
            <div class="kotak-content ml-3 w-full">
                <p class="border mb-2 p-2 shadow-sm rounded">Poly : {{ $queue->polies->name }}</p>
                <p class="border mb-2 p-2 shadow-sm rounded">Dokter : {{ $queue->doctor->name }}</p>
                <p class="border mb-2 p-2 shadow-sm rounded">Jam : {{ $queue->open_at.'-'.$queue->closed_at }}</p>
                @if ($queue->status == 'pending')
                <p class="border mb-2 p-2 shadow-sm rounded ">Status :  <span class="text-yellow-400">{{ $status }}</span></p>
                @else
                <p class="border mb-2 p-2 shadow-sm rounded ">Status :  <span class="text-blue-400">{{ $status }}</span></p>
                @endif
                <p class="border mb-2 p-2 shadow-sm rounded">Pembayaran : {{ $queue->payment }}</p>
                <p class="border mb-2 p-2 shadow-sm rounded">Tanggal : {{ \Carbon\Carbon::parse($queue->date_visit)->format('Y/m/d').' '.$queue->operations_day->day }}</p>
            </div>
        </div>
    </div>
    <div class="w-full h-full mt-2 ">
        @if ($queue->status == 'pending')
            <button wire:click.prevent="setPendingtoInCalling" class="w-full p-2 rounded bg-blue-400    text-white">dalam panggilan</button>
        @else 
            <p class="p-2 shadow rounded">Sudah berada dalam panggilan <button wire:click.prevent="setPriceWithPayment" class="ml-2 py-2 px-3 bg-blue-300 rounded text-center text-white">
                @if ($setPriceOrPayment)
                <i class="fa-solid fa-rectangle-xmark"></i>
                @else
                <i class="fa-solid fa-bars"></i>
                @endif
                </button>
            </p>
        @endif
    </div>
    @if ($setPriceOrPayment)
        <div class="w-full mt-2">
            mantap
        </div>
    @endif
</div>
