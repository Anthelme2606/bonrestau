    @props(['clients'=>null,'qteV'=>0,"ventes"=>0,"counts"=>0,'qteT'=>0,'coupons'=>null,
    'profondeurs'=>null,'relationnels'=>null,'usersbuy'=>0,'counterbon'=>0])

    <div class="row">
                  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card bg-dark">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                              <h3 class="mb-0">{{$clients->count()}}</h3>
                              <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                            </div>
                          </div>
                          <div class="col-3">
                            <div class="icon icon-box-success ">
                              <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                          </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Clients inscrits</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card bg-dark">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                              <h3 class="mb-0">{{$counts}}</h3>
                              <p class="text-success ml-2 mb-0 font-weight-medium">++</p>
                            </div>
                          </div>
                          <div class="col-3">
                            <div class="icon icon-box-success">
                              <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                          </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Nouveaux clients</h6>
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
                <div class="my-2">
                  <x-relationnel
                  :profondeurs=$profondeurs
                  :relationnels=$relationnels
                  :counterbon=$counterbon
                  :usersbuy=$usersbuy />
              </div>
                <div class="row ">
                  <div class="col-sm-4 grid-margin">
                    <div class="card bg-dark">
                      <div class="card-body bg-dark">
                        <h5>Quantité de bons vendus</h5>
                        <div class="row">
                          <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                              <h2 class="mb-0">{{$qteV}}</h2>
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
                        <h5>Ventes</h5>
                        <div class="row bg-dark">
                          <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                              <h2 class="mb-0">{{$ventes}} Fcfa</h2>
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
                        <h5>Bons disponibles</h5>
                        <div class="row ">
                          <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                              <h2 class="mb-0">{{$qteT}}</h2>
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
                </div>
                
                <x-coupon-list :coupons="$coupons" class="bg-dark"/>
                <div class="row bg-dark">
                    <div class="col-12 grid-margin bg-dark">
                      <div class="card bg-dark">
                        <div class="card-body bg-dark">
                          <h4 class="card-title"> Status des clients </h4>
                          <div class="table-responsive bg-dark">
                            <table class="table bg-dark">
                              <thead>
                                <tr>
                                  <th>
                                    <div class="form-check form-check-muted m-0">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                      </label>
                                    </div>
                                  </th>
                                  <th> Nom </th>
                                  <th> Ville </th>
                                  <th> Quartier </th>
                                  <th> email </th>
                                  <th> Reseau de payment </th>
                                  <th> Numero du reseau </th>
                                  <th> Numero whatsapp </th>
                                  <th> Quantité de bons validés </th>
                                  <th> Status </th>
                                </tr>
                              </thead>
                              <tbody>
                                @if(isset($coupons))
                                @foreach($coupons as $coupon)
                                @if(isset($coupon->transactions))
                                @foreach($coupon->transactions as $trans)
                                <tr>
                                  <td>
                                    <div class="form-check form-check-muted m-0">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input bg-white text-white">
                                      </label>
                                    </div>
                                  </td>
                                  <td>
                                    <img src="{{asset('assets/images/logo.jpg')}}" alt="image" />
                                    <span class="pl-2">{{$trans->user['nom']}}</span>
                                  </td>
                                  <td> {{$trans->user['ville']}} </td>
                                  <td> {{$trans->user['quartier']}}</td>
                                  <td> {{$trans->user['email']}} </td>
                                  
                                    <td>
                                     
                                      @if ($trans->user['reseau1'])
                                          {{ $trans->user['reseau1'] }}
                                      @else
                                          {{ $trans->user['reseau2'] }}
                                      @endif
                                  </td>
                                  
                                 <td> {{$trans->user['numero_reseau']}}</td>
                             <td> {{$trans->user['numwhats']}}</td>
                             <td> {{$trans['quantite']}}</td>
                                  <td>
                                    <div class="badge badge-outline-success">Payé</div>
                                  </td>
                                </tr>
                                @endforeach
                                @endif
                                @endforeach
                                @endif
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                

                <style>
                    .table{
                        background:rgba(0,0,0,0.02);
                    }
                </style>