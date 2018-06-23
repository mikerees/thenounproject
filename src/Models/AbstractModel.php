<?php

namespace MikeRees\TheNounProject\Models;


class AbstractModel
{

    /**
     * Get the properties of the model as an associative array, excluding URI and Method
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }

}