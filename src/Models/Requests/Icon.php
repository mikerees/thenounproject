<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 23/06/2018
 * Time: 10:33
 */

namespace MikeRees\TheNounProject\Models\Requests;


class Icon extends \MikeRees\TheNounProject\Models\AbstractModel
{

    /**
     * @var integer the ID of the icon to request
     */
    public $id;

    public $uri = "icon";

}