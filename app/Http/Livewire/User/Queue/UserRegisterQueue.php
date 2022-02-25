<?php

namespace App\Http\Livewire\User\Queue;

use App\Models\DetailOperationsDoctor;
use App\Models\DetailOperationsPoly;
use App\Models\Doctor;
use App\Models\Operation;
use App\Models\OperationsDay;
use App\Models\Polies;
use Livewire\Component;

class UserRegisterQueue extends Component
{
    public $poliesId;
    public $doctorId;
    public $operationId;
    public $operationsDayId;

    // data
    public $polies;
    public $doctors;
    public $operations;
    public $operationsDays;
    public function mount(){
        $this->poliesId = 1;
        $this->doctorId = 1;
        $this->operationId = 1;
        $this->operationsDayId = 1;
        $this->polies = Polies::all();
    }
    public function render()
    {
        if(!is_null($this->poliesId)){
            $this->doctors = Doctor::search()->where('polies_id',$this->poliesId)->get();
            $this->operationsDays = OperationsDay::whereIn('id',DetailOperationsPoly::where('polies_id',$this->poliesId)->get()->pluck('operations_day_id'))->get();
        }
        if($this->doctorId != null){
            $this->operations = Operation::whereIn('id',DetailOperationsDoctor::where('doctor_id',$this->doctorId)->get()->pluck('operation_id'))->get();
        }
        return view('livewire.user.queue.user-register-queue');
    }
}
