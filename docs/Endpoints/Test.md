# `/test`

Test the ParcelValue API.

Methods : `GET`, `HEAD`, `POST`

> Please see also [Testing the API](/../../docs/Testing.md).

---

## Examples

### Simple test

```
POST /v999/test HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Wed, 31 Oct 2018 16:21:51 GMT
Server: Apache
Content-length: 112
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"test","id":null,"attributes":{"data":[]},"meta":{"method":"POST"}}}
```

### Specify an id

```
POST /v999/test/13 HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Wed, 31 Oct 2018 16:22:30 GMT
Server: Apache
Content-length: 112
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"test","id":"13","attributes":{"data":[]},"meta":{"method":"POST"}}}
```

### Add query paramters

```
GET /v999/test/?key1=value1&key2=value2 HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Wed, 31 Oct 2018 16:23:26 GMT
Server: Apache
Content-length: 143
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"test","id":null,"attributes":{"query":{"key1":"value1","key2":"value2"}},"meta":{"method":"GET"}}}
```

### Send `POST` data

```
POST /v999/test HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Content-Length: 23
Host: api.parcelvalue.eu
Content-Type: application/x-www-form-urlencoded

key1=value1&key2=value2

HTTP/1.1 200 OK
Date: Wed, 31 Oct 2018 16:24:10 GMT
Server: Apache
Content-length: 143
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"test","id":null,"attributes":{"data":{"key1":"value1","key2":"value2"}},"meta":{"method":"POST"}}}
```
