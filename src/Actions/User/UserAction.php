<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Actions\Action;
use App\Domain\User\UserRepository;

abstract class UserAction extends Action
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
}
