<?php

namespace App\Console\Commands;

use App\Models\Role;

use App\Models\User;

use App\Models\Post;
use Illuminate\Console\Command;

class createrole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    
    protected $signature = 'createrole';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $name = $this->argument('name');
        $role = new Role;
		
		$role->name = $name;
		
		$role->save();
      //  dd(Role::with('users')->where('id', User::first()->id));
      // $this->info(Post::GetUserPosts(2)->first());
    }
}
