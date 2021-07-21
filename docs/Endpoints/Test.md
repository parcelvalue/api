# `/test`

Test the ParcelValue API.

Methods : `GET`, `HEAD`

> Please see also [Testing the API](/docs/Testing.md).

The test endpoint simply returns the data received.

---

## Examples

### Simple test

```
GET /v3/test HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Fri, 02 Nov 2018 13:36:49 GMT
Server: Apache
Content-length: 86
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"test","id":null,"meta":{"method":"GET"}}}
```

### Specify an id

```
GET /v3/test/1 HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Fri, 02 Nov 2018 13:37:39 GMT
Server: Apache
Content-length: 85
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"test","id":"1","meta":{"method":"GET"}}}
```

### Add query paramters

```
GET /v3/test/?key1=value1&key2=value2 HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Fri, 02 Nov 2018 13:46:23 GMT
Server: Apache
Content-length: 143
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"test","id":null,"attributes":{"query":{"key1":"value1","key2":"value2"}},"meta":{"method":"GET"}}}
```
