@props(['counts'=>null,'ventes'=>0,'bmsc'=>0])
<div class="position-relative w-100 max-w-6xl mx-auto  py-12">
    <div class="position-absolute top-0 end-0  px-2   rounded-bottom-left-lg text-black font-medium">
        June 2023
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100 rounded-3xl shadow-lg text-center transition-colors hover:bg-success hover:text-white">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <div class="bg-warning rounded-circle shadow-lg p-3">
                        <x-dollar-icon class="text-white"/>
                       
                    </div>
                    <div class="mt-4">
                        <h3 class="card-title h5 font-bold">Ventes</h3>
                        <hr class="w-100 bg-warning mt-2" style="height: 1px;">
                        <p class="card-text h4 font-bold mt-2">{{$ventes}} Fcfa</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 rounded-3xl shadow-lg text-center transition-colors hover:bg-success hover:text-white">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <div class="bg-warning rounded-circle shadow-lg p-3">
                        <x-users-icon class="text-white"/>
                    </div>
                    <div class="mt-4">
                        <h3 class="card-title h5 font-bold">Nouveaux Clients</h3>
                        <hr class="w-100 bg-warning mt-2" style="height: 1px;">
                        
                        
                        <p class="card-text h4 font-bold mt-2">{{$counts}}</p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 rounded-3xl shadow-lg text-center transition-colors hover:bg-success hover:text-white">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <div class="bg-warning rounded-circle shadow-lg p-3">
                        @include('components.user-deficit', ['class' => 'text-white'])
                    </div>
                    <div class="mt-4">
                        <h3 class="card-title h5 font-bold">Bons</h3>
                        <hr class="w-100 bg-warning mt-2" style="height: 1px;">
                        <p class="card-text h4 font-bold mt-2">{{$bmsc}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
