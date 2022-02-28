<?php

namespace App\Http\Livewire\Admin\Queue;

use Livewire\Component;

class DashboardQueueAction extends Component
{
    public $status;
    public $slug;
    public function render()
    {
        dd($this->status, $this->slug);
        return view('livewire.admin.queue.dashboard-queue-action');
    }
}
