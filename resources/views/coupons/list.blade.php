<style>
    .card {
        color: var(--text-color);
        max-width: 250px;
        max-height: 220px;
        border: none;
        border-bottom-style: solid;
        border-bottom-color: rgb(50, 205, 40);
        margin-bottom: 10px;
    }

    p {
        color: var(--text-color);
    }

    span {
        color: var(--text-color);
    }

    .card img {
        max-width: 50px;
        /* Ensure the image size is consistent */
        max-height: 50px;
    }

    .card .btn i.material-icons {
        font-size: 24px;
        /* Adjust icon size */
    }

    .expire-date {
        color: red;
        font: bold;
    }

    .card .font-weight-bold {
        font-weight: bold;
        /* Emphasize the voucher value */
    }

    .d-head {
        display: flex;
        justify-content: center;

        flex-direction: column;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const couponButtons = document.querySelectorAll(".coupon_model");

        couponButtons.forEach(button => {
            button.addEventListener('click', () => {
                const couponCode = button.dataset.coupon_code;
                const couponPrice = button.dataset.coupon_price;

                document.querySelector("#coupon_code").value = couponCode;
                document.querySelector("#amount").value = couponPrice;
            });
        });
    });
</script>

<div class="container mt-2">
    @include('admin.valid-bon')
    <div class=" d-head  mb-4">
        <div class="d-flex justify-content-center">
            <span>Liste des bons</span>
        </div>
        <div class="d-flex justify-content-between align-content-center">
            <select class="form-select px-2 py-2  mx-2 my-2 rounded shadow text-center  " aria-label="Disabled select ">
                <option selected>selectionnez le nombre à afficher..</option>
                <option value="">5</option>
                <option value="">2</option>
            </select>
            <select class="form-select px-2 py-2 mx-2 my-2 rounded shadow text-center " aria-label="Disabled select ">
                <option selected>Trier par date d'expiration</option>
                <option value="">2021</option>
                <option value="">2022</option>
            </select>
        </div>
    </div>
    <div class="row">
        <!-- Bon de Restauration 1 -->

        @if (isset($coupons))
            @foreach ($coupons as $coupon)
                <div class="col-md-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <img class="rounded-circle px-2 py-2 mx-1 my-2" alt="card-img"
                                    src="{{ asset('assets/images/bon-logo.png') }}" width="50" height="50">
                                <button type="button" class="btn coupon_model" data-bs-toggle="modal"
                                    data-coupon_code="{{ $coupon->code }}" data-coupon_price="{{ $coupon->price }}"
                                    data-bs-target="#transactionModal">
                                    <i class="material-icons">
                                        more_vert</i>
                                </button>
                            </div>
                            <p class="card-text">Expiration: <span class="expire-date">{{ $coupon->date }}</span></p>
                            <p class="card-text">Valeur : <span class="font-weight-bold">{{ $coupon->price }}
                                    Fcfa</span></p>
                            <p class="card-text">code : <span class="font-weight-bold">{{ $coupon->code }}</span></p>
                        </div>
                    </div>

                </div>
            @endforeach
        @endif





        <!-- Répéter pour les autres bons de restauration -->
        <!-- Bon de Restauration 2 -->
        <!-- Bon de Restauration 3 -->
        <!-- ... -->
    </div>
</div>
