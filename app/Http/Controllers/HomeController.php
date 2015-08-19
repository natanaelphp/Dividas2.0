<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\StatusService;

class HomeController extends Controller
{
    public function index(StatusService $statusService)
    {
        $status  = 1;
        $user_id = 1;

        $data = $statusService->getDataForHomePage($status, $user_id);

        return View('home', $data);
    }
}
