<?php

namespace App\Models;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

class Api 
{
    public function getNews($source)
    {
    	try {
    		 
    		 $client        = new GuzzleHttpClient();

    		 $apiRequest    = $client->request('GET', 'https://newsapi.org/v2/top-headlines?country=id&apikey=55ac21787f75465baa09b675268c6e73');

    		 $content       = json_decode($apiRequest->getBody()->getContents(), true);

    		 return $content['top-headlines']  

    	} catch (Exception $e) {
			 echo Psr7\str($e->getRequest());
		          if ($e->hasResponse()) {
		            echo Psr7\str($e->getResponse());
	          }
    	}
    }
}
