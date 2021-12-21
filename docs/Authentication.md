# Authentication

## API URL

The URL to call is composed of "apiUrl" + "apiVersion" + "endpoint".

## SSL

SSL is required for all API calls.
The APi will return a `400 Bad Request` in case SSL is not used.

## JWT

Authentication is done via a `JSON Web Token` (`JWT`) sent via a Bearer Authorization header.

JSON Web Tokens are an open, industry standard RFC 7519 method for representing claims securely between two parties.

Please see the separate [JWT documentation](/docs/JWT.md).

### Handling authentication errors

### Errors

In case of an error, the API will return a `401 Unauthorized` response.  
The response `JSON API` document will contain an `error` object.
The API response will also contain a `WWW-Authenticate` header containing information about the error.

Please see the [Error Handling documentation](/docs/ErrorHandling.md) for further information about errors.  

#### Error messages

| Message                                   | Explanation                                                                 |
|-------------------------------------------|-----------------------------------------------------------------------------|
| "Missing or invalid authorization header" | The `Authorization` header is missing or contains invalid data              |
| "Invalid token: <further details>"        | The `JSON WEB Token` is not valid. Further details will e provided.         |
| "Token is missing required data"          | The `JSON WEB Token` is missing required data.                              |
| "Authorization failed"                    | The `JSON WEB Token` is valid, however the authentication was unsuccessful. |
