<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $appends = ['link'];
    protected $guarded = [];

    public function getLinkAttribute() {

        if( $this->lang == 'en'){
            return $this->slug;
        }
        else {
            return $this->lang . '/' . $this->slug;
        }

    }

    public function getSectionsAttribute(){
        return json_decode($this->content);
    }
}
