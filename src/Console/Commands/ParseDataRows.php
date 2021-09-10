<?php

namespace SafonovVA\VBParser\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use SafonovVA\VBParser\Console\DataParser;
use TCG\Voyager\Models\DataRow;

class ParseDataRows extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vbparse:parse-data-rows';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing voyager data rows';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        try {
            $parser = new DataParser();
            $parser->parse(DataRow::all());
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return 1;
        }

        $this->info('Data rows parsed successfully!');
        return 0;
    }

}
