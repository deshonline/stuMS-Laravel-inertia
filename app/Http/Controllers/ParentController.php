<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public Function __construct()
    {
        $this->middleware(['auth:sanctum','verified']);
    }
}
