<?php

namespace SafonovVA\VBParser\Console\Commands;

use Illuminate\Console\Command;
use SafonovVA\VBParser\Console\DataParser;
use TCG\Voyager\Models\Menu;

class ParseMenu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vbparse:parse-menu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing voyager menu';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $parser = new DataParser();
        $parser->parse(Menu::all());

        $this->info('Data rows parsed successfully!');
        return 0;
    }
}
