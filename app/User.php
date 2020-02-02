<?php

namespace App;

use App\Notifications\NewDonor as NewDonorNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Stripe\Customer;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // TODO: delete this
    // public function newCustomerWithCard($token, $stripeAttributes, $modelAttributes)
    // {

    //     $this->email = $stripeAttributes['email'];
    //     $this->name = $modelAttributes['name'];
    //     $this->password = \Hash::make($modelAttributes['password']);
    //     $this->createAsStripeCustomer($token, $stripeAttributes);
    //     $this->save();
    //     $this->sendNewCustomerEmail();

    //     return $this;
    // }

    public function newCustomerWithoutCard($data) {
        $firstName = $data['first_name'];
        $lastName = $data['last_name'];
        $name = $firstName . ' ' . $lastName;
        $email = $data['email'];
        $password = $data['password'];

        $customer = Customer::create(
            compact('name', 'email'), $this->getStripeKey()
        );
        $customer->metadata = [
            'first_name' => $firstName,
            'last_name' => $lastName
        ];
        $customer->save();

        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->stripe_id = $customer->id;

        $this->save();

        return $this;
    }

    public function sendNewCustomerEmail()
    {
        $broker = \Password::broker();
        $token = $broker->createToken($this);
        $this->notify(new NewDonorNotification($token));
    }

    public function hasAddress()
    {
        return !! $this->address_line_one;
    }
}
