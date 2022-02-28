@extends('admin.layouts.app')
@section('content')
    <div class="d-sm-flex align-items-center mb-4">
        @if ($breadcrumb)
        <h1 class="h3 mb-0 text-gray-800">{{Breadcrumbs::view('admin.partials.breadcrumbs',$breadcrumb, $queue->slug)}}</h1>
        @endif
    </div>
    <div class="w-full h-full border-2 border-blue-400 bg-white shadow-sm p-2 my-2 rounded">
        <livewire:admin.queue.dashboard-show-queue :queue="$queue"/>
    </div>
@endsection