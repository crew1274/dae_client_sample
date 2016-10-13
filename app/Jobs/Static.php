<?php

namespace dae_client\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Static implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $wap = $request -> get('wap');
        $dns = $request -> get('dns');
        $gateway = $request -> get('gateway');
        $mask = $request -> get('mask');
        $output = array();
        exec("echo '' | sudo -S python3 /var/www/html/dae_client/python/InternetSetting.py  2  '$wap' '$mask'  '$gateway' '$dns'", $output);
        $output=last($output);
        return redirect('network');
    }
}
