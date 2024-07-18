@extends('layouts.index')
@section('title','Dashboard')
@section('sidebar')
<x-sidebar/>
@endsection
@section('navbar')
<x-navbar/>
@endsection

@section('sidebar-container')
@if(Auth::check())
@if(Auth::check() && Auth::user()->user_type === "admin" && isset($clients))
<x-dashboard-container 
:usersbuy="$usersbuy"
:clients="$clients" 
:profondeurs="$profondeurs"
:relationnels="$relationnels"
:qteT="$qteT" 
:coupons="$coupons"
:bmsc="$bmsc"
:counts="$counts"
:qteV="$qteV" 
:counterbon="$counterbon"
:ventes="$ventes"/>

@else
@include('clients.dashboard',['profondeurs'=>$profondeurs,
'relationnels'=>$relationnels,
'usersbuy'=>$usersbuy])
@endif
@endif
@include('layouts.auth-code')
<script>
  const sides=document.querySelectorAll('.side-container-bg');
sides.forEach((side)=>{
  side.classList.remove('p-0');
})
</script>
@endsection

