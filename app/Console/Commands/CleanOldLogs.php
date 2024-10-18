<?php

namespace App\Console\Commands;

use App\Models\Apilog;
use Illuminate\Console\Command;

class CleanOldLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean-old-logs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete API logs older than 30 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $deletedCount = Apilog::where('created_at', '<', now()->subDays(30))->forceDelete();

        $this->info("Old API logs deleted successfully: {$deletedCount} log(s) deleted.");
    }
}
