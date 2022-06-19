<?php

namespace App\Console\Commands;

use App\Models\Question;
use App\Models\QuestionAnswerUser;
use App\User;
use Illuminate\Console\Command;

class CompleteInformation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'info:complete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify user to complete his information';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo "Started at\n " . now()->format('Y-m-d H:i:s'); ;
        $questionsIDs = Question::where('can_skip', false)->pluck('id');
        $users = User::get()->pluck('id');
        foreach ($questionsIDs as $questionID) {
            foreach ($users as $user) {
                $answer = QuestionAnswerUser::where('user_id', $user)->where('qu_id', $questionID)->first();
                if ($answer == null) {
                    $user = User::find($user);
                    $user->notify(new \App\Notifications\CompleteInformationNotification());
                    // $user->notifyAt(new \App\Notifications\CompleteInformationNotification(), now());
                }
            }
        }
        // $usersIDs = QuestionAnswerUser::where('user_id', $questionsIDs)->get();
        // foreach ($users as $user) {
        //     $user->notify(new App\Notifications\CompleteInformation());
        // }
        return 0;
    }
}
