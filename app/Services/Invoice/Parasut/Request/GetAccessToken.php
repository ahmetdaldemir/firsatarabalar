<?php namespace App\Services\Invoice\Parasut\Request;

use App\Abstracts\InvoiceServiceRequest;
use App\Contracts\GetAccessToken as GetAccessTokenContract;
use App\Services\Invoice\Parasut\ParasutService;

final class GetAccessToken extends InvoiceServiceRequest implements GetAccessTokenContract
{

    protected $base_uri;
    protected $path = 'oauth/token';
    protected $method = 'post';
    protected $type = 'rest';
    protected $options = [
        'headers' => [
            'content-type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ];

    /**
     * The access token retrieved from the request
     *
     * @var string
     */
    private string $accessToken;
    private int $accessTokenExpiration = 0;
    private string $refreshToken = '';

    public function __construct(ParasutService $invoiceService)
    {
        $this->hyperConfig = $invoiceService->getHyperConfig();
        $this->options['body'] = json_encode([
            'grant_type' => 'password',
            'client_id' => $this->hyperConfig->crediantials['username'],
            'client_secret' => $this->hyperConfig->crediantials['password'],
            'username' => 'saidyalim@hotmail.com',
            'password' => '123456',
            'redirect_uri' => 'urn:ietf:wg:oauth:2.0:oob',
         ]);
        parent::__construct($invoiceService);
    }

    protected function onSuccess(): void
    {
        $content = json_decode($this->getContent());
        $this->setAccessToken($content->access_token)
            ->setAccessTokenExpiration($content->expires_in)
            ->setRefreshToken($content->refresh_token);
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     * @return GetAccessToken
     */
    private function setAccessToken(string $accessToken): GetAccessToken
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return int
     */
    public function getAccessTokenExpiration(): int
    {
        return $this->accessTokenExpiration;
    }

    /**
     * @param int $accessTokenExpiration
     * @return GetAccessToken
     */
    private function setAccessTokenExpiration(int $accessTokenExpiration): GetAccessToken
    {
        $this->accessTokenExpiration = $accessTokenExpiration;
        return $this;
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    /**
     * @param string $refreshToken
     * @return GetAccessToken
     */
    private function setRefreshToken(string $refreshToken): GetAccessToken
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }

}