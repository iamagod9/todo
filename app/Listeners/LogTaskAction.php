<?php

namespace App\Listeners;

use App\Events\LogTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogTaskAction
{
    public function handle(LogTask $event): void
    {
        $message = sprintf(
            'Task %s: ID %d by User %s',
            $event->action,
            $event->taskId,
            $event->userId ?? 'Guest'
        );

        Log::info($message);
    }
}
