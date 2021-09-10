<?php

namespace SafonovVA\VBParser\Console\Commands;

use Illuminate\Console\Command;
use SafonovVA\VBParser\Console\DataParser;
use TCG\Voyager\Models\User;

class ParseUserRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vbparse:parse-user-roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing user_roles table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $parser = new DataParser();
        $parser->parseUserRoles();

        $this->info('Data types parsed successfully!');
        return 0;
    }
}
