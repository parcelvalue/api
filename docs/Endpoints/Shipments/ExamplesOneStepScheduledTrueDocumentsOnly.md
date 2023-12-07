# Examples - "one step" - `scheduledProcessing` "true" - `documentsOnly`

## Creating a new shipment: success

```
POST /shipments HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.35.0
Postman-Token: 8b2e70d0-39fc-43b5-869a-faa015b0559e
Host: pv-api.ddev.site
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 1858
 
{
"jsonapi": {
"version": "1.0"
},
"data": {
"type": "shipment",
"id": 123,
"attributes": {
"shipDate": "2023-12-08",
"shipFrom": {
"name" : "Sender Name",
"address1": "Sender street 123",
"city": "Milano",
"postalCode": 20129,
"state": "MI",
"country": "IT",
"contact": "Sender Contactname",
"phone": "1234567890",
"email": "sender@ship.from"
},
"shipTo": {
"name" : "Receiver Name",
"address1": "Receiver address 123",
"city": "Los Angeles",
"postalCode": 90001,
"state": "CA",
"country": "US",
"contact": "Receiver Contactname",
"phone": "12345678901",
"email": "receiver@ship.to"
},
"packages": [{
"weight": {
"value": "1.2",
"units": "1"
},
"dimensions": {
"length": "21",
"width": "15",
"height": "5",
"units": "1"
},
"type": "CARTON"
}],
"goodsDescription": null,
"invoiceSubtotal": {
"amount": "0",
"currency": "EUR"
},
"customerReference": "REF 123",
"specialInstructions": "Second door on the left",
"confirmationEmail": "documents@ship.from",
"booking": true,
"documentsOnly": true
},
"meta": {
"scheduledProcessing": false,
"service": "express"
}
}
}
 
HTTP/1.1 201 Created
Content-Length: 1463
Content-Type: application/vnd.api+json
Date: Thu, 07 Dec 2023 16:36:46 GMT
Location: https://pv-api.ddev.site/shipments/<apiShipmentId>
Server: Apache/2.4.56 (Debian)
 
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<apiShipmentId>","attributes":{"shipDate":"2023-12-08","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":"20129","state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Los Angeles","postalCode":"90001","state":"CA","country":"US","contact":"Receiver Contactname","phone":"12345678901","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"21","width":"15","height":"5","units":"1"},"type":"CARTON"}],"goodsDescription":"DOCUMENTS","insuranceDescription":"","insuranceValue":"","customerReference":"REF 123","specialInstructions":"Second door on the left","confirmationEmail":"documents@ship.from","invoiceSubtotal":{"amount":0,"currency":"EUR"},"booking":true,"documentsOnly":true},"links":{"self":"https:\/\/pv-api.ddev.site\/shipments\/<apiShipmentId>","tracking":"https:\/\/tracking.qapla.it\/<redacted>"},"meta":{"scheduledProcessing":false,"service":"express","status":3,"reference":"<redacted>","carrierName":"United Parcel Services (Web Services)","finalCost":{"amount":99.8,"currency":"EUR"},"insuranceCost":null,"trackingNumber":"<redacted>"}}}
```

---

[README](../../../README.md)
