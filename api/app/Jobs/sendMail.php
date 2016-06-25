<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\User;
use Request;
use Illuminate\Contracts\Mail\Mailer;

class SendMail extends Job
{

    /**
     * User Model.
     *
     * @var App\Models\User
     */
    protected $user;

    /**
     * Create a new SendMailCommand instance.
     *
     * @param  App\Models\User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @param  Mailer  $mailer
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $data = [
            'title'  => 'Un nouveau message',
            'intro'  => 'Pour valider votre compte',
            'link'   => 'cliquez ici pour valider',
            'active_code' => $this->user['token_active']
        ];


        $mailer->send('emails.auth.verify', $data, function($message) {
            $message->to($this->user['email'], $this->user['login'])
                ->subject(trans('Vérifiez votre compte'));
        });
    }
}
