<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Label;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DonationController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'label' => 'required|string|exists:labels,name',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => false], 422);
        }

        $validated = $validator->validated();

        $label = Label::query()->where('name', '=', $validated['label'])->first();

        $donation = Donation::query()->create([
            'user_id' => auth()->user(),
            'image' => $validated['image'],
            'label_id' => $label->id,
        ]);

        return response()->json(['data' => $donation, 'status' => true], 200);
    }
}
