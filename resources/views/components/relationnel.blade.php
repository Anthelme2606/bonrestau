<div class="row">
    
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card bg-dark">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">
                      @php
                          $count = Auth::user()->userDepth;
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
            <h6 class="text-muted font-weight-normal">Nombre de profondeur actuel</h6>
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
                          $count = Auth::user()->getUsersWithinFiveLevels->count();
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
            <h6 class="text-muted font-weight-normal">Mon référentiel</h6>
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
                          echo 0;
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
            <h6 class="text-muted font-weight-normal">Utilisateurs ayant acheté dans mon référentiel.</h6>
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
                          echo 0;
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
            <h6 class="text-muted font-weight-normal">Pourcentages</h6>
          </div>
        </div>
      </div>


    </div>    