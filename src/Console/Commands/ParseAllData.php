<?php

namespace SafonovVA\VBParser\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ParseAllData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vbparse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse all voyager data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        try {
            Artisan::call('vbparse:parse-data-rows');
            $this->info('Data rows parsed successfully!');

            Artisan::call('vbparse:parse-data-types');
            $this->info('Data types parsed successfully!');

            Artisan::call('vbparse:parse-menu');
            $this->info('Menu parsed successfully!');

            Artisan::call('vbparse:parse-menu-items');
            $this->info('Menu items parsed successfully!');

            Artisan::call('vbparse:parse-roles');
            $this->info('Roles parsed successfully!');

            Artisan::call('vbparse:parse-user-roles');
            $this->info('User-roles parsed successfully!');
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return 1;
        }

        return 0;
    }
}
