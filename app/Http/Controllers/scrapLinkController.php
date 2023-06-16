<?php

namespace App\Http\Controllers;

use Goutte\Client;

use stdClass;


use Illuminate\Http\Request;



class scrapLinkController extends Controller
{
    public function scrapeLinks()
    {

        return view('tools.webscrap', [
            'title' => 'Scrapping Links'
        ]);

        // $url = "https://codepolitan.com/";
        

        // $client = new Client();
        // $crawler = $client->request('GET', $url);

        // $links = $crawler->filter('a')->each(function ($node) {
        //     $href = $node->attr('href');
        //     $text = $node->text();

        //     return [
        //         'href' => $href,
        //         'text' => $text,
        //     ];
        // });

        
        // dd($links);
    }

    public function getScrapeLinks(Request $request){

        $link = $request->links;
        $url = $link;
        

        $client = new Client();
        $crawler = $client->request('GET', $url);

        $links = $crawler->filter('a')->each(function ($node) {
            $href = $node->attr('href');
            $text = $node->text();

            return [
                'href' => $href,
                'text' => $text,
            ];
        });

      
        // dd($links);

        return view('tools.getScrap', [
            'title' => 'Get Links',
            'links' =>$links
        ]);
    }
}
