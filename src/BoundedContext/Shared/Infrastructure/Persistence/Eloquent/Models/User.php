<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Ecommerce\BoundedContext\Shared\Infrastructure\Notifications\VerifyUserNotification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable, HasFactory;

    public $table = 'users';

    protected $hidden = [
        'remember_token', 'two_factor_code',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
        'two_factor_expires_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'approved',
        'verified',
        'verified_at',
        'verification_token',
        'two_factor',
        'two_factor_code',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
        'two_factor_expires_at',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function generateTwoFactorCode(): void
    {
        $this->timestamps            = false;
        $this->two_factor_code       = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(15)->format(config('setting.date_format') . ' ' . config('setting.time_format'));
        $this->save();
    }

    public function resetTwoFactorCode(): void
    {
        $this->timestamps            = false;
        $this->two_factor_code       = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->whereIn('id', [1, 2, 3])->exists();
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::created(function (self $user) {
            if (auth()->check()) {
                $user->verified    = 1;
                $user->verified_at = Carbon::now()->format(config('setting.date_format') . ' ' . config('setting.time_format'));
                $user->save();
            } elseif (! $user->verification_token) {
                $token     = Str::random(64);
                $usedToken = self::where('verification_token', $token)->first();

                while ($usedToken) {
                    $token     = Str::random(64);
                    $usedToken = self::where('verification_token', $token)->first();
                }

                $user->verification_token = $token;
                $user->save();

                $registrationRole = config('setting.registration_default_role');
                if (! $user->roles()->get()->contains($registrationRole)) {
                    $user->roles()->attach($registrationRole);
                }

                $user->notify(new VerifyUserNotification($user));
            }
        });
    }

    public function userUserAlerts(): BelongsToMany
    {
        return $this->belongsToMany(UserAlert::class);
    }

    public function getEmailVerifiedAtAttribute($value): ?string
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('setting.date_format') . ' ' . config('setting.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value): void
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('setting.date_format') . ' ' . config('setting.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input): void
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPassword($token));
    }

    public function getVerifiedAtAttribute($value): ?string
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('setting.date_format') . ' ' . config('setting.time_format')) : null;
    }

    public function setVerifiedAtAttribute($value): void
    {
        $this->attributes['verified_at'] = $value ? Carbon::createFromFormat(config('setting.date_format') . ' ' . config('setting.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function getTwoFactorExpiresAtAttribute($value): ?string
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('setting.date_format') . ' ' . config('setting.time_format')) : null;
    }

    public function setTwoFactorExpiresAtAttribute($value): void
    {
        $this->attributes['two_factor_expires_at'] = $value ? Carbon::createFromFormat(config('setting.date_format') . ' ' . config('setting.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
