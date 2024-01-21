<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'phone'=>['required', 'string', 'min:11'],
            'country'=>['required', 'string'],
            'address'=>['nullable', 'string'],
            'image'=>['image', 'mimes:png,jpg'],
            'referrence_id'=>['nullable', 'string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validateWithBag('updateProfileInformation');

        try {
            if ($file = $input['image'] ?? null) {
                $image_file = time() . '.' . $file->extension();
                $file->move(public_path('profile'), $image_file);
            }
    
            if ($input['email'] !== $user->email &&
                $user instanceof MustVerifyEmail) {
                $this->updateVerifiedUser($user, $input);
            } else {
                $user->forceFill([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'country' => $input['country'],
                    // 'last_name' => $input['last_name'],
                    'city' => $input['city'],
                    'state' => $input['state'],
                    'image'=>$image_file ?? $user->image,
                    'address' => $input['address'],
                    'referrence_id' => $input['referrence_id'],
                ])->save();
            }
            // Add a status message to the session
            Session::flash('status', 'Profile information updated successfully!');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Session::flash('error', 'An error occurred while updating profile information!');
        }
    
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        if ($file = $input['image'] ?? null) {
            $image_file = time() . '.' . $file->extension();
            $file->move(public_path('profile'), $image_file);
        }

        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'country' => $input['country'],
            // 'last_name' => $input['last_name'],
            'city' => $input['city'],
            'state' => $input['state'],
            'address' => $input['address'],
            'image'=>$image_file ?? $user->image,
            'referrence_id' => $input['referrence_id'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
