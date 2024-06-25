<script src="{{asset('assets/js/count.js')}}"></script>
@props(["clients"=>null])
    <div class="row row-cols-1 row-cols-md-4 g-4">
       
        <div class="col">
            <div class="card h-100 rounded-l-xl shadow-sm transition-shadow hover:shadow-lg position-relative">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        @include('components.users-icon', ['class' => 'text-success'])
                    </div>
                    <div class="display-4 fw-bold text-success counter">{{Auth::user()->referrals->count()}}</div>
                </div>
                <div class="card-footer text-muted">Parrainés</div>
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-success opacity-0 hover:opacity-10 transition-opacity"></div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 rounded-l-xl shadow-sm transition-shadow hover:shadow-lg position-relative">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        @include('components.dollar-icon', ['class' => 'text-warning'])
                    </div>
                    <div class="display-4 fw-bold text-warning counter">{{Auth::user()->balance}}</div>
                </div>
                <div class="card-footer text-muted">Solde</div>
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-warning opacity-0 hover:opacity-10 transition-opacity"></div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 rounded-l-xl shadow-sm transition-shadow hover:shadow-lg position-relative">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        @include('components.gift-icon', ['class' => 'text-danger'])
                    </div>
                    <div class="display-4 fw-bold text-danger counter">4</div>
                </div>
                <div class="card-footer text-muted">Bons validés</div>
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-danger opacity-0 hover:opacity-10 transition-opacity"></div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 rounded-l-xl shadow-sm transition-shadow hover:shadow-lg position-relative">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        @include('components.gift-icon', ['class' => 'text-danger'])
                    </div>
                    <div class="display-4 fw-bold text-warning counter">3</div>
                </div>
                <div class="card-footer text-muted">Bons utilisés</div>
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-warning opacity-0 hover:opacity-10 transition-opacity"></div>
            </div>
        </div>
    </div>
    
