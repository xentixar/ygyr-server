<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Label;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DetectionController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        if ($validator->fails())
        {
            return response()->json(['status'=>false,'errors'=> $validator->errors()->first()], 422);
        }

        $file_name = md5($request->file('image')->getClientOriginalName().time().'-'. Auth::id()).'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(storage_path('app/public/detection/'), $file_name);

        $file_original_name = explode('.', $file_name);
        $file_original_name = $file_original_name[0];

        $label_name = "";

        sleep(5);
        $label_name = file_get_contents(storage_path("app/public/outputs/$file_original_name.txt"));


        $label = Label::query()->where('name', '=', $label_name)->first();
        $descriptions = [];
        foreach ($label->usages ?? [] as $usage) {
            $descriptions[] = $usage->description;
        }
        
        return response()->json(['status' => true, 'data' => [
            'url' => url('storage/outputs/'.$file_name),
            'label' => $label_name,
            'description' => $descriptions,
        ]], 200);
    }
}
