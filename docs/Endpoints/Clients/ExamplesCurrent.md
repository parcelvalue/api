# Examples

## Retrieve information about the current client.

### Valid authentication
```
GET /v3-testing/clients/current HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
HTTP/1.1 200 OK
Date: Thu, 31 Mar 2022 12:48:39 GMT
Server: Apache
Content-length: 399
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":{"type":"client","id":"<clientId>","attributes":{"name":"Test Client","address1":"Viale Giustiniano 5","address2":"Line2 d'artagnan","city":"Milano","postalCode":"20129","state":"MI","country":"IT","contact":"Test Contact","phone":"1234567890","email":"client@ship.from","clientKey":"<clientKey>"}}}
```

### No `Authorization` header
```
GET /v3/clients/current HTTP/1.1
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

---

[README](../../../README.md)
