<?php

namespace App\Http\Livewire\Admin\Queue;

use App\Models\Queue;
use Livewire\Component;

class DashboardQueueAction extends Component
{
    public $queue;
    public $statusIsChange = false;
    
    public function render()
    {
        if($this->queue->status == 'in calling'){
            $this->statusIsChange = true;
        }
        return view('livewire.admin.queue.dashboard-queue-action');
    }
}
