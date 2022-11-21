<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Veranstalung;

class ticketdownload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticket:download';

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

    public function getData($page)
    {
        

	$curl1 = curl_init();

	curl_setopt_array($curl1, array(
	  CURLOPT_URL => 'https://app.ticketmaster.com/discovery/v2/events.json?source=ticketmaster&locale=en-us,en-ca&size=199&apikey=Kv6iTMSjEScD0J3vzvmEUuJmaMWFOFdo&page=' . $page,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_SSL_VERIFYHOST=> false,
	  CURLOPT_SSL_VERIFYPEER=> false,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	));

	 $response1 = curl_exec($curl1);

	$jsonArr1 = json_decode($response1,true);
    return $jsonArr1;
    }

    public function handle()
    {
        
        

  for($i=0;$i<5;$i++){
    $jsonArr1 = $this->getData($i);
    $events= $jsonArr1['_embedded']['events'];
        foreach($events as $event){
             if( \App\Models\Veranstaltung::where('url',$event['url'])->count()==0){
                if(isset($event['sales']['public']['startDateTime'])&&isset($event['sales']['public']['endDateTime'])){
                    \App\Models\Veranstaltung::create([
                    'title'=>$event['name'],
                    'url'=>$event['url'],
                    'thumbnail'=>$event['images'][0]['url'],
                    'ticketsalestart'=>$event['sales']['public']['startDateTime'],
                    'ticketsaleend'=>$event['sales']['public']['endDateTime'],
                    ]);
                }
             
        }
      }
    
    }
  }
}
