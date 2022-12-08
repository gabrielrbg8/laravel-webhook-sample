<?php

namespace App\Services\Webhooks;

use App\Events\Webhooks\WebhookReceivedEvent;
use App\Repositories\Webhooks\WebhookRepository;
use App\Services\ActivityLogs\ActivityLogService;

class WebhookService
{
    /** @var ActivityLogService */
    private ActivityLogService $activityLogService;

    /** @var WebhookRepository */
    private WebhookRepository $webhookRepository;

    public function __construct(WebhookRepository $webhookRepository, ActivityLogService $activityLogService)
    {
        $this->webhookRepository = $webhookRepository;
        $this->activityLogService = $activityLogService;
    }

    public function findAll()
    {
        return $this->webhookRepository->findAll();
    }

    public function getById(int $id)
    {
        return $this->webhookRepository->find($id);
    }

    public function store(array $data)
    {
        try {
            if (!$this->activityLogService->checkDuplicates($data)) {
                $data['webhook'] = $this->webhookRepository->where('type', $data['event'])->firstOrFail();
                event(new WebhookReceivedEvent($data));
            }
            return 0;
        } catch (\Throwable $th) {
            throw $th;
        }

        return 0;
    }
}
