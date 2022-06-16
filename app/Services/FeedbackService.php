<?php

namespace App\Services;


use App\Http\Requests\Feedback\CreateRequest;
use App\Models\Feedback;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
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
        return $this->feedback->sortable(['created_at' => 'desc'])->with('user')->where('feedbacks.moderate', 1)->paginate(25);
    }

    public function getFeedbacksAdminPaginate(): LengthAwarePaginator
    {
        return $this->feedback->sortable(['created_at' => 'desc'])->paginate(6);
    }

    public function getFeedbacksByUserPaginate(int $userId): LengthAwarePaginator
    {
        return $this->feedback->sortable(['created_at' => 'desc'])->where('feedbacks.user_id', $userId)->paginate(5);
    }

    public function create(CreateRequest $request, $user): Feedback
    {

        $feedback = $this->feedback->create([
            'user_id' => $user->id,
            'content' => $request->get('content'),
        ]);
        if ($request->file('image')) {
            $feedback->update(['image' => $this->imageSave($request->file('image'))]);
        }
        return $feedback;
    }

    public function update(Request $request, Feedback $feedback): Feedback
    {

        if ($request->file('image')) {
            $feedback->update(['image' => $this->imageSave($request->file('image'))]);
        }
        $feedback->update([
            'content' => $request->get('content'),
            'moderate' => $request->get('moderate') ?? 0,
        ]);
        return $feedback;
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function imageSave(UploadedFile $file): string
    {
        $path = $file->store('images', 'public');
        return Storage::disk('public')->url($path);
    }
}
