<?php

namespace App\Http\Controllers\User\Queue;

use App\Http\Controllers\Controller;
use App\Models\Operation;
use App\Models\OperationsDay;
use App\Models\Queue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserQueueController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('user.queue.index',[
            'title'=>'All queue user page'
        ]);
    }
    public function create(){
        return view('user.queue.add',[
            'title'=>'Add Queue user page'
        ]);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'polies_id'=>['required'],
            'doctor_id'=>['required'],
            'operations_day_id'=>['required'],
            'operations_id'=>['required']
        ]);
        $queue = Queue::select('*')->get();
        if($queue->count() == 0){
            dd(Carbon::createFromFormat('Y-m-l h:i:s', Carbon::now()->year.'-'.Carbon::now()->month.'-'.OperationsDay::find($validatedData['operations_day_id'])->day.' '.Carbon::parse(Operation::find($validatedData['operations_id'])->open_at)->format('h:i:s'))->format('Y-m-d h:i:s'));
            // dd(Carbon::now()->format('Y-F-l'));
            Queue::create([
                'user_id'=>auth()->user()->id,
                'polies_id'=>$validatedData['polies_id'],
                'doctor_id'=>$validatedData['doctor_id'],
                'operations_day_id'=>$validatedData['operations_day_id'],
                'operation_id'=>$validatedData['operations_id'],
                'queueing_number'=>1
            ]);
            return redirect('/queue');
        } else {
            if(is_null(Queue::where([
                'user_id'=>auth()->user()->id,
                'polies_id'=>$validatedData['polies_id']
            ])->first())){
                if(Queue::where([
                    'polies_id'=>$validatedData['polies_id'],
                    'operations_day_id'=>$validatedData['operations_day_id'],
                    'operation_id'=>$validatedData['operations_id']
                ])->get()->count() != 0){
                    $nomorQueue = Queue::where([
                        'polies_id'=>$validatedData['polies_id'],
                        'operations_day_id'=>$validatedData['operations_day_id'],
                        'operation_id'=>$validatedData['operations_id']
                    ])->max('queueing_number');
                    Queue::create([
                        'user_id'=>auth()->user()->id,
                        'polies_id'=>$validatedData['polies_id'],
                        'doctor_id'=>$validatedData['doctor_id'],
                        'operations_day_id'=>$validatedData['operations_day_id'],
                        'operation_id'=>$validatedData['operations_id'],
                        'queueing_number'=>++$nomorQueue
                    ]);
                    return redirect('/queue');
                } else {
                    Queue::create([
                        'user_id'=>auth()->user()->id,
                        'polies_id'=>$validatedData['polies_id'],
                        'doctor_id'=>$validatedData['doctor_id'],
                        'operations_day_id'=>$validatedData['operations_day_id'],
                        'operation_id'=>$validatedData['operations_id'],
                        'queueing_number'=>1
                    ]);
                    return redirect('/queue');
                }
            } else {
                return redirect('/queue');
            }
        }
    }
}
