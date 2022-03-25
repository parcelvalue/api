# Examples

## Address search

### Success, with results

```
GET /v3-testing/addresses?searchString=test HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
HTTP/1.1 200 OK
Date: Fri, 25 Mar 2022 16:05:45 GMT
Server: Apache
Content-length: 1323
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":[{"type":"address","id":"4433","attributes":{"name":"test","address1":"test","address2":"","postalCode":"20121","city":"Milano","state":"MI","country":"IT","contact":"test","phone":"123","email":"test@localhost.local"}},{"type":"address","id":"4318","attributes":{"name":"Test Client 100002","address1":"Viale Giustiniano 5","address2":"Line2 d'artagnan","postalCode":"20129","city":"Milano","state":"MI","country":"IT","contact":"Alberto","phone":"0987654321","email":"contact2@webserv.co"}},{"type":"address","id":"4319","attributes":{"name":"Test Client 100002","address1":"Viale Giustiniano 5","address2":"Line2 d'artagnan","postalCode":"20129","city":"Milano","state":"MI","country":"IT","contact":"Glauco","phone":"1234567890","email":"contact3@webserv.co"}},{"type":"address","id":"4317","attributes":{"name":"Test Client 100002","address1":"Viale Giustiniano 5","address2":"Line2 d'artagnan","postalCode":"20129","city":"Milano","state":"MI","country":"IT","contact":"Test Contact 100002","phone":"1234567890","email":"kartell@webserv.co"}},{"type":"address","id":"4427","attributes":{"name":"UK test","address1":"street 123","address2":"","postalCode":"L18 3EF","city":"Liverpool","state":"","country":"GB","contact":"uk contact","phone":"1234567890","email":"uk@webserv.co"}}]}
```

### Success, no results

```
GET /v3-testing/addresses?searchString=noexist HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
HTTP/1.1 200 OK
Date: Fri, 25 Mar 2022 16:06:06 GMT
Server: Apache
Content-length: 39
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":[]}
```

### Error, `searchString` missing

```
GET /v3-testing/addresses HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
HTTP/1.1 400 Bad Request
Date: Fri, 25 Mar 2022 16:06:18 GMT
Server: Apache
Content-length: 138
Connection: close
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"errors":[{"status":400,"title":"Bad Request","detail":"Invalid or empty required parameter: searchString"}]}
```
