
@props(['coupons'=>null])

<section class="d-flex row g-4">
    @foreach ($coupons as $coupon)
        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
            <div class="card h-100 border-none position-relative {{ $coupon->quantite === 0 ? 'border-danger text-secondary opacity-25' : '' }}">
                <div class="card-body d-flex align-content-center justify-content-center">
                   <div class="rounded-circle p-2 bg-warning shadow-lg">
                    <x-dollar-icon class="text-white"/>
                   </div>
                </div>
                <div class="card-footer d-flex  justify-content-between">
                    <div class="">
                     {{$coupon->quantite}} en stock
                    </div>
                    <div class="">
                     {{$coupon->price}}
                    </div>
                 </div>
            </div>
        </div>
    @endforeach
</section>
