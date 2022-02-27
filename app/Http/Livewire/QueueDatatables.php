<?php

namespace App\Http\Livewire;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use App\Models\Queue;
use Carbon\Carbon;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;

class QueueDatatables extends LivewireDatatable
{
    public $model = Queue::class;
    public $hideable = 'select';
    public function builder()
    {
        //
        return Queue::query()
        ->leftJoin('users','queues.user_id','users.id')
        ->leftJoin('doctors','queues.doctor_id','doctors.id')
        ->leftJoin('polies','queues.polies_id','polies.id')
        ->leftJoin('operations_days','queues.operations_day_id','operations_days.id');
    }

    public function columns()
    {
        //
        return [
            Column::name('users.name')
            ->label('Nama pasien')
            ->searchable(),
            Column::name('doctors.name')
            ->label('Nama Dokter')
            ->searchable(),
            Column::name('polies.name')
            ->label('Nama poli')
            ->searchable(),
            Column::name('operations_days.day')
            ->label('Hari Operasional'),
            Column::name('queues.status')
            ->label('Status'),
            Column::name('queues.payment')
            ->label('Pembayaran'),
            Column::name('queues.queueing_number')
            ->label('Nomor Antrian')
            ->searchable(),
            DateColumn::callback(["queues.date_visit"],function($date_visit){
                return $date_visit;
            })
            ->label('Tanggal datang')
            ->format('Y/m/d')
            ->searchable(),
            DateColumn::callback(["queues.open_at"],function($open_at){
                return $open_at;
            })
            ->label('Waktu Buka')
            ->format('h:i:s')
            ->searchable(),
            DateColumn::callback(["queues.closed_at"],function($closed_at){
                return $closed_at;
            })
            ->label('Waktu Tutup')
            ->format('h:i:s')
            ->searchable()
        ];
    }
}