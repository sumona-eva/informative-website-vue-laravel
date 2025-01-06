<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\InquiryRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RequestController extends Controller
{
    public function saveInquiry(InquiryRequest $request)
    {
        $data = $request->validated();
        \App\Models\Request::query()->create($data);
        return Response::HTTP_OK;
    }

    public function getInquiries()
    {
        $inquiries = \App\Models\Request::query()->get();
        return response()->json($inquiries, Response::HTTP_OK);
    }

    public function deleteInquiry($id)
    {
        $inquiry = \App\Models\Request::query()->findOrFail($id);
        $inquiry->delete();
        return Response::HTTP_OK;
    }
}
