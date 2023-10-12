<?php

namespace App\Modules\Notification\Jobs;

use App\Modules\BaseApp\BaseNotification\NotifierFactory\NotifierFactory;
use App\Modules\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendActivationCode implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(public User $user, public $notificationData = [])
    {
    }


    public function handle()
    {
        $this->generateOtp();
        if ($this->user->otp) {
            $this->sendNotification($this->notificationData);
        }
    }

    private function generateOtp(): void
    {
        $otp = rand(1000, 9999);
        $isExists = User::query()
            ->where("otp", "=", $otp)
            ->exists();

        if ($isExists) {
            $this->generateOtp();
        }

        $this->user->otp = $otp;
        $this->user->save();
    }

    private function sendNotification($data)
    {
        $notificationData = [];
        if (isset($data['email'])) {
            $notificationData = [
                'users' => $data['users'],
                'mail' => [
                    'data' => array_merge($data['email']['data'], ['code' => $this->user->otp, 'lang' => $this->user->language]),
                    'view' => $data['email']['view'] ?? 'otp_template',
                    'subject' => $data['email']['subject'],
                ],
            ];
        }
        (new NotifierFactory())->send($notificationData);
    }
}
