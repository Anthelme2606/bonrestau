@php
    $users = [
        [
            'id' => 1,
            'logo' => '/placeholder-logo.svg',
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john.doe@example.com',
            'country' => 'United States',
            'city' => 'New York',
          
        ],
        [
            'id' => 2,
            'logo' => '/placeholder-logo.svg',
            'firstName' => 'Jane',
            'lastName' => 'Smith',
            'email' => 'jane.smith@example.com',
            'country' => 'Canada',
            'city' => 'Toronto',
            
        ],
        [
            'id' => 3,
            'logo' => '/placeholder-logo.svg',
            'firstName' => 'Michael',
            'lastName' => 'Johnson',
            'email' => 'michael.johnson@example.com',
            'country' => 'United Kingdom',
            'city' => 'London',
          
        ],
        [
            'id' => 4,
            'logo' => '/placeholder-logo.svg',
            'firstName' => 'Emily',
            'lastName' => 'Davis',
            'email' => 'emily.davis@example.com',
            'country' => 'Australia',
            'city' => 'Sydney',
            
        ],
        [
            'id' => 5,
            'logo' => '/placeholder-logo.svg',
            'firstName' => 'David',
            'lastName' => 'Lee',
            'email' => 'david.lee@example.com',
            'country' => 'Japan',
            'city' => 'Tokyo',
            
        ],
    ];
@endphp

<div class="table-responsive border rounded-lg">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col" style="width: 80px;"></th>
                <th scope="col" class="d-none d-sm-table-cell">nom</th>
                <th scope="col" class="d-none d-sm-table-cell">Prenom</th>
                <th scope="col" class="d-none d-md-table-cell">Email</th>
                <th scope="col" class="d-none d-lg-table-cell">Region</th>
                <th scope="col" class="d-none d-lg-table-cell">Ville</th>
                <th scope="col" class="d-none d-lg-table-cell">Quartier</th>
                <th scope="col" style="width: 100px;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trans as $tran)
                <tr>
                    <td>
                        <img src="{{ asset('assets/images/logo.jpg') }}" class=" rounded-circle" style="width:25px; height:25px;" alt="">
                    </td>
                    <td class="d-none d-sm-table-cell">{{ $tran->user['nom'] }}</td>
                    <td class="d-none d-sm-table-cell">{{ $tran->user['prenom'] }}</td>
                    <td class="d-none d-md-table-cell">{{ $tran->user['email'] }}</td>
                    <td class="d-none d-lg-table-cell">{{ $tran->user['region'] }}</td>
                    <td class="d-none d-lg-table-cell">{{ $tran->user['ville'] }}</td>
                    <td class="d-none d-lg-table-cell">{{ $tran->user['quartier'] }}</td>
                    <td>
                        
                            <x-check-icon class="text-success"/>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
