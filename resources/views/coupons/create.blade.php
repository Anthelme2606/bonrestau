@extends('layouts.page')
@section('tittle', 'Bon-Creation')
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/auth/css/auth.css') }}">
    <script src="{{ asset('assets/auth/js/auth.js') }}"></script>
    <style>
        .disposition {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }

        .update-form {
            width: 100%;
            height: 100%;

        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-info">
                    <h4 class="alert-heading">Create Your Restaurant Voucher</h4>
                    <p>
                        Welcome! You are just a few steps away from creating a voucher for your restaurant. 
                        Please fill in the required details to generate a personalized voucher that your customers can use to enjoy discounts and special offers.
                    </p>
                    <hr>
                    <p class="mb-0">
                        <strong>Instructions:</strong>
                        <ul>
                            <li>Enter the voucher value (price) that customers can redeem.</li>
                            <li>Specify the expiration date for the voucher.</li>
                            <li>Once completed, click on the 'Create Voucher' button to finalize.</li>
                        </ul>
                    </p>
                    <p>
                        Need help? Contact our support team at <a href="mailto:christianedorh@gmail.com">support</a>.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
            <div class=" form-container">
            <form class="form" id="ajaxForm" method="post" action="{{ route('bon-store') }}">
                 @csrf
                @method('POST')
                <div class="mb-1">
                    <h2 class="">Bon</h2>
                </div>

                <div class="mb-1">
                    <label for="valeur">Value</label>
                    <input type="number" id="valeur" name="price" placeholder="2000">
                </div>
                <div class="mb-1  ">
                    <label for="date">Expiration Date</label>
                    <input type="date" id="date" name="date">
                </div>
                <div class="mb-1 form-footer ">
                    <button type="submit" class="login-btn" id="button">Create Voucher</button>
                </div>

            </form>
        </div>
            </div>
        </div>
        
        <hr />
        <div class="bon-footer d-flex justify-content-between">
            <div class=" disposition update-bon">
                <div>
                    <select class="form-select px-2 py-2  mx-2 my-2 rounded shadow text-center">
                        <option selected>Update Bon</option>
                        <option value="500">500</option>
                        <option value="2000">2000</option>
                    </select>
                </div>

            </div>

            <div class="vr"></div>
            <div class="disposition show-bon">
                <div>
                    <select class="form-select px-2 py-2 mx-2 my-2 rounded shadow text-center ">
                        <option selected>Suivre Bon</option>
                        <option value="">2021</option>
                        <option value="">2022</option>
                    </select>
                </div>



            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div class=" m-4">

                <div class="form-container">
                    <form class="form">
                        <div class="mb-1">
                            Update Bon
                        </div>
                        <div class="mb-1">
                            <label for="price1">Valeur</label>
                            <input type="number" id="price1" placeholder=" price" disabled>
                        </div>
                        <div class="mb-1">
                            <label for="expirationDate1">Expiration Date</label>
                            <input type="date" id="expirationDate1">
                        </div>
                        <div class="mb-1 form-footer ">
                            <button type="button" class="login-btn" id="button">Update</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class=" m-4">

                <div class="form-container">
                    <form class="form">
                        <div class=" d-flex justify-content-between">
                            <h6 class="mx-4  "><span class="text-success">1245</span> commandes</h6>
                        </div>
                        <div class="mb-1">
                            <label for="price1">Valeur</label>
                            <input type="number" id="price1" placeholder=" price" disabled>
                        </div>
                        <div class="mb-1">
                            <label for="expirationDate1">Expiration Date</label>
                            <input type="date" id="expirationDate1" disabled>
                        </div>
                        <div class="mb-1  ">
                            <label for="expirationDate1">Code</label>
                            <input type="text" id="expirationDate1" placeholder="AXJHfgFecfv84" disabled>
                        </div>
                    </form>

                </div>
            </div>


        </div>

        <hr />
        @include('footer')
    </div>


@endsection
