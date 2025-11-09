<?php

namespace App\Http\Requests\Auth;

use App\Models\Dosen;
use App\Models\Tpa;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email_institusi' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();
        
        $credentials = $this->only('email_institusi', 'password');
        \Log::info('Login attempt credentials:', ['email' => $credentials['email_institusi']]);
        
        if (! Auth::attempt($credentials, $this->boolean('remember'))) {
            \Log::warning('Login failed for:', [
                'email' => $credentials['email_institusi'],
                'user_exists' => \App\Models\User::where('email_institusi', $credentials['email_institusi'])->exists(),
                'password_hash' => \App\Models\User::where('email_institusi', $credentials['email_institusi'])->value('password')
            ]);
            
            RateLimiter::hit($this->throttleKey());
            
            throw ValidationException::withMessages([
                'email_institusi' => trans('auth.failed'),
            ]);
        }



        //set session  
        $user = User::where('email_institusi', $credentials['email_institusi'])->first();
        $user['role']=null;
        if($user){
            $user['role'] = [Tpa::where('users_id', $user->id)->first()?'TPA':'Dosen'];
        }
        session(['account' => $user]);
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email_institusi' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email_institusi')).'|'.$this->ip());
    }
}
