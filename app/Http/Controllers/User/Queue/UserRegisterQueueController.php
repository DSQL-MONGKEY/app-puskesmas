<?php

namespace App\Http\Controllers\User\Queue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRegisterQueueController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

    }
    public function addQueue(){
        return view('user.queue.add',[
            'title'=>'Add Queue user page'
        ]);
    }
}
