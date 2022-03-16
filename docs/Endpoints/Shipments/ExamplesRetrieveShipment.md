# Examples

## Retrieve a shipment: error

> Shipment id is invalid

```
GET /v3-testing/shipments/<apiShipmentId> HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.26.8
Postman-Token: ead4b852-6759-4bf6-b6f4-34b8e01681ce
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
HTTP/1.1 404 Not Found
Date: Wed, 16 Mar 2022 15:34:32 GMT
Server: Apache
Content-length: 118
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"errors":[{"status":404,"title":"Not Found","detail":"Error retrieving shipment data."}]}
```

## Retrieve a shipment: success

> Shipment is newly created, not yet processed (status 0).

```
GET /v3-testing/shipments/<apiShipmentId> HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.26.8
Postman-Token: f688f137-1e2a-4499-917b-b75649edb700
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
HTTP/1.1 200 OK
Date: Wed, 16 Mar 2022 15:33:53 GMT
Server: Apache
Content-length: 1440
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<apiShipmentId>","attributes":{"shipDate":"2022-03-17","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","insuranceDescription":"Insured goods description","insuranceValue":"123.45","customerReference":"REF 123","specialInstructions":"Second door on the left","confirmationEmail":"documents@ship.from","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"booking":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v3-testing\/shipments\/<apiShipmentId>"},"meta":{"scheduledProcessing":true,"service":"express","status":0,"reference":null,"carrierName":null,"finalCost":null,"insuranceCost":null,"trackingNumber":null}}}
```

## Retrieve a shipment: success

> Shipment is successfully processed (status 3)

```
GET /v3-testing/shipments/<apiShipmentId> HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.26.8
Postman-Token: 52b464a0-b53f-4fc8-97b9-6b435582d240
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
HTTP/1.1 200 OK
Date: Wed, 16 Mar 2022 15:35:40 GMT
Server: Apache
Content-length: 1630
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<apiShipmentId>","attributes":{"shipDate":"2022-03-17","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","insuranceDescription":"Insured goods description","insuranceValue":"123.45","customerReference":"REF 123","specialInstructions":"Second door on the left","confirmationEmail":"documents@ship.from","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"booking":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v3-testing\/shipments\/<apiShipmentId>","tracking":"https:\/\/tracking.qapla.it\/<trackingHash>"},"meta":{"scheduledProcessing":true,"service":"express","status":3,"reference":"<shipmentReference>","carrierName":"United Parcel Services (Web Services)","finalCost":{"amount":85.62,"currency":"EUR"},"insuranceCost":{"amount":4,"currency":"EUR"},"trackingNumber":"1Z329W880493854810"}}}
```

## Retrieve a shipment: success

> There was an error processing the shipment (status -1)

```
GET /v3-testing/shipments/<apiShipmentId> HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.26.8
Postman-Token: 314ae0b0-e1fb-47d7-8759-55b9a36e3bb6
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
HTTP/1.1 200 OK
Date: Wed, 16 Mar 2022 15:40:52 GMT
Server: Apache
Content-length: 1451
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<apiShipmentId>","attributes":{"shipDate":"2022-03-17","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"DE","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","insuranceDescription":"Insured goods description","insuranceValue":"123.45","customerReference":"REF 123","specialInstructions":"Second door on the left","confirmationEmail":"documents@ship.from","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"booking":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v3-testing\/shipments\/<apiShipmentId>"},"meta":{"scheduledProcessing":true,"service":"express","status":-1,"reference":"<shipmentReference>","carrierName":null,"finalCost":null,"insuranceCost":null,"trackingNumber":null}}}
```

---

[README](../../../README.md)
