<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 16/06/2018
 * Time: 15:22
 */

namespace MikeRees\TheNounProject\Interfaces;


interface RequestInterface
{

    function buildRequest();

    function makeRequest();

    function getResponse();

}