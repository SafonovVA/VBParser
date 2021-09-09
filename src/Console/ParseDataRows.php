<?php

namespace SafonovVA\VBParser\Console;

use Illuminate\Console\Command;

class ParseDataRows extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vbparser:parse-data-rows';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing voyager data rows';




    public function handle()
    {
        echo 'haha';
    }
}
