<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UserReStriction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:restriction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User Restriction Command ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $sevenYears = Carbon::now()->subYears(7);
        $users = User::where('retention' , '=', 1)->where('created_at', '<=', $sevenYears)->get();
        foreach ($users as $user) {
            $user->delete();
        }
        $this->info('User Restriction Command Run successfully');
        return Command::SUCCESS;
    }
}
