<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class CheckUsersColumns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debug:users-columns';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check columns in users table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("=== KOLOM TABEL USERS ===");
        
        $columns = Schema::getColumnListing('users');
        
        foreach ($columns as $column) {
            $this->info("- {$column}");
        }

        $this->info("\n=== TOTAL KOLOM: " . count($columns) . " ===");

        return Command::SUCCESS;
    }
}
