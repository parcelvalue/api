# Examples

## Delete a shipment: success

```
DELETE /shipments/<apiShipmentId> HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.32.3
Postman-Token: 387918bd-61be-4617-bc9f-276343003a6c
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive

HTTP/1.1 204 No Content
Server: nginx/1.20.1
Date: Mon, 24 Jul 2023 15:44:15 GMT
Connection: keep-alive
```

## Delete a shipment: error

> Delete functionality not available

```
DELETE /shipments/<apiShipmentId> HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.32.3
Postman-Token: 7ba8927c-d0cb-4109-92f6-7cc24877598f
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive

HTTP/1.1 400 Bad Request
Server: nginx/1.20.1
Date: Mon, 24 Jul 2023 15:44:21 GMT
Content-Type: application/vnd.api+json
Content-Length: 124
Connection: keep-alive

{"jsonapi":{"version":"1.0"},"errors":[{"status":400,"title":"Bad Request","detail":"Delete functionality not available."}]}
```
