<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function show()
    {
        return view('pages.approval.show');
    }
}
