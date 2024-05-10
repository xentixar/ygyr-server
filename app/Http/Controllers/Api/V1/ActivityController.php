<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $activities = Activity::query()->where('user_id', Auth::id())->get();

        return response()->json(['data' => $activities, 'status' => true], 200);
    }
}
