<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Contracts\View\View;


class DashboardAdminController extends Controller
{
    public function index(DashboardService $service): View
    {
        return view('admin.index', [
            'users' => $service->userAll(),
            'usersBaned' => $service->userBaned()
        ]);
    }
}
