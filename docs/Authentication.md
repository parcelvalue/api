# Authentication

Authentication is done via a `JSON Web Token` (`JWT`) sent via a Bearer Authorization header.

## SSL
SSL is required for all API calls.
The APi will return a `400 Bad Request` in case SSL is not used.

## JWT

> JSON Web Tokens are an open, industry standard RFC 7519 method for representing claims securely between two parties.

There are `JWT` libraries available for a multitude of programming languages.  
Please see https://jwt.io/ for more information.

The `JWT` Hashing algorithm used by the ParcelValue API is  `HMAC SHA256`

A request `JWT` will have the following structure:

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
  "sub": "<clientId>",
  "clientKey": "<clientKey>"
}
```

The `JWT` will be constructed using the following data you should have been provided with (please check in the ParcelValue client area for the up to date information): `clientId`, `clientKey`, `serverKey`.

For an example of generating a JWT in PHP please see the project [parcelvalue/api-client](https://github.com/parcelvalue/api-client)

The JWT should be sent via a "`Bearer`" `Authorization` HTTP Header, like so:
```
Authorization: Bearer <JWT>
```

### Handling authentication errors

### Errors
In case of an error, the API will return a `401 Unauthorized` response.  
The response `JSON API` document will contain an `error` object.
The API response will also contain a `WWW-Authenticate` header containing information about the error.
> Please see the [Errors documentation](docs/Errors.md) for further information about errors.  

#### Error messages
| Message                                   | Explanation                                                                 |
|-------------------------------------------|-----------------------------------------------------------------------------|
| "Missing or invalid authorization header" | The `Authorization` header is missing or contains invalid data              |
| "Invalid token: <further details>"        | The `JSON WEB Token` is not valid. Further details will e provided.         |
| "Token is missing required data"          | The `JSON WEB Token` is missing required data.                              |
| "Authorization failed"                    | The `JSON WEB Token` is valid, however the authentication was unsuccessful. |
