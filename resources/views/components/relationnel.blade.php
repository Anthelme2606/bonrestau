
@props(["profondeurs"=>null,"relationnels"=>null,"usersbuy"=>0,"counterbon"=>0])
<div class="row">
    
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card bg-dark">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">
                      @php
                          
                          echo $profondeurs;
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
            <h6 class="text-muted font-weight-normal">Nombre de niveau actuel</h6>
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
                          
                          echo $relationnels->count();
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
            <h6 class="text-muted font-weight-normal">Mon relationnel</h6>
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
                        //   $count = Auth::user()->transactions->sum('quantite');
                          echo $usersbuy;
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
            <h6 class="text-muted font-weight-normal">Utilisateurs ayant acheté dans mon relationnel.</h6>
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
                        //   $count = Auth::user()->transactions->sum('quantite');
                          echo $counterbon;
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
            <h6 class="text-muted font-weight-normal">Bons achetés dans mon relationnel</h6>
          </div>
        </div>
      </div>


    </div>    