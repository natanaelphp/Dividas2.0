<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\HomePageDataService;
use Illuminate\Auth\Guard as Auth;

class HomeController extends Controller
{
    public function index(HomePageDataService $homePageDataService, Auth $auth)
    {
        $status  = 1;
        $user = $auth->user();

        $data = $homePageDataService->getDataForHomePage($status, $user);

        return View('home')->with($data);
    }
}
