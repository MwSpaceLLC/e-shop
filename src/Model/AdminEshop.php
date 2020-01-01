<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 *
 * @property int $id
 * @property string $role
 * @property string $email
 * @property string $token
 * @property string|null $payload
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @mixin \Eloquent
 */
class AdminEshop extends Authenticatable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eshop_admins';

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

    public $insert = true;

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

    /**
     * @return mixed
     */
    public function payload()
    {
        return json_decode($this->payload);
    }

    public function root()
    {
        return $this->payload()->role == 'root';
    }

}
