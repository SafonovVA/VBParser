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
        try {
            $parser = new DataParser();
            $parser->parse(Role::all());
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return 1;
        }

        $this->info('Data rows parsed successfully!');
        return 0;
    }
}
