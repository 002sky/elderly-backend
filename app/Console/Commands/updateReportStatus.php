<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class updateReportStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:updateReportStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command updateReportStatus';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
