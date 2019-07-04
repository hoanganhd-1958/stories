<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use App\Models\Chapter;

class CrawlCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:start {name} {url} {storyId} {posstion}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Give me url, I will give you the content';

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
     * @return mixed
     */
    public function handle()
    {
        $content = [];
        $client = new Client();
        $crawler = $client->request('GET', $this->argument('url'));
        $crawler->filter('div')->children('p')->reduce(function ($node, $i) use (&$content) {
            array_push($content, '<p>' . $node->text() . '</p>');
        });

        Chapter::create([
            'name' => $this->argument('name'),
            'content' => implode(' ', $content),
            'publish' => false,
            'posstion' => $this->argument('posstion'),
            'view_count' => 0,
            'story_id' => $this->argument('storyId'),
        ]);

        return true;
    }
}
