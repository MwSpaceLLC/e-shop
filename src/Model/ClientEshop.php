<?php

namespace MwSpace\Eshop\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\User
 *
 * @property int $id
 * @property string $role
 * @property string $email
 * @property string $token
 * @property string|null $payload
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientEshop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientEshop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientEshop query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientEshop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientEshop whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientEshop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientEshop wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientEshop whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientEshop whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientEshop whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClientEshop whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ClientEshop extends Authenticatable
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eshop_clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'payload', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'token',
    ];

    /**
     * Login Validate (304 str:count)
     * https://www.php.net/manual/en/function.hash.php
     */
    public function generateToken()
    {
        $hash_str = hash('ripemd256', $this->id);
        $hash_str .= hash('haval256,4', $this->email);
        $hash_str .= hash('snefru', date('d-m-y'));
        $hash_str .= hash('sha256', date('H:i:s'));

        return $hash_str;
    }

}
