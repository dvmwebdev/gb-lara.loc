<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Services\FeedbackService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeedbackAdminController extends Controller
{
    public function __construct(
        private readonly FeedbackService $feedbackService
    )
    {
    }

    public function index(): View
    {
        $feedbacks = $this->feedbackService->getFeedbacksAdminPaginate();
        return view('admin.feedback.index', [
            'feedbacks' => $feedbacks
        ]);
    }

    public function edit(Feedback $feedback): View
    {
        return view('admin.feedback.edit', [
            'feedback' => $feedback
        ]);
    }

    public function update(Request $request, Feedback $feedback): RedirectResponse
    {
        $this->feedbackService->update($request, $feedback);
        return redirect()->route('admin.feedback.index');
    }

    public function delete(Feedback $feedback): RedirectResponse
    {
        $feedback->delete();
        return redirect()->back();
    }
}
