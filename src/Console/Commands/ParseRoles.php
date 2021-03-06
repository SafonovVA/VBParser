<?php

namespace SafonovVA\VBParser\Console\Commands;

use Illuminate\Console\Command;
use SafonovVA\VBParser\Console\DataParser;
use TCG\Voyager\Models\Role;

class ParseRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vbparse:parse-roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing voyager roles';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $parser = new DataParser();
        $parser->parse(Role::all());

        $this->info('Data rows parsed successfully!');
        return 0;
    }
}
