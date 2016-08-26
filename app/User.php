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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function newCustomerWithCard($token, $stripeAttributes, $modelAttributes)
    {

        $this->email = $stripeAttributes['email'];
        $this->name = $modelAttributes['name'];
        $this->password = \Hash::make($modelAttributes['password']);
        $this->createAsStripeCustomer($token, $stripeAttributes);
        $this->save();
        $this->sendNewCustomerEmail();
    }

    public function newCustomerWithoutCard($data) {
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];

        $customer = Customer::create(
            compact('email'), $this->getStripeKey()
        );

        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->stripe_id = $customer->id;

        $this->save();
    }

    public function sendNewCustomerEmail()
    {
        $broker = \Password::broker();
        $token = $broker->createToken($this);
        $this->notify(new NewDonorNotification($token));
    }

}
