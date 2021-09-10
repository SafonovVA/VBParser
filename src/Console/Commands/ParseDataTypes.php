<?php

namespace SafonovVA\VBParser\Console\Commands;

use Illuminate\Console\Command;
use SafonovVA\VBParser\Console\DataParser;
use TCG\Voyager\Models\DataType;

class ParseDataTypes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vbparse:parse-data-types';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing voyager data types';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        try {
            $parser = new DataParser();
            $parser->parse(DataType::all());
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return 1;
        }

        $this->info('Data types parsed successfully!');
        return 0;
    }
}
