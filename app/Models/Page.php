<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Page extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $appends = ['link'];
    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }

    protected function casts(): array
    {
        return [
            'content' => 'array',
        ];
    }

    public function getLinkAttribute() {

        if( $this->lang == 'en'){
            return $this->slug;
        }
        else {
            return $this->lang . '/' . $this->slug;
        }

    }

    public function getSectionsAttribute(){
        $content = $this->content;

        if (is_string($content)) {
            $content = json_decode($content, true);
        }

        if (! is_array($content)) {
            return collect();
        }

        return collect($content)->map(function ($block) {
            return (object) [
                'type' => $block['type'],
                'data' => (object) ($block['data'] ?? []),
            ];
        });
    }
}
