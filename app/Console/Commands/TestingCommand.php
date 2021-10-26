<?php

namespace App\Console\Commands;

use App\Models\Author;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Console\Command;

class TestingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testing';

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
        Tag::insert([
            ['name' => 'newTag1'],
            ['name' => 'newTag2']
        ]);

        $post = new Post();
        $post->title = 'New post title';
        $post->content = 'A few words about something...';
        $post->date = date("Y-m-d H:i:s");
        $post->comments = 2;
        $post->image = 'blog_2.jpg';
        $post->author()->associate(Author::first());
        $post->save();

        $post->tags()->sync(Tag::all()->reverse()->take(2)->pluck('id'));

        return Command::SUCCESS;
    }
}
