# Examples

## Retrieve shipment documents: success

```
GET /v3/shipments/<SHIPMENTID>/documents HTTP/1.1
Authorization: Bearer <JWT>
Accept: application/vnd.api+json
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Mon, 12 Nov 2018 13:48:46 GMT
Server: Apache
Content-length: 201972
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"documents","id":"<SHIPMENTID>","attributes":{"contentType":"<CONTENTTYPE>","fileName":"<FILENAME>","fileData":"<FILEDATA>"}}}
```

## Retrieve shipment documents: error
> Shipment is in error (status -1), so no documents are  available

```
GET /v3/shipments/<SHIPMENTID>/documents HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 404 Not Found
Date: Mon, 12 Nov 2018 13:52:28 GMT
Server: Apache
Content-length: 101
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"errors":[{"status":404,"title":"Not Found","detail":"Shipment error"}]}
```

## Retrieve shipment documents: error
> Shipment is not yet processed (status 0), so no documents are  available

```
GET /v3/shipments/<SHIPMENTID>/documents HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 404 Not Found
Date: Mon, 12 Nov 2018 13:55:51 GMT
Server: Apache
Content-length: 113
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"errors":[{"status":404,"title":"Not Found","detail":"Shipment not yet processed"}]}
```

## Retrieve shipment documents: error
> Shipment doesn't exist

```
GET /v3/shipments/<SHIPMENTID>/documents HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 404 Not Found
Date: Mon, 12 Nov 2018 13:57:33 GMT
Server: Apache
Content-length: 105
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"errors":[{"status":404,"title":"Not Found","detail":"Shipment not found"}]}
```
