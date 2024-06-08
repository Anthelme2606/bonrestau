<?php

namespace App\Http\Utils;
use Illuminate\Support\Facades\Auth;
class SidebarUtil
{
    public static function getSidebar($usertype)
    {
        
            if(Auth::user() && Auth::check()){
        switch ($usertype) {
            case 'admin':
                return [
                    'sidebar-content' => [
                        [
                            'id' => '**',
                            'box-icon' => 'bx bx-home-alt icon',
                            'link' => 'dashboard',
                            'link-name' => 'Dashboard',
                        ],
                        [
                            'id' => '**',
                            'box-icon' => 'bx bx-money icon',
                            'link' => 'bon-create',
                            'link-name' => 'Bons',
                        ],
                      /*  [
                            'id' => '**',
                            'box-icon' => 'bx bx-user icon',
                            'link' => 'parrains',
                            'link-name' => 'Sponsors',
                        ],
                        [
                            'id' => '**',
                            'box-icon' => 'bx bx-wallet icon',
                            'link' => 'solde',
                            'link-name' => 'Account Balance',
                        ],*/
                    ]
                ];
                break;
            case 'client':
                return [
                    'sidebar-content' => [
                        [
                            'id' => '**',
                            'box-icon' => 'bx bx-home-alt icon',
                            'link' => 'dashboard',
                            'link-name' => 'Dashboard',
                        ],
                        
                    ]
                ];
                break;
            default:
                return [
                    'sidebar-content' => [
                        [
                            'id' => '**',
                            'box-icon' => 'bx bx-user icon',
                            'link' => 'parrains',
                            'link-name' => 'Sponsors',
                        ],
                    ]
                ];
                break;
        }
    }
}
}
