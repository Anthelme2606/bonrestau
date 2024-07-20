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
    public function create(array $data)
    {
        $expire = $data['time_expire'];
      
        $timeExpire = match ($expire) {
            '24h' => Carbon::now()->addDay(),
            '1week' => Carbon::now()->addWeek(),
            '1month' => Carbon::now()->addMonth(),
            default => Carbon::now()->addDay(),
        };
    
        $auth = auth()->user()->referral_code;
        $link = $this->generateLink($auth);
        $existingLink = $this->linkRepo->getByAuthCode($auth);
    
        if ($existingLink && !$existingLink->expire) {
            if ($existingLink['link'] !== $link) {
                // Le lien généré n'est pas sur la bonne adresse actuelle
                $existingLink['link'] = $link;
                $existingLink->save();
            }
    
            return redirect()->back()->with('link', $existingLink->link);
        } else {
            $data['time_expire'] = $timeExpire;
            $data['auth_code'] = $auth;
            $data['link'] = $link;
            $this->linkRepo->create($data);
    
            return redirect()->back()->with('link', $data['link']);
        }
    }
    
    public function generateLink($auth)
    {
        $uniqueCode = $auth;
        $url = route('sign-up') . '?code=' . $uniqueCode;
    
        return $url;
    }
    
}
