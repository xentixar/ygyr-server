<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Label;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetectionController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $file_name = md5($request->file('image')->getClientOriginalName() . time() . '-' . 1) . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(storage_path('app/public/detection/'), $file_name);

        // exec('', $output, $return_var);

        // $response = json_decode($output[0], true);

        // if ($response['label']) {
        //     $label = Label::query()->where('name', $response['label'])->first();
        //     if ($label) {
        //         $activity = Activity::query()->create([
        //             'image' => $file_name,
        //             'user_id' => 1,
        //             'label_id' => $label->id,
        //         ]);

        //         return response()->json(['status' => true, 'data' => $activity], 200);
        //     }
        // }

        return response()->json(['status' => true, 'data' => [
            'url' => url('storage/detection/' . $file_name),
            'label' => 'Silver',
            'description' => [
                'Utensils',
                'Rings ',
            ],
        ]], 200);

        return response()->json(['status' => false, 'error' => 'Error occurred while detecting the image'], 500);
    }
}
