<?php

namespace Nascom\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Tool\ArrayAccessorTrait;

/**
 * Class TeamleaderResourceOwner
 *
 * @package Nascom\OAuth2\Client\Provider
 */
class TeamleaderResourceOwner implements ResourceOwnerInterface
{
    use ArrayAccessorTrait {
        getValueByKey as arrayAccessorTraitGetValueByKey;
    }

    /**
     * @var array
     */
    protected $response;

    /**
     * TeamleaderResourceOwner constructor.
     *
     * @param array $response
     */
    public function __construct(array $response = [])
    {
        $this->response = $response;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getValueByKey('id', '');
    }

    public function getAccount()
    {
        return $this->getValueByKey('account', []);
    }

    public function getFirstName()
    {
        return $this->getValueByKey('first_name', '');
    }

    public function getLastName()
    {
        return $this->getValueByKey('last_name', '');
    }

    public function getEmail()
    {
        return $this->getValueByKey('email', '');
    }

    public function getLanguage()
    {
        return $this->getValueByKey('language', '');
    }

    public function getTelephones()
    {
        return $this->getValueByKey('telephones', []);
    }

    public function getFunction()
    {
        return $this->getValueByKey('function', '');
    }

    public function getTimezone()
    {
        return $this->getValueByKey('time_zone', '');
    }

    /**
     * @inheritdoc
     */
    public function toArray()
    {
        return $this->response;
    }

    /**
     * Just the ArrayAccessorTrait's getValueByKey method, but with the first
     * parameter prefilled.
     *
     * @param $key
     * @param null $default
     * @return mixed
     */
    private function getValueByKey($key, $default = null)
    {
        return $this->arrayAccessorTraitGetValueByKey(
            $this->response,
            $key,
            $default
        );
    }
}
