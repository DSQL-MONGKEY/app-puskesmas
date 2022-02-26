<?php

namespace App\Http\Livewire;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use App\Models\Queue;
use Mediconesystems\LivewireDatatables\Column;
class QueueDatatables extends LivewireDatatable
{
    public $model = Queue::class;
    public function builder()
    {
        //
        return Queue::query()
        ->leftJoin('users','queues.user_id','users.id')
        ->leftJoin('doctors','queues.doctor_id','doctors.id')
        ->leftJoin('polies','queues.polies_id','polies.id')
        ->leftJoin('operations','queues.operation_id','operations.id')
        ->leftJoin('operations_days','queues.operations_day_id','operations_days.id');
    }

    public function columns()
    {
        //
        return [
            Column::name('users.name')
            ->label('Nama pasien'),
            Column::name('doctors.name')
            ->label('Nama Dokter'),
            Column::name('polies.name')
            ->label('Nama poli'),
            Column::name('operations_days.day')
            ->label('Hari Operasional'),
            Column::name('operations.open_at')
            ->label('Jam Awal'),
            Column::name('operations.closed_at')
            ->label('Jam Akhir'),
            Column::name('queues.queueing_number')
            ->label('Nomor Antrian')
        ];
    }
}