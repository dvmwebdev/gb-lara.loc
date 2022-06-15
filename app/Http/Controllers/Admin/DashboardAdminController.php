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
     * @return View
     */
    public function index(): View
    {
        return view('admin.index', [
            'dataAmount' => $this->service->getDataAmount()
        ]);
    }
}
