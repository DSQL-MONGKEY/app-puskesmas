<div>
    <div class="flex justify-center mt-10">
        <h1 class="box-decoration-slice bg-gradient-to-r from-indigo-600 to-pink-500 text-white p-2 rounded-lg text-light font-semibold text-2xl">Registrasi antrian</h1>
    </div>
    <form action="" method="POST" class="w-96 mx-auto border-4 shadow-slate-500 shadow-xl border-cyan-500 rounded-xl p-4 bg-white rounded-xl mt-3 mb-16">
        @csrf
    
    <div class="form-group bg-gray-200 rounded-md p-2 px-2 mb-3" autofocus>
        <label for="polies_id" class="block text-gray-500 font-semibold">Specialist</label>
        <select name="polies_id" id="polies_id" wire:model="poliesId" class="p-2 rounded w-full text-base border-transparent focus:border-transparent focus:ring-0">
            @foreach ($polies as $key => $poly)
                <option value="{{ $poly->id }}">{{ $poly->name }}</option>
            @endforeach
        </select>
        @error('polies_id')
            <p class="text-sm italic font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group bg-gray-200 rounded-md p-2 px-2 mb-2">
        <label for="doctorId" class="block text-gray-500 font-semibold">Doctor</label>
        <select name="doctor_id" id="doctorId" class="p-2 rounded w-full text-base border-transparent focus:border-transparent focus:ring-0" wire:model="doctorId">
            @foreach ($doctors as $key => $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
            @endforeach
        </select>
        @error('doctor_id')
        <p class="text-sm italic font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group bg-gray-200 rounded-md p-2 px-2 mb-2">
        <label for="operationsDayId" class="block text-gray-500 font-semibold">Hari Operasional</label>
        <select name="operations_day_id" id="operationsDayId" wire:model="operationsDayId" class="p-2 rounded w-full text-base border-transparent focus:border-transparent focus:ring-0">
            @foreach ($operationsDays as $key => $operationsDay)
                <option value="{{ $operationsDay->id }}">{{ $operationsDay->day }}</option>
            @endforeach
        </select>
        @error('operations_day_id')
        <p class="text-sm italic font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group bg-gray-200 rounded-md p-2 px-2 mb-2">
        <label for="operationId" class="block text-gray-500 font-semibold">Jam Operasional</label>
        <select name="operations_id" id="operationId" wire:model="operationId" class="rounded w-full p-2 text-base border-transparent focus:border-transparent focus:ring-0">
            @foreach ($operations as $key => $operation)
                <option value="{{ $operation->id }}">{{ $operation->open_at.'-'.$operation->closed_at }}</option>
            @endforeach
        </select>
        @error('operation_id')
        <p class="text-sm italic font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>
    @if (auth()->user()->nomor_bpjs == null)
    <div class="form-group bg-gray-200 font-medium text-gray-900 rounded-md p-3 mb-2">
        *Anda akan diperiksa dalam status pembayaran pribadi dan tidak menggunakan bpjs, jika ingin menggunakan bpjs, silahkan update data anda dibagian profile!
    </div>
    @endif
    <div class="kosong">
        <button type="submit" class="p-2 bg-yellow-400 rounded items-center w-full font-semibold transition ease-in-out hover:bg-blue-500 duration-500 hover:text-white" >Daftar</button>
    </div>
    </form>
</div>
