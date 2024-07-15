@extends('layouts.index')
@include('layouts.dash-head')
@section('title','Generation du lien')
@section('sidebar')
<x-sidebar/>

@endsection
@section('navbar')
<x-navbar/>
@endsection 

@section('sidebar-container')
<style>
    .side-container-bg{
        background:rgba(245,251,252,1);
    }
      
        </style>
</head>

<body>
    <div class="container">
      <div class="header-gen w-100">
      <div class="d-flex justify-content-between"></div>
      </div>
      
      
    </div>

   
   @endsection