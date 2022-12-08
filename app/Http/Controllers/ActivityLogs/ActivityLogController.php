<?php

namespace App\Http\Controllers\ActivityLogs;

use App\Http\Controllers\Controller;
use App\Models\ActivityLogs\ActivityLog;
use App\Services\ActivityLogs\ActivityLogService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ActivityLogController extends Controller
{
    /** @var ActivityLogService $activityLogService */
    private $activityLogService;

    public function __construct(ActivityLogService $activityLogService)
    {
        $this->activityLogService = $activityLogService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activityLogs = $this->activityLogService->findAll();
        return response()->json(['data' => $activityLogs, 'message' => 'success'], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActiivityLogs\ActivityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityLog $activityLog)
    {
        return response()->json(['data' => $activityLog, 'message' => 'success'], Response::HTTP_OK);
    }
}
