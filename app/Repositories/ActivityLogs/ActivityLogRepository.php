<?php

namespace App\Repositories\ActivityLogs;

use App\Models\ActivityLogs\ActivityLog;
use App\Repositories\BaseRepository;

class ActivityLogRepository extends BaseRepository
{
    public function __construct(ActivityLog $model)
    {
        $this->model = $model;
    }
}
