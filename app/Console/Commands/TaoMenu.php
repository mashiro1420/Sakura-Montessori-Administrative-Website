<?php

namespace App\Console\Commands;

use App\Models\ThucDonModel;
use App\Models\TuanModel;
use Illuminate\Console\Command;

class TaoMenu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tao-menu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $nam = date('Y');
        $tuans = TuanModel::where('nam',$nam)->get();
        foreach( $tuans as $tuan ){
            for($i = 2; $i<=6;$i++){
                $menu = new ThucDonModel();
                $menu->id_tuan = $tuan->id;
                $menu->thu = $i;
                
                try{
                    $menu->saveOrFail();
                }catch(\Exception $e){
                    continue;
                }
            }
        }
    }
}
