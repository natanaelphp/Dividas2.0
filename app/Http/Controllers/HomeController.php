<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\StatusService;
use Illuminate\Auth\Guard as Auth;

class HomeController extends Controller
{
    public function index(StatusService $statusService, Auth $auth)
    {
        $status  = 1;
        $user = $auth->user();

        $data = $statusService->getDataForHomePage($status, $user);

        return View('home')->with($data);
    }
}
