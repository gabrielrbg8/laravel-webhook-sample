<?php

namespace App\Services\ActivityLogs;

use App\Events\Constants\WebhookConstants;
use App\Models\ActivityLogs\ActivityLog;
use App\Repositories\ActivityLogs\ActivityLogRepository;
use Exception;

class ActivityLogService
{
    /** @var ActivityLogRepository */
    private ActivityLogRepository $activityLogRepository;

    public function __construct(ActivityLogRepository $activityLogRepository)
    {
        $this->activityLogRepository = $activityLogRepository;
    }

    public function findAll()
    {
        return $this->activityLogRepository->findAll();
    }

    public function checkDuplicates(array $data)
    {
        return $this->activityLogRepository->where('event', $data['event'])->where('properties->event_id', $data['event_id'])->first();
    }
}
