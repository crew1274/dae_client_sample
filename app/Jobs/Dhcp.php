<?php

namespace dae_client\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Dhcp implements ShouldQueue
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
        $output = array();
        exec("echo '' | sudo -S python3 /var/www/html/dae_client/python/InternetSetting.py  1 ", $output);
        $output=last($output);
        return redirect('network');
    }
}
