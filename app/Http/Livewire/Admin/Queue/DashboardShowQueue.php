<?php

namespace App\Http\Livewire\Admin\Queue;

use App\Models\Queue;
use Livewire\Component;

class DashboardShowQueue extends Component
{
    public $queue;
    public $status;
    public $setPriceOrPayment;
    public function setPendingtoInCalling(){
        Queue::find($this->queue->id)->update(['status'=>'in calling']);
    }
    public function setPriceWithPayment(){
        if($this->setPriceOrPayment){
            $this->setPriceOrPayment = false;
        } else {
            $this->setPriceOrPayment = true;
        }
    }
    public function render()
    {
        if($this->queue->status == 'pending'){
            $this->status = 'menunggu';
        } elseif($this->queue->status == 'in calling'){
            $this->status = 'dalam panggilan';
        }
        return view('livewire.admin.queue.dashboard-show-queue');
    }
}
