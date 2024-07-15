<?php
namespace App\Http\Controllers;

use App\Http\Services\LinkService;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    protected $linkService;

    public function __construct(LinkService $linkService)
    {
        $this->linkService = $linkService;
    }

    public function createLink(Request $request)
    {
        $request->validate([
            'time_expire'=>'string|required',
        ]);
        
        return  $this->linkService->create($request->all());

        
    }
}
