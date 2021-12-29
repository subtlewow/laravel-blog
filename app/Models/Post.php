<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    /**
     * 
     * 
     */
    public function __construct($title, $excerpt, $date, $body, $slug) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    // Retrives all metadata from all post files and creates Post object from metadata properties.
    public static function all() {
        
        // For every HTTP request, the following logic is executed every time. 
        // Soln: Instead of caching for specific period, cache forever -- we have to explicitly clear the cache whenver we make changes for the new changes to show up in the browser
        return cache()->rememberForever('posts.all', function() {
            return collect(File::files(resource_path("posts/")))
            ->map(function ($file) {
                // Retrieves metadata from all .html files in the post directory in the form of an object.
                return YamlFrontMatter::parseFile($file); 
            })

            // Mapping over the $document objects
            ->map(function ($document) {
                // Creates Post object providing more control over its data, compared to using a Document object.
                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                );
            })->sortByDesc('date');
        });
    }

    public static function find($slug) {
        // From all the blog posts in the posts directory, access the post where the $slug matches the post requested.
        return self::all()->firstWhere('slug', $slug);
    }
}

