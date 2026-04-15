<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use illuminate\Support\Carbon;


class PurgeArchieveUsers extends Command
{
    protected $signature = 'users:purge-archived';
    protected $description = 'Permanently delete users archived for more than 30 days';


    public function handle()
    {
        $count = User::onlyTrashed()
                     ->where('deleted_at', '<=', Carbon::now()->subDays(30))
                     ->forceDelete();

        $this->info("Purged {$count} archived user(s).");
    }
}
