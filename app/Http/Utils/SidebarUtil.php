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
                        [
                            'id' => '**',
                            'box-icon' => 'bx bxs-package icon',
                            'link' => 'bon-ravitailler',
                            'link-name' => 'Ravitaillement',
                        ],
                        [
                            'id' => '**',
                            'box-icon' => 'bx bxs-badge-check icon ',
                            'link' => 'trans-create',
                            'link-name' => 'Valider bon',
                        ],
                     
                        [
                            'id' => '**',
                            'box-icon' => 'bx bxs-key icon',
                            'link' => 'generate',
                            'link-name' => 'Générer un code',
                        ],
                       
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
                        [
                            'id' => '**',
                            'box-icon' => 'bx bxs-key icon',
                            'link' => 'parrains',
                            'link-name' => 'Générer un code',
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
