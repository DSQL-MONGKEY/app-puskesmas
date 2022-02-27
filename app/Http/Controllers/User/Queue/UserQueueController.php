<?php

namespace App\Http\Controllers\User\Queue;

use App\Http\Controllers\Controller;
use App\Models\Operation;
use App\Models\OperationsDay;
use App\Models\Queue;
use Carbon\Carbon;
use Faker\Factory;
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
        ]);
        // $datetime = [
        //     'open_at'=>Carbon::createFromFormat('Y-m-l h:i:s', Carbon::now()->year.'-'.Carbon::now()->month.'-'.OperationsDay::find($validatedData['operations_day_id'])->day.' '.Carbon::createFromFormat('h:i:s', '07:00:00')->format('h:i:s'))->format('Y-m-d h:i:s'),
        //     'closed_at'=>Carbon::createFromFormat('Y-m-l h:i:s', Carbon::now()->year.'-'.Carbon::now()->month.'-'.OperationsDay::find($validatedData['operations_day_id'])->day.' '.Carbon::createFromFormat('h:i:s', '12:00:00')->format('h:i:s'))->format('Y-m-d h:i:s')];
        $queue = Queue::select('*')->get();
        $payment = (is_null(auth()->user()->nomor_bpjs)) ? 'cash' : 'bpjs';
        if($queue->count() == 0){
            Queue::create([
                'user_id'=>auth()->user()->id,
                'polies_id'=>$validatedData['polies_id'],
                'doctor_id'=>$validatedData['doctor_id'],
                'operations_day_id'=>$validatedData['operations_day_id'],
                'date_visit'=>Carbon::createFromFormat('Y-m-l', Carbon::now()->year.'-'.Carbon::now()->month.'-'.OperationsDay::find($validatedData['operations_day_id'])->day)->format('Y-m-d'),
                'open_at'=>Carbon::createFromFormat('H:i:s','07:00:00')->format('H:i:s'),
                'closed_at'=>Carbon::createFromFormat('H:i:s','13:00:00')->format('H:i:s'),
                'queueing_number'=>1,
                'payment'=>$payment,
                'slug'=>Factory::create('id_ID')->uuid()
            ]);
            return redirect('/queue')->with('successRegister','Anda sudah berhasil membuat antrean, tunggu hingga tepat pada tanggalnya untuk datang ke puskesmas!');
        } else {
            if(is_null(Queue::where('user_id',auth()->user()->id)->first())){
                if(Queue::where([
                    'polies_id'=>$validatedData['polies_id'],
                    'operations_day_id'=>$validatedData['operations_day_id'],
                ])->get()->count() != 0){
                    $nomorQueue = Queue::where([
                        'polies_id'=>$validatedData['polies_id'],
                        'operations_day_id'=>$validatedData['operations_day_id'],
                    ])->max('queueing_number');
                    Queue::create([
                        'user_id'=>auth()->user()->id,
                        'polies_id'=>$validatedData['polies_id'],
                        'doctor_id'=>$validatedData['doctor_id'],
                        'operations_day_id'=>$validatedData['operations_day_id'],
                        'date_visit'=>Carbon::createFromFormat('Y-m-l', Carbon::now()->year.'-'.Carbon::now()->month.'-'.OperationsDay::find($validatedData['operations_day_id'])->day)->format('Y-m-d'),
                        'open_at'=>Carbon::createFromFormat('H:i:s','07:00:00')->format('H:i:s'),
                        'closed_at'=>Carbon::createFromFormat('H:i:s','13:00:00')->format('H:i:s'),
                        'queueing_number'=>++$nomorQueue,
                        'payment'=>$payment,
                        'slug'=>Factory::create('id_ID')->uuid()
                    ]);
                    return redirect('/queue')->with('successRegister','Anda sudah berhasil membuat antrean, tunggu hingga tepat pada tanggalnya untuk datang ke puskesmas!');
                } else {
                    Queue::create([
                        'user_id'=>auth()->user()->id,
                        'polies_id'=>$validatedData['polies_id'],
                        'doctor_id'=>$validatedData['doctor_id'],
                        'operations_day_id'=>$validatedData['operations_day_id'],
                        'date_visit'=>Carbon::createFromFormat('Y-m-l', Carbon::now()->year.'-'.Carbon::now()->month.'-'.OperationsDay::find($validatedData['operations_day_id'])->day)->format('Y-m-d'),
                        'open_at'=>Carbon::createFromFormat('H:i:s','07:00:00')->format('H:i:s'),
                        'closed_at'=>Carbon::createFromFormat('H:i:s','13:00:00')->format('H:i:s'),
                        'queueing_number'=>1,
                        'payment'=>$payment,
                        'slug'=>Factory::create('id_ID')->uuid()
                    ]);
                    return redirect('/queue')->with('successRegister','Anda sudah berhasil membuat antrean, tunggu hingga tepat pada tanggalnya untuk datang ke puskesmas!');
                }
            } else {
                return redirect('/queue')->with('failedRegister','Anda sudah membuat sebuah antrian!');
            }
        }
    }
}
