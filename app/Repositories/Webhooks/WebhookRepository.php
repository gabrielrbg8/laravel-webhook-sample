<?php

namespace App\Repositories\Webhooks;

use App\Models\Webhooks\Webhook;
use App\Repositories\BaseRepository;

class WebhookRepository extends BaseRepository
{
    public function __construct(Webhook $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        $data['payload'] = json_encode($data['payload']);
        return $this->model->create($data);
    }
}
