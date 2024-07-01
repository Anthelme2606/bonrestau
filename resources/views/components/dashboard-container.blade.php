    @props(['clients'=>null,'qteV'=>0,"ventes"=>0,"bmsc"=>0])
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
                              <h3 class="mb-0">$17.34</h3>
                              <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p>
                            </div>
                          </div>
                          <div class="col-3">
                            <div class="icon icon-box-success">
                              <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                          </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Revenue courant</h6>
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
                <div class="row ">
                  <div class="col-sm-4 grid-margin">
                    <div class="card bg-dark">
                      <div class="card-body bg-dark">
                        <h5>Quantité vendue</h5>
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
                              <h2 class="mb-0">{{$bmsc}}</h2>
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
                <div class="row bg-dark">
                    <div class="col-12 grid-margin bg-dark">
                      <div class="card bg-dark">
                        <div class="card-body bg-dark">
                          <h4 class="card-title">Order Status</h4>
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
                                  <th> Client Name </th>
                                  <th> Order No </th>
                                  <th> Product Cost </th>
                                  <th> Project </th>
                                  <th> Payment Mode </th>
                                  <th> Start Date </th>
                                  <th> Payment Status </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    <div class="form-check form-check-muted m-0">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                      </label>
                                    </div>
                                  </td>
                                  <td>
                                    <img src="{{asset('assets/images/logo.jpg')}}" alt="image" />
                                    <span class="pl-2">Henry Klein</span>
                                  </td>
                                  <td> 02312 </td>
                                  <td> $14,500 </td>
                                  <td> Dashboard </td>
                                  <td> Credit card </td>
                                  <td> 04 Dec 2019 </td>
                                  <td>
                                    <div class="badge badge-outline-success">Approved</div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="form-check form-check-muted m-0">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                      </label>
                                    </div>
                                  </td>
                                  <td>
                                    <img src="{{asset('assets/images/logo.jpg')}}" alt="image" />
                                    <span class="pl-2">Estella Bryan</span>
                                  </td>
                                  <td> 02312 </td>
                                  <td> $14,500 </td>
                                  <td> Website </td>
                                  <td> Cash on delivered </td>
                                  <td> 04 Dec 2019 </td>
                                  <td>
                                    <div class="badge badge-outline-warning">Pending</div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="form-check form-check-muted m-0">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                      </label>
                                    </div>
                                  </td>
                                  <td>
                                    <img src="{{asset('assets/images/logo.jpg')}}" alt="image" />
                                    <span class="pl-2">Lucy Abbott</span>
                                  </td>
                                  <td> 02312 </td>
                                  <td> $14,500 </td>
                                  <td> App design </td>
                                  <td> Credit card </td>
                                  <td> 04 Dec 2019 </td>
                                  <td>
                                    <div class="badge badge-outline-danger">Rejected</div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="form-check form-check-muted m-0">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                      </label>
                                    </div>
                                  </td>
                                  <td>
                                    <img src="{{asset('assets/images/logo.jpg')}}" alt="image" />
                                    <span class="pl-2">Peter Gill</span>
                                  </td>
                                  <td> 02312 </td>
                                  <td> $14,500 </td>
                                  <td> Development </td>
                                  <td> Online Payment </td>
                                  <td> 04 Dec 2019 </td>
                                  <td>
                                    <div class="badge badge-outline-success">Approved</div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="form-check form-check-muted m-0">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                      </label>
                                    </div>
                                  </td>
                                  <td>
                                    <img src="{{asset('assets/images/logo.jpg')}}" alt="image" />
                                    <span class="pl-2">Sallie Reyes</span>
                                  </td>
                                  <td> 02312 </td>
                                  <td> $14,500 </td>
                                  <td> Website </td>
                                  <td> Credit card </td>
                                  <td> 04 Dec 2019 </td>
                                  <td>
                                    <div class="badge badge-outline-success">Approved</div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                {{-- <div class="row ">
                  <div class="col-12 grid-margin">
                    <div class="card bg-dark">
                      <div class="card-body bg-dakr">
                        <h4 class="card-title">Order Status</h4>
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
                                <th> Client Name </th>
                                <th> Order No </th>
                                <th> Product Cost </th>
                                <th> Project </th>
                                <th> Payment Mode </th>
                                <th> Start Date </th>
                                <th> Payment Status </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input">
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  <img src="{{asset('assets/vendor/images/faces/face1.jpg')}}" alt="image" />
                                  <span class="pl-2">Henry Klein</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> Dashboard </td>
                                <td> Credit card </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                  <div class="badge badge-outline-success">Approved</div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input">
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  <img src="{{asset('assets/vendor/images/faces/face2.jpg')}}" alt="image" />
                                  <span class="pl-2">Estella Bryan</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> Website </td>
                                <td> Cash on delivered </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                  <div class="badge badge-outline-warning">Pending</div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input">
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  <img src="{{asset('assets/vendor/images/faces/face5.jpg')}}" alt="image" />
                                  <span class="pl-2">Lucy Abbott</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> App design </td>
                                <td> Credit card </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                  <div class="badge badge-outline-danger">Rejected</div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input">
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  <img src="{{asset('assets/vendor/images/faces/face3.jpg')}}" alt="image" />
                                  <span class="pl-2">Peter Gill</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> Development </td>
                                <td> Online Payment </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                  <div class="badge badge-outline-success">Approved</div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input">
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  <img src="{{asset('assets/vendor/images/faces/face4.jpg')}}" alt="image" />
                                  <span class="pl-2">Sallie Reyes</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> Website </td>
                                <td> Credit card </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                  <div class="badge badge-outline-success">Approved</div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  --}}

                <style>
                    .table{
                        background:rgba(0,0,0,0.02);
                    }
                </style>