<?php

namespace App\Models;

use Asantibanez\LaravelEloquentStateMachines\StateMachines\StateMachine;

class StatusStateMachine extends StateMachine
{
    const WAITCONFIMATION = 'Wait Confirmation';
    const WAITCOURIER = 'Wait Courier';
    const DECLINED = 'Declined';
    const DELIVERED = 'Delivered';
    const RECEIVED = 'Received';

    const STATES = [
        self::WAITCONFIMATION,
        self::WAITCOURIER,
        self::DECLINED,
        self::DELIVERED,
        self::RECEIVED
    ];

    public function recordHistory(): bool
    {
        return true;
    }

    public function transitions(): array
    {
        return [
            self::WAITCONFIMATION => [self::WAITCOURIER, self::DECLINED],
            self::WAITCOURIER => [self::DELIVERED],
            self::DECLINED => [self::WAITCOURIER],
            self::DELIVERED => [self::RECEIVED]
        ];
    }

    public function defaultState(): ?string
    {
        return self::WAITCONFIMATION;
    }
}
