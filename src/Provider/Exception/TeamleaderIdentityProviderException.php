<?php

namespace Nascom\OAuth2\Client\Provider\Exception;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class TeamleaderIdentityProviderException
 *
 * @package Nascom\OAuth2\Client\Provider\Exception
 */
class TeamleaderIdentityProviderException extends IdentityProviderException
{
    /**
     * @param ResponseInterface $response
     * @param string $message
     * @return TeamleaderIdentityProviderException
     */
    public static function fromResponse(
        ResponseInterface $response,
        $message = ''
    ) {
        return new static(
            $message,
            $response->getStatusCode(),
            $response->getBody()->getContents()
        );
    }
}
