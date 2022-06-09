<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\FeedbackService;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{

    /**
     * @param FeedbackService $feedbackService
     */
    public function __construct(
        private readonly FeedbackService $feedbackService
    )
    {
    }

    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('home', [
            'feedbacks' => $this->feedbackService->getFeedbacksPaginate()
        ]);
    }
}
