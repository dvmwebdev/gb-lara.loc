<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\CreateRequest;
use App\Models\Feedback;
use App\Services\FeedbackService;
use Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

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
        $userId = Auth::user()->id;
        return view('feedback.index', [
            'feedbacks' => $this->feedbackService->getFeedbacksByUserPaginate($userId)
        ]);
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $this->feedbackService->create($request, Auth::user());
        return redirect()->route('feedback.index');
    }

    /**
     * @return Renderable
     */
    public function create(): Renderable
    {
        $user = Auth::user();
        return view('feedback.create', [
            'user' => $user
        ]);
    }

    /**
     * @param Feedback $feedback
     * @return Renderable|RedirectResponse
     */
    public function edit(Feedback $feedback): Renderable|RedirectResponse
    {
        if (Auth::user()->id !== $feedback->user_id) {
            return redirect()->back()->with('danger', 'заборонено редагувати чужі відгуки');
        }
        return view('feedback.edit', [
            'feedback' => $feedback,
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request, Feedback $feedback): RedirectResponse
    {
        $this->feedbackService->update($request, $feedback);
        return redirect()->route('feedback.index');
    }

    public function delete(Feedback $feedback): RedirectResponse
    {
        $feedback->delete();
        return redirect()->back();
    }
}
