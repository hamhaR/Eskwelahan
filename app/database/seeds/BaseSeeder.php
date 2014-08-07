<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseSeeder extends Seeder {

    /**
     * DB table name
     *
     * @var string
     */
    protected $table;

    /**
     * CSV filename
     *
     * @var string
     */
    protected $filename;

    /**
     * Run DB seed
     */
    public function run() {
        $this->info('Creating sample users...');
        // DB::table($this->table)->truncate();
    }

    

}
