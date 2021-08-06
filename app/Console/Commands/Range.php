<?php

namespace App\Console\Commands;

use App\Models\Buy;
use App\Models\User;
use Illuminate\Console\Command;

class Range extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'range:range';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command range';

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
        $users = User::where('rango', 20)->where('rango', '<', 10)->get();

        foreach ($users as $user) {

            $count = 0;
            $refers = User::where('master', $user->id)->get();
            foreach ($refers as $refer) {
                $compras = Buy::where('user_id', $refer->id)->count();
                if ($compras > 0) {
                    $count++;
                }
            }  

            if($user->rango != $count){
                switch ($count) {
                    case '1':
                        $user->puntos += 100;
                        break;
                    case '5':
                        $user->puntos += 375;
                        break;
                    case '10':
                        $user->puntos += 450;
                        break;
                    case '20':
                        $user->puntos += 950;
                        break;

                    default:
                        
                        break;
                }
                $user->rango = $count;
                $user->save();
            }         
        }
        
    }
}
