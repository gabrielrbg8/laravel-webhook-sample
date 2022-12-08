<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Webhooks\WebhookCreateRequest;
use App\Models\Webhooks\Webhook;
use App\Services\Webhooks\WebhookService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WebhookController extends Controller
{
    /** @var WebhookService $webhookService */
    private $webhookService;

    public function __construct(WebhookService $webhookService)
    {
        $this->webhookService = $webhookService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webHooks = $this->webhookService->findAll();
        return response()->json(['data' => $webHooks, 'message' => 'success'], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  WebhookCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebhookCreateRequest $request)
    {
        $this->webhookService->store($request->validated());
        return response()->json(['message' => 'success'], Response::HTTP_CREATED);
    }
}
