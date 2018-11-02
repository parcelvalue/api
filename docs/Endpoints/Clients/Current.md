# `/clients/current`

Retrieve information about the current client.

Methods : `GET`, `HEAD`

## Request
#### `GET` `/clients/current`
#### `HEAD` `/clients/current`
The request should contain no content body.

## Response
On success, the API will return a `JSON API` document with a `client` object as the `data` member.  
The `id` member of the `client` object will contain the ParcelValue client id.

> Tip: in order to simply verify the authentication status, one could issue a `HEAD` request instead of `GET`.

### Response codes
| Result  | HTTP status code   |
|---------|--------------------|
| Success | `200 OK`           |
| Error   | `401 Unauthorized` |
> Please see the [Error Handling documentation](/docs/ErrorHandling.md) for further information about errors.

> Please see the [Authentication documentation](/docs/Authentication.md) for further information about the authentication process and error handling.

---
## Response document structure

### `client` object attributes
| Name   | Description | Type  |
|--------|-------------|-------|
| `name` | Client name |string |

---

## Examples

### Valid authentication
```
GET /v1/clients/current HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Fri, 02 Nov 2018 13:53:48 GMT
Server: Apache
Content-length: 113
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"client","id":<ClientId>,"attributes":{"name":"<ClientName>"}}}
```

### No `Authorization` header
```
GET /v1/clients/current HTTP/1.1
Accept: application/vnd.api+json
Host: api.parcelvalue.eu

HTTP/1.1 401 Unauthorized
Date: Fri, 02 Nov 2018 13:54:37 GMT
Server: Apache
WWW-Authenticate: Bearer realm="api.parcelvalue.eu", error="authorization_exception", error_description="Missing or invalid authorization header"
Content-length: 129
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"errors":[{"status":401,"title":"Unauthorized","detail":"Missing or invalid authorization header"}]}
```
