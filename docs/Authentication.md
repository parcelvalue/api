# Authentication

Authentication is done via a JSON Web Token sent via a Bearer Authorization header.

## SSL
SSL is required for all API calls.
The APi will return a `400 Bad Request` in case SSL is not used.

## JWT

API authentication uses JSON Web Tokens (JWT).
> JSON Web Tokens are an open, industry standard RFC 7519 method for representing claims securely between two parties.

There are JWT libraries available for a multitude of programming languages.  
Please see https://jwt.io/ for more information.

The JWT Hashing algorithm used by the ParcelValue API is  `HMAC SHA256`

A request JWT will have the following structure:

### HEADER:ALGORITHM & TOKEN TYPE
```
{
  "alg": "HS256",
  "typ": "JWT"
}
```

### PAYLOAD:DATA
```
{
  "sub": "{clientId}",
  "clientKey": "{clientKey}"
}
```

The JWT will be constructed using the following data you should have been provided with (please check in the ParcelValue client area for the up to date information): `clientId`, `clientKey`, `serverKey`.

For an example of generating a JWT in PHP please see the project [parcelvalue/api-client](https://github.com/parcelvalue/api-client)

The JWT should be sent via a "`Bearer`" `Authorization` HTTP Header, like so:
```
Authorization: Bearer {JWT}
```

### Handling authentication errors

If the authorization was not successful, the API will return a `401 Unauthorized` response, along with an `WWW-Authenticate` header containing information about the error.

Example:
```
GET /v999/clients/current HTTP/1.1
Accept: application/vnd.api+json
Host: api.parcelvalue.eu

HTTP/1.1 401 Unauthorized
Date: Thu, 25 Oct 2018 15:53:09 GMT
Server: Apache/2.4.6 (CentOS) OpenSSL/1.0.2k-fips mod_fcgid/2.3.9 mod_python/3.5.0- Python/2.7.5
X-Powered-By: PHP/7.1.17
WWW-Authenticate: Bearer realm="api.parcelvalue.eu", error="authorization_exception", error_description="Invalid authorization header"
Content-length: 118
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json; charset=utf-8

{"jsonapi":{"version":"1.0"},"errors":[{"status":401,"title":"Unauthorized","detail":"Invalid authorization header"}]}
```
