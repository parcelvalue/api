# Examples

## Retrieve a shipment: error
> Shipment id is invalid

```
GET /v3/shipments/<ID> HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 404 Not Found
Date: Fri, 09 Nov 2018 13:35:16 GMT
Server: Apache
Content-length: 105
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"errors":[{"status":404,"title":"Not Found","detail":"Shipment not found"}]}
```

## Retrieve a shipment: success
> Shipment is newly created, not yet processed (status 0).

```
GET /v3/shipments/<ID> HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Fri, 09 Nov 2018 13:39:15 GMT
Server: Apache
Content-length: 1135
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<ID>","attributes":{"shipDate":"2018-11-13","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"saturdayDelivery":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v1\/shipments\/<ID>"},"meta":{"service":"express","status":0}}}
```

## Retrieve a shipment: success
> Shipment is successfully processed (status 3)

```
GET /v3/shipments/<ID> HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Fri, 09 Nov 2018 13:42:13 GMT
Server: Apache
Content-length: 1214
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<ID>","attributes":{"shipDate":"2018-11-13","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"saturdayDelivery":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v1\/shipments\/<ID>","tracking":<URL>},"meta":{"service":"express","status":3,"reference":<REFERENCE>,"trackingNumber":"<TRACKINGNUMBER>"}}}
```

## Retrieve a shipment: success
> There was an error processing the shipment (status -1)

```
GET /v3/shipments/<ID> HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Fri, 09 Nov 2018 13:44:33 GMT
Server: Apache
Content-length: 1161
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<ID>","attributes":{"shipDate":"2018-11-01","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"saturdayDelivery":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v1\/shipments\/<ID>"},"meta":{"service":"express","status":-1,"reference":<REFERENCE>}}}
```
