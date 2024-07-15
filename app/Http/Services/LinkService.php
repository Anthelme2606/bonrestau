<?php

namespace App\Http\Services;
use Carbon\Carbon;
use App\Http\Repositories\LinkRepository;

class LinkService
{
    protected $linkRepo;
    public function __construct(LinkRepository $linkRepository){
      $this->linkRepo=$linkRepository;
    }
    public function create(array $data){
        $expire=$data['time_expire'];
      
        $timeExpire = match ($expire) {
            '24h' => Carbon::now()->addDay(),
            '1week' => Carbon::now()->addWeek(),
            '1month' => Carbon::now()->addMonth(),
            default => Carbon::now()->addDay(),
        };
        //dd($timeExpire);

        $auth=Auth()->user()->referral_code;
        $exist=$this->linkRepo->getByAuthCode($auth);
        if($exist && !$exist->expire){
            return redirect()->back()
            ->with('warning','Vous aviez deja génerer un lien et il est toujours valide')
            ->with('link',$exist->link);
        }else{
            $data['time_expire']=$timeExpire;
            $data['auth_code']=$auth;
            $data['link']=$this->generateLink($auth);
            $this->linkRepo->create($data);
            return redirect()->back()->with('link',$data['link']);
        }
       

    }
    public function generateLink($auth)
    {
        $uniqueCode = $auth;
        $https = 'https://greendetox.senousolutions.com/sign-up?code=' . $uniqueCode;
       // $http=  'http://localhost:8000/sign-up?code=' . $uniqueCode; 
        return $https;   
    }
}
