<?php

namespace App\Services;

use App\Repositories\StatusRepository;

class UpdateStatusService
{
    private $statusRepository;

    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    public function updateStatus($transaction)
    {
        $amount = $transaction->value;

        if ($transaction->type == 'DividedPayment') {
            $amount = $transaction->value / 2;
        }

		$status = $this->statusRepository->find($transaction->status_id);

		if ($transaction->paid_by == $status->receiver) {
			$status->value = $status->value + $amount;
		} elseif($transaction->paid_by == $status->debtor) {
			if ($amount > $status->value) {
				$receiver = $status->receiver;
				$debtor   = $status->debtor;

				$status->receiver = $debtor;
				$status->debtor   = $receiver;

				$status->value = $amount - $status->value;
			} else {
				$status->value = $status->value - $amount;
			}
		}

		$saved = $this->statusRepository->save($status);

		return $saved;
    }
}
