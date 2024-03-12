<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class exapiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:exapiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expired user evry 5 minte';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users=User::where('expire',0)->get();
        foreach($users as $user){
            $user->update(['expire'=>1]);
        }
    }
}
