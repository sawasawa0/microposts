<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function counts($user) {
        $count_microposts = $user->microposts()->count();

        //フォロー・アンフォローのカウントを追加
        $count_followings = $user->followings()->count();
        $count_followers = $user->followers()->count();
        
        
        return [
            'count_microposts' => $count_microposts,
            
             //フォロー・アンフォローのカウントを追加
            'count_followings' => $count_followings,
            'count_followers' => $count_followers,
        ];
    }
}
