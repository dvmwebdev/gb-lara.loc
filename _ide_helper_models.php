<?php

// @formatter:off

/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models {
    /**
     * App\Models\Feedback
     *
     * @property int $id
     * @property int $user_id
     * @property string $content
     * @property string|null $image
     * @property int $moderate
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\User $user
     * @method static \Database\Factories\FeedbackFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|Feedback newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Feedback newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Feedback query()
     * @method static \Illuminate\Database\Eloquent\Builder|Feedback sortable($defaultParameters = null)
     * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereContent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereImage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereModerate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereUserId($value)
     */
    class Feedback extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\User
     *
     * @property int $id
     * @property string $username
     * @property string $email
     * @property string $password
     * @property string|null $homepage
     * @property string|null $image
     * @property int $is_baned
     * @property string $user_agent
     * @property string $user_ip
     * @property string|null $remember_token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Feedback[] $feedbacks
     * @property-read int|null $feedbacks_count
     * @method static \Database\Factories\UserFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User query()
     * @method static \Illuminate\Database\Eloquent\Builder|User sortable($defaultParameters = null)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereHomepage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereIsBaned($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUserAgent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUserIp($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
     */
    class User extends \Eloquent
    {
    }
}

