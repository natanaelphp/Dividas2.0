<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function create($id, UserRepository $userRepository)
    {
        $user = $userRepository->find($id);

        return View('transactions.new')->with('user', $user);
    }

    public function store(TransactionRequest $request)
    {
        dump( $request->all() );
    }
}
