<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMailNa extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendMailNa:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envio de correo a los na';

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
        $hoy = \Carbon\Carbon::now();

        $datos = \App\Dato::where([['case','na'],['mail',0]])->whereDate('updated_at',date_format($hoy,'Y-m-d'))->get();

        foreach ($datos as $key => $dato) {
            if ($dato->email != null) {
                Mail::to($dato->email)->send(new \App\Mail\MailNa($dato));
                echo $dato->email." - enviado OK \n";
            }
            $dato->mail = 1;
            $dato->save();
        }
    }
}
