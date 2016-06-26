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
     * @var \App\User
     */
    protected $user;

    /**
     * Create a new SendMailCommand instance.
     *
     * @param  \App\User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @param  Mailer $mailer
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $data = [
            'title'       => 'Activation de votre compte Xétian',
            'intro'       => 'Pour valider votre compte Xétian et accéder à toutes les fonctionnalitées du site,',
            'link'        => 'cliquez ici',
            'active_code' => $this->user['token_active'],
        ];

        $mailer->send('emails.auth.verify', $data, function ($message) {
            $message->to($this->user['email'], $this->user['login'])
                ->subject(trans('Vérifiez votre compte'));
        });
    }
}
