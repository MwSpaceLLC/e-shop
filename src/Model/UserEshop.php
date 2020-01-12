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
use Illuminate\Database\Eloquent\SoftDeletes;

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
class UserEshop extends Authenticatable
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eshop_users';

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

    /**
     * @return mixed
     */
    public function payload()
    {
        return json_decode($this->payload);
    }

    /**
     * @throws EshopException
     */
    public function shippoGenerateShipment()
    {

        if (!eshop()->config('SHIPPO_SK') || !eshop()->config('SHIPPO_COURIER'))
            throw new EshopException('Shippo Key required for Create Shipment');

        Shippo::setApiKey("YOUR_API_KEY");

        $fromAddress = array(
            'name' => 'Shawn Ippotle',
            'street1' => '215 Clayton St.',
            'city' => 'San Francisco',
            'state' => 'CA',
            'zip' => '94117',
            'country' => 'US',
            'phone' => '+1 555 341 9393',
            'email' => 'shippotle@goshippo.com'
        );

        $toAddress = array(
            'name' => 'Mr Hippo"',
            'street1' => 'Broadway 1',
            'city' => 'New York',
            'state' => 'NY',
            'zip' => '10007',
            'country' => 'US',
            'phone' => '+1 555 341 9393',
            'email' => 'mrhippo@goshippo.com'
        );

        $parcel = array(
            'length' => '5',
            'width' => '5',
            'height' => '5',
            'distance_unit' => 'in',
            'weight' => '2',
            'mass_unit' => 'lb',
        );

        return Shippo_Shipment::create(array(
                'address_from' => $fromAddress,
                'address_to' => $toAddress,
                'parcels' => array($parcel),
                'async' => false
            )
        );
    }
}
