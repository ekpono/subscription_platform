<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Website;

class WebsiteController extends Controller
{
    public function index()
    {
        return ResponseHelper::goodResponse(Website::all());
    }
}
