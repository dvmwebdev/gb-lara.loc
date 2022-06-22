<?php

namespace App\Services;


use App\Http\Filter\FeedbackFilter;
use App\Http\Requests\Feedback\CreateRequest;
use App\Models\Feedback;
use Illuminate\Contracts\Container\BindingResolutionException;
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

    /**
     * @return Collection
     */
    public function getFeedbacksAll(): Collection
    {
        return $this->feedback->all();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getFeedbacksPaginate(): LengthAwarePaginator
    {
        return $this->feedback->sortable(['created_at' => 'desc'])->with('user')->where('feedbacks.moderate', 1)->paginate(25);
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator
     * @throws BindingResolutionException
     */
    public function getFeedbacksAdminPaginate(array $data): LengthAwarePaginator
    {

        $filter = app()->make(FeedbackFilter::class, ['queryParams' => array_filter($data, 'str')]);
        return $this->feedback->filter($filter)->sortable(['created_at' => 'desc'])->with('user')->paginate(6);
    }

    /**
     * @param int $userId
     * @return LengthAwarePaginator
     */
    public function getFeedbacksByUserPaginate(int $userId): LengthAwarePaginator
    {
        return $this->feedback->sortable(['created_at' => 'desc'])->where('feedbacks.user_id', $userId)->paginate(5);
    }

    /**
     * @param CreateRequest $request
     * @param $user
     * @return Feedback
     */
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

    /**
     * @param Request $request
     * @param Feedback $feedback
     * @return Feedback
     */
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
