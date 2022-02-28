<?php
use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard',function(BreadcrumbTrail $trail){
    $trail->push('Dashboard','/dashboard');
});
Breadcrumbs::for('dashboard.queue',function(BreadcrumbTrail $trail){
    $trail->parent('dashboard')->push('Queue','/dashboard/queue');
});
Breadcrumbs::for('dashboard.queue.show',function(BreadcrumbTrail $trail, $queue){
    $trail->parent('dashboard.queue')->push($queue,'/dashboard/queue/'.$queue);
});