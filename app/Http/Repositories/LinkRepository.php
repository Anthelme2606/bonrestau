<?php
namespace App\Http\Repositories;

use App\Models\Link;

class LinkRepository
{
   public function create(array $data){
        Link::create([
            'link' => $data['link'],
            'time_expire' => $data['time_expire'],
            'auth_code' => $data['auth_code'],
        ]);


        
    }

    public function  findLink($id){
    $link=Link::find($id);
    return $link;
    }
    public function getByAuthCode($code){
        $link=Link::where('auth_code',$code)->first();
        return $link;
    }
}
