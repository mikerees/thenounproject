<?php

namespace MikeRees\TheNounProject\Responses;


abstract class AbstractResponse
{

    private $responseModel;

    private $rawResponse;

    public function getResponse()
    {
        return $this->responseModel;
    }

    public function getRawResponse()
    {
        return $this->rawResponse;
    }

    abstract function hydrate();

}