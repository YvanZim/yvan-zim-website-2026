<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $appends = ['link'];
    protected $guarded = [];


    public function getLinkAttribute($value)
    {
        if( $this->lang == 'en'){
            return '/news/' . $this->slug;
        }
        else {
            return '/' . $this->lang . '/news/' .  $this->slug;
        }

    }

    public function getFullTitleAttribute(){
        if( $this->type == 1){
            return trans('app.show', [], $this->lang) . ': ' . $this->title . ' (' . $this->lang . ')';
        }
        else {
            return $this->title . '(' . $this->lang . ')';
        }
    }

    public function getExcerptAttribute()
    {
        $text = strip_tags($this->content);
        $text = trim($text);

        if (mb_strlen($text) <= 200) {
            return $text;
        }

        return mb_substr($text, 0, 200) . '...';
    }
}
