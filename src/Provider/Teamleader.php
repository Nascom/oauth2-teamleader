<?php

namespace Nascom\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use Nascom\OAuth2\Client\Provider\Exception\TeamleaderIdentityProviderException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Teamleader
 *
 * @package Nascom\OAuth2\Client\Provider
 */
class Teamleader extends AbstractProvider
{
    const OAUTH_BASE_URL = 'https://app.teamleader.eu/oauth2/';
    const API_BASE_URL = 'https://api.teamleader.eu/';

    /**
     * @inheritdoc
     */
    public function getBaseAuthorizationUrl()
    {
        return self::OAUTH_BASE_URL . 'authorize';
    }

    /**
     * @inheritdoc
     */
    public function getBaseAccessTokenUrl(array $params)
    {
        return self::OAUTH_BASE_URL . 'access_token';
    }

    /**
     * @inheritdoc
     */
    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return self::API_BASE_URL . 'users.me';
    }

    /**
     * @inheritdoc
     */
    protected function getDefaultScopes()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    protected function getAuthorizationHeaders($token = null)
    {
        if (!$token instanceof AccessToken) {
            return [];
        }

        return ['Authorization' => 'Bearer ' . $token->getToken()];
    }

    /**
     * @inheritdoc
     */
    protected function checkResponse(ResponseInterface $response, $data)
    {
        if ($response->getStatusCode() !== 200) {
            throw TeamleaderIdentityProviderException::fromResponse($response);
        }
    }

    /**
     * @inheritdoc
     *
     * @return TeamleaderResourceOwner
     */
    protected function createResourceOwner(array $response, AccessToken $token)
    {
        if (!isset($response['data'])) {
            throw new \RuntimeException('Unexpected response from the resource owner call');
        }

        return new TeamleaderResourceOwner($response['data']);
    }
}
