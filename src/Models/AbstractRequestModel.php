<?php

namespace MikeRees\TheNounProject\Models;


class AbstractRequestModel
{

    /**
     * @var string The endpoint in the API
     */
    public $uri;

    /**
     * Get the properties of the model as an associative array, excluding URI and Method
     * @return array
     */
    public function toArray()
    {
        $vars = get_object_vars($this);
        unset($vars["uri"]);

        return $vars;
    }

}