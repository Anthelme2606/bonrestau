@extends('layouts.html')
@section('title','Home')
@section('body-container')
<link rel="stylesheet" href="{{asset('assets/css/home.css')}}?v=<?php echo time();?>">
<x-hero/>
<div class="product-section">
    <div class="container">
        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                <h2 class="mb-4 section-title">Basé sur l'excellence</h2>
                <p class="mb-4">Nous vous aiderons à suivre avec éfficacité les bons de restaurations payés chez nous </p>
                <p><a href="{{route('dashboard')}}" class="btn btn-primary px-4  rounded shadow">Suivie</a></p>
            </div> 
            <!-- End Column 1 -->

            <!-- Start Column 2 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <a class="product-item" href="cart.html">
                    <img src="{{asset('assets/images/dollar.jpg')}}"  class="img-fluid product-thumbnail">
                    <h3 class="product-title">Bon resto</h3>
                    <strong class="product-price">500</strong>

                    <span class="icon-cross">
                        <img src="{{asset('assets/images/dollar.jpg')}}"  class="img-fluid">
                    </span>
                </a>
            </div> 
            <!-- End Column 2 -->

            <!-- Start Column 3 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <a class="product-item" href="cart.html">
                    <img src="{{asset('assets/images/dollar.jpg')}}"  class="img-fluid product-thumbnail">
                    <h3 class="product-title">Bon resto</h3>
                    <strong class="product-price">1000</strong>

                    <span class="icon-cross">
                        <img src="{{asset('assets/images/dollar.jpg')}}"  class="img-fluid">
                    </span>
                </a>
            </div>
            <!-- End Column 3 -->

            <!-- Start Column 4 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <a class="product-item" href="cart.html">
                    <img src="{{asset('assets/images/dollar.jpg')}}"  class="img-fluid product-thumbnail">
                    <h3 class="product-title">Bon resto</h3>
                    <strong class="product-price">2000</strong>

                    <span class="icon-cross">
                        <img src="{{asset('assets/images/dollar.jpg')}}"  class="img-fluid">
                    </span>
                </a>
            </div>
           
        </div>
    </div>
</div> 

<div style="margin-bottom:40px;">
    <x-list-scroll/>
    <x-rotatings-cards/>
</div>

@include('layouts.footer')

@endsection
