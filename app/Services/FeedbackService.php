<?php

namespace App\Services;


use App\Models\Feedback;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class FeedbackService
{
    public function __construct(
        private readonly Feedback $feedback
    )
    {
    }

    public function getFeedbacksAll(): Collection
    {
        return $this->feedback->all();
    }

    public function getFeedbacksPaginate(): LengthAwarePaginator
    {
        return $this->feedback->sortable(['created_at' => 'desc'])->where('feedbacks.moderate', 1)->paginate(25);
    }

    public function getFeedbacksAdminPaginate(): LengthAwarePaginator
    {
        return $this->feedback->sortable(['created_at' => 'desc'])->paginate(6);
    }

    public function getFeedbacksByUserPaginate(int $userId): LengthAwarePaginator
    {
        return $this->feedback->sortable(['created_at' => 'desc'])->where('feedbacks.user_id', $userId)->paginate(5);
    }

    public function create(Request $request, $user): void
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $pathImage = Storage::disk('public')->url($path);
        }
        $this->feedback->create([
            'user_id' => $user->id,
            'content' => $request->get('content'),
            'image' => $pathImage ?? null
        ]);
    }

    public function update(Request $request, Feedback $feedback): void
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $pathImage = Storage::disk('public')->url($path);
        }
        $feedback->update([
            'content' => $request->get('content'),
            'moderate' => $request->get('moderate') ?? 0,
            'image' => $pathImage ?? null
        ]);
    }
}
