<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LogTask
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $action;
    public int $taskId;
    public int $userId;

    public function __construct(string $action, int $taskId, int $userId)
    {
        $this->action = $action;
        $this->taskId = $taskId;
        $this->userId = $userId;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
