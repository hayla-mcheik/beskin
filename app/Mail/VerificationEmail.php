<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user; 
    public $token;
    /**
     * Create a new message instance.
     *
     * @param User|string $user
     * @param string $verificationToken
     */
    public function __construct(User $user, $token)
    {
        $this->user = $user;
        $this->token = $token; // Pass the token to the constructor
    }
    
    public function build()
    {
        return $this->from(env('SHOP_MAIL_FROM'), env('APP_NAME'))
                    ->subject('Verify Your Email Address')
                    ->view('auth.verify-email')
                    ->with([
                        'user' => $this->user,
                        'token' => $this->token, 
                    ]); 
    }
    
}
