<?php 

namespace App;

use Corcel\Model\Post as Corcel;
use Tbruckmaier\Corcelacf\AcfTrait;

class Post extends Corcel {

    use AcfTrait;

    public static function boot(){
        self::addAcfRelations(['title','thumbnail']);
        parent::boot();
    }

}