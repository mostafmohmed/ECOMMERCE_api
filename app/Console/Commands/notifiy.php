<?php

namespace App\Console\Commands;

use App\Mail\Ntifiy;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\select;

class notifiy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notifiy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notifiy order';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    
         $emails=User::pluck('email')->toArray();
         $data=['name'=>'jjjj','age'=>3,'last'=>'vvvv'];
  foreach( $emails as $email){
    Mail::to($email)->send( new Ntifiy($data));
  }
        
    }
}
