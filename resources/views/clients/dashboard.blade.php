<div class="my-2">
    <x-client-dashboard/>
</div>
@if(Auth::user()->transactions->count())
 <div class="historique">
    <div class="card">
        <div class="card-header">
            <small>Historique des bons validés</small>
        </div>
        <div class="card-body table-responsive">
            
            <table class="table">
                <thead>
                <tr>
                    <th>Type de bon</th>
                    <th>Quantité</th>
                    <th>Date de validation</th>
                    <th>status actuel</th>
                </tr>
            </thead>
                <tbody>
                    

                    @foreach( Auth::user()->transactions as $trans)
                    <tr>
                        <td>{{$trans->bon->price}}</td>
                        <td>{{$trans->quantite}}</td>
                        <td>{{$trans->created_at}}</td>
                        <td>validé</td>
                    </tr>
                    @endforeach
                    

                </tbody>

            </table>
            

        </div>
    </div>
 </div>
 @else
            <div class="d-flex justify-content-center align-content-center">
                <span>Aucun bon validé</span>
            </div>
            @endif
 <style>
   
    .card .card-head .card-body .table tbody{
        border:none;
    }
 </style>