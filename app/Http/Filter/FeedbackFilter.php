<?php

namespace App\Http\Filter;

use Illuminate\Database\Eloquent\Builder;

class FeedbackFilter extends AbstractFilter
{
    const USERNAME = 'username';
    const EMAIL = 'email';
    const MODERATE = 'moderate';

    public function username(Builder $builder, $value)
    {
        $builder->whereHas('user', function (Builder $query) use ($value) {
            $query->where('username', 'like', "%$value%");
        });
    }

    public function email(Builder $builder, $value)
    {
        $builder->whereHas('user', function (Builder $query) use ($value) {
            $query->where('email', 'like', "%$value%");
        });
    }

    public function moderate(Builder $builder, $value)
    {
        $builder->where('moderate', $value);
    }

    protected function getCallbacks(): array
    {
        return [
            self::USERNAME => [$this, 'username'],
            self::EMAIL => [$this, 'email'],
            self::MODERATE => [$this, 'moderate']
        ];
    }
}
