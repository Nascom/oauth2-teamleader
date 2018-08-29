# Teamleader Provider for OAuth 2.0 Client

This package provides [Teamleader](https://developer.teamleader.eu/) OAuth 2.0
support for the PHP League's
[OAuth 2.0 Client](https://github.com/thephpleague/oauth2-client).

## Installation

```
composer require nascom/oauth2-teamleader
```

## Usage

See the [League documentation](http://oauth2-client.thephpleague.com/usage/). 
This package provides a Teamleader specific provider you can use instead of the 
generic one.

```php
$provider = new Nascom\OAuth2\Client\Provider\Teamleader([
    'clientId' => 'your-client-id',
    'clientSecret' => 'your-client-secret',
    'redirectUri' => 'https://example.com/your-redirect-url',
]);
```
