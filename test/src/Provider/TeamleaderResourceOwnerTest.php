<?php

namespace Nascom\OAuth2\Client\Test;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use Nascom\OAuth2\Client\Provider\TeamleaderResourceOwner;
use PHPUnit\Framework\TestCase;

class TeamleaderResourceOwnerTest extends TestCase
{
    /**
     * @var TeamleaderResourceOwner
     */
    protected $owner;

    protected $sampleResponse = [
        'id' => 'some-uu-id',
        'account' => [
            'type' => 'account',
            'id' => 'account-id'
        ],
        'first_name' => 'Resource',
        'last_name' => 'Owner',
        'email' => 'resource.owner@email.com',
        'language' => 'en-GB',
        'telephones' => [
            ['type' => 'mobile', 'number' => '+32123456']
        ],
        'function' => 'Developer',
        'time_zone' => 'Europe/Brussel'
    ];

    protected function setUp()
    {
        $this->owner = new TeamleaderResourceOwner($this->sampleResponse);
    }

    public function testItImplementsTheResourceOwnerInterface()
    {
        $this->assertInstanceOf(ResourceOwnerInterface::class, $this->owner);
    }

    public function testItGetsTheId()
    {
        $this->assertEquals('some-uu-id', $this->owner->getId());
    }

    public function testItGetsTheAccount()
    {
        $this->assertNotEmpty($this->owner->getAccount());
    }

    public function testItGetsTheFirstName()
    {
        $this->assertEquals('Resource', $this->owner->getFirstName());
    }

    public function testItGetsTheLastName()
    {
        $this->assertEquals('Owner', $this->owner->getLastName());
    }

    public function testItGetsTheEmailAddress()
    {
        $this->assertEquals('resource.owner@email.com', $this->owner->getEmail());
    }

    public function testItGetsTheLanguage()
    {
        $this->assertEquals('en-GB', $this->owner->getLanguage());
    }

    public function testItGetsTelephoneNumbers()
    {
        $this->assertNotEmpty($this->owner->getTelephones());
    }

    public function testItGetsTheFunction()
    {
        $this->assertEquals('Developer', $this->owner->getFunction());
    }

    public function testItGetsTheTimezone()
    {
        $this->assertEquals('Europe/Brussel', $this->owner->getTimezone());
    }

    public function testItCanBeConvertedToArray()
    {
        $this->assertEquals($this->sampleResponse, $this->owner->toArray());
    }
}
