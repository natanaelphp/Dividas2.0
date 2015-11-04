<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Guard as Auth;

use App\Http\Requests\TransactionRequest;
use App\Http\Controllers\Controller;

use App\Repositories\TransactionRepository;
use App\Repositories\UserRepository;

class TransactionController extends Controller
{
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function index()
    {
        $transactions = $this->transactionRepository->all();

        return View('transactions.index')->with('transactions', $transactions);
    }

    public function create($id, UserRepository $userRepository, Auth $auth)
    {
        $data = [
            'user'      => $userRepository->find($id),
            'authUser'  => $auth->user(),
        ];
        
        return View('transactions.new')->with($data);
    }

    public function store(TransactionRequest $request)
    {
        dump( $request->all() );
    }
}
