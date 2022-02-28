<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Queue;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('adminguest:admin');
    }
    public function index(){
        return view('admin.dashboard.index',[
            'title'=>'Dashboard admin',
            'breadcrumb'=>'dashboard'
        ]);
    }
    public function queue(){
        return view('admin.dashboard.queue.index',[
            'title'=>'All list queue',
            'breadcrumb'=>'dashboard.queue'
        ]);
    }
    public function showQueue(Queue $queue){
        return view('admin.dashboard.queue.show',[
            'title'=>'Show detail queue',
            'breadcrumb'=>'dashboard.queue.show',
            'queue'=>$queue
        ]);
    }
}
