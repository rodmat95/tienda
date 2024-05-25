<?php

namespace App\Actions\Fortify;

use App\Models\Customer;
use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $this->createCustomer($user);

        return $user;
    }

    public function createCustomer(User $user): void
    {
        $customer = Customer::create([
            'user_id' => $user->id
        ]);
        
        //$this->updateShoppingCart($customer);
        $this->createShoppingCart($customer);
    }

    public function createShoppingCart(Customer $customer): void
    {
        ShoppingCart::create([
            'customer_id' => $customer->id
        ]);
    }

    /* public function updateShoppingCart(Customer $customer): void
    {
        $sessionID = session()->getId();
        $cart = ShoppingCart::where('session_id', $sessionID)->first();

        $newSession = session()->get('user_id');
        dd([
            $customer->id,
            $newSession,
        ]);
        $sameSession = $newSession->where('user_id', $customer->id)->first();

        if ($cart) {
            $cart->update([
                'session_id' => $sameSession,
                'customer_id' => $customer->id
            ]);
        }
    } */
}