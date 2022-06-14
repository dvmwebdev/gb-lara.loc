<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Contracts\View\View;


class DashboardAdminController extends Controller
{
    public function __construct(
        private readonly DashboardService $service
    )
    {
    }

    /**
     * @param DashboardService $service
     * @return View
     */
    public function index(DashboardService $service): View
    {
        dd($this->service->getData());
        return view('admin.index', [
            'data' => $service->getData()
        ]);
    }
}
