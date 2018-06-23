<?php


namespace MikeRees\TheNounProject\Requests;


use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use MikeRees\TheNounProject\Interfaces\RequestInterface;
use MikeRees\TheNounProject\Models\AbstractModel;
use MikeRees\TheNounProject\Responses\AbstractResponse;

abstract class AbstractRequest implements RequestInterface, \ArrayAccess
{

    /**
     * @var \MikeRees\TheNounProject\Models\AbstractModel
     */
    protected $requestModel;

    /**
     * @var \MikeRees\TheNounProject\Responses\AbstractResponse
     */
    protected $response;

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * @var \GuzzleHttp\Subscriber\Oauth\Oauth1
     */
    private $oauth;

    /**
     * @var bool
     */
    private $initialised;

    /**
     * AbstractRequest constructor.
     * Set initialised to false upon construction.
     */
    public function __construct()
    {
        $this->initialised = false;
    }

    /**
     * Populate the request model
     * @return void
     */
    abstract function buildRequest();

    /**
     * Populate the response object.
     * @param $response
     * @return void
     */
    abstract function buildResponse($response);

    /**
     * Build the connection then send the request to the API.
     */
    public function makeRequest()
    {
        $this->buildConnection();

        $response = $this->client->get($this->requestModel->uri, $this->requestModel->toArray());

        $this->buildResponse($response);


    }

    /**
     * Get the Response model.
     * @return \MikeRees\TheNounProject\Responses\AbstractResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Initialise the OAuth 1.0a handler and Guzzle Client for making requests.
     * If we've already done this, just return.
     */
    private function buildConnection()
    {

        if ($this->initialised) {
            return;
        }

        $this->oauth = new Oauth1([
            'consumer_key' => getenv('THE_NOUN_PROJECT_API_KEY'),
            'consumer_secret' => getenv('THE_NOUN_PROJECT_API_SECRET')
        ]);

        $this->client = new Client([
            'base_uri' => getenv('THE_NOUN_PROJECT_API_URL'),
            'timeout' => 5.0,
            'handler' => $this->oauth
        ]);

        $this->initialised = true;
    }

}