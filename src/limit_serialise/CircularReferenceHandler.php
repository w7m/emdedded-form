<?php
/**
 * Created by PhpStorm.
 * User: wmhamdi
 * Date: 25/01/2019
 * Time: 11:02
 */

namespace App\limit_serialise;


class CircularReferenceHandler
{
    public function __invoke($object)
    {
        return $object->getId();
    }

}