<div class="row">
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card bg-dark">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">
                    @php
                        $count = Auth::user()->transactions->sum('quantite');
                        echo $count;
                    @endphp
                </h3>
                
                <p class="text-success ml-2 mb-0 font-weight-medium">+0</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Bons validés</h6>
        </div>
      </div>
    </div> 
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card bg-dark">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">
                    @php
                        use Carbon\Carbon;
                
                        $use = 0;
                        $now = Carbon::now();
                
                        if (Auth::user()->transactions->count()) {
                            foreach (Auth::user()->transactions as $trans) {
                                if (Carbon::parse($trans->bon->date)->lt($now)) {
                                    $use += 1;
                                }
                            }
                        }
                
                        echo $use;
                    @endphp
                </h3>
                
                <p class="text-success ml-2 mb-0 font-weight-medium">-0</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Bons utilisés</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card bg-dark">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">{{Auth::user()->referrals->count()}}</h3>
                <p class="text-danger ml-2 mb-0 font-weight-medium">-0</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-danger">
                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Comptes parrainés</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card bg-dark">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">{{Auth::user()->balance}}</h3>
                <p class="text-success ml-2 mb-0 font-weight-medium">+0F</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Solde courant</h6>
        </div>
      </div>
    </div> 
  </div>
  {{-- <div class="row ">
    <div class="col-sm-4 grid-margin">
      <div class="card bg-dark">
        <div class="card-body bg-dark">
          <h5>Solde</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">{{Auth::user()->balance}}</h2>
                <p class="text-success ml-2 mb-0 font-weight-medium">+0</p>
              </div>
              <h6 class="text-muted font-weight-normal"></h6>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-sm-4 grid-margin">
      <div class="card bg-dark">
        <div class="card-body">
          <h5>Bon Validés</h5>
          <div class="row bg-dark">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">8</h2>
                <p class="text-success ml-2 mb-0 font-weight-medium">+0F</p>
              </div>
              <h6 class="text-muted font-weight-normal"> </h6>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 grid-margin">
      <div class="card bg-dark">
        <div class="card-body">
          <h5>Bons utilisés</h5>
          <div class="row ">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">4</h2>
                <p class="text-danger ml-2 mb-0 font-weight-medium">-0 </p>
              </div>
              <h6 class="text-muted font-weight-normal"></h6>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}