<?php

namespace App\Services;

use App\Repositories\StatusRepository;
use App\Repositories\UserRepository;

class StatusService
{
    private $statusRepository;
    private $userRepository;

    public function __construct(StatusRepository $statusRepository, UserRepository $userRepository)
    {
        $this->statusRepository = $statusRepository;
        $this->userRepository = $userRepository;
    }

    public function getDataForHomePage($status, $user)
    {
        $status = $this->statusRepository->getStatus($status);

        if ($user->id == $status->userReceiver->id) {
            $arrowDirection = 'left';
            $otherUserImage = $status->userDebtor->image;
            $otherUserId    = $status->userDebtor->id;
        }

        if ($user->id == $status->userDebtor->id) {
            $arrowDirection = 'right';
            $otherUserImage = $status->userReceiver->image;
            $otherUserId    = $status->userReceiver->id;
        }

        return $data = [
            'userImage'         => $user->image,
            'otherUserImage'    => $otherUserImage,
            'arrowDirection'    => $arrowDirection,
            'value'             => $status->value,
            'userId'            => $user->id,
            'otherUserId'       => $otherUserId,
        ];
    }

    public function updateStatus($transaction)
    {
        $half = $transaction->value / 2;

		$status = $this->statusRepository->find(1);

		if ($transaction->paid_by == $status->receiver) {
			$status->value = $status->value + $half;
		} elseif($transaction->paid_by == $status->debtor) {
			if ($half > $status->value) {
				$receiver = $status->receiver;
				$debtor   = $status->debtor;

				$status->receiver = $debtor;
				$status->debtor   = $receiver;

				$status->value = $half - $status->value;
			} else {
				$status->value = $status->value - $half;
			}
		}

		$saved = $this->statusRepository->save($status);

		return $saved;
    }
}
