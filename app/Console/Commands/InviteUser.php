<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\InviteService;
use Illuminate\Console\Command;

class InviteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invite:user {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Invite new user';

    /**
     * InviteService
     * 
     * @var [type]
     */
    protected $invitation;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    
    public function __construct(InviteService $invitation)
    {
        parent::__construct();

        $this->invitation = $invitation;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->argument('email');

        $user = User::where('email', $email)->get();

        if(!$user->isEmpty()) {
            $this->info('User account already exist!');
        }else {
            $this->invitation->invite($email);
            $this->info('User invitation created successfully!');
        }
    }
}
