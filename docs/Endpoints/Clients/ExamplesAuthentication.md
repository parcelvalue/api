# Examples

## Authenticate

### Success

```
POST /v3-testing/clients/authentication HTTP/1.1
Accept: application/vnd.api+json
Authorization: ParcelValueApi hash=<hash>, integrationKey=<integrationKey>
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 0
HTTP/1.1 401 Unauthorized
Date: Thu, 24 Mar 2022 16:40:42 GMT
Server: Apache
WWW-Authenticate: Bearer realm="api.parcelvalue.eu", error="401", error_description="Authorization failed."
Content-length: 111
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"errors":[{"status":401,"title":"Unauthorized","detail":"Authorization failed."}]}
```

### Wrong credentials

```
POST /v3-testing/clients/authentication HTTP/1.1
Accept: application/vnd.api+json
Authorization: ParcelValueApi hash=<hash>, integrationKey=<integrationKey>
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 0
HTTP/1.1 200 OK
Date: Thu, 24 Mar 2022 16:40:48 GMT
Server: Apache
Content-length: 191
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":{"type":"client","id":"<clientId>","attributes":{"name":"<clientName>","clientKey":"<clientKey>"}}}
```

---

[README](../../../README.md)
