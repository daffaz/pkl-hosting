<?php

namespace App\Console\Commands;

use App\Models\Peminjaman;
use Illuminate\Console\Command;
use DateTime;


class CekDenda extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cek:denda';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 0;
        $denda = Peminjaman::get();
        // dd($denda->status);
        foreach ($denda as $d) {
        // echo date('d', strtotime($denda->lastreturn)) >= date('d', strtotime($denda->created_at));
            // $tenggat = date('d', strtotime($d->lastreturn)) - date('j');
            $date1 = new DateTime(date('y-m-d', strtotime($d->lastreturn)));
            $date2 = new DateTime(date('y-m-d'));
            $interval = $date1->diff($date2);
            // if (date('d', strtotime($d->lastreturn)) >= date('d', strtotime($d->created_at))) {
            if ($interval->d < 1) {
                $d['status'] = 'Denda';
                $d->save();
                echo json_encode($d) . "\n";
            }
        }
        return 0;
    }
}
