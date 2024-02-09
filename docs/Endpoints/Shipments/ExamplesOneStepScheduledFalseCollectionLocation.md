# Examples - "one step" - `scheduledProcessing` "false" - with collection location

## Creating a new shipment with carrier choice (`scheduledProcessing` "false")

### OK

```
POST /v3-testing/shipments HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: <JWT>
User-Agent: PostmanRuntime/7.36.1
Postman-Token: 36de7400-a93d-4344-948e-147414429e60
Host: pv-api.ddev.site
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 2702
 
{
"jsonapi": {
"version": "1.0"
},
"data": {
"type": "shipment",
"id": 123,
"attributes": {
"shipDate": "2024-02-10",
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
"collectionLocation": {
"name" : "Collection Location",
"address1": "Collection street 123",
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
"city": "Muenchen",
"postalCode": 80331,
"country": "DE",
"contact": "Receiver Contactname",
"phone": "987654321",
"email": "receiver@ship.to"
},
"packages": [{
"weight": {
"value": "1.2",
"units": "1"
},
"dimensions": {
"length": "32",
"width": "33",
"height": "34",
"units": "1"
},
"type": "CARTON"
},
{
"weight": {
"value": "1.9",
"units": "1"
},
"dimensions": {
"length": "32",
"width": "33",
"height": "34",
"units": "1"
},
"type": "CARTON"
}],
"goodsDescription": "Items from order #1",
"insuranceDescription": "Insured goods description",
"insuranceValue": "123.45",
"invoiceSubtotal": {
"amount": "13.69",
"currency": "EUR"
},
"customerReference": "REF 123",
"specialInstructions": "Second door on the left",
"confirmationEmail": "documents@ship.from",
"booking": true
},
"meta": {
"scheduledProcessing": false,
"service": "express"
}
}
}
 
HTTP/1.1 201 Created
Content-Length: 1856
Content-Type: application/vnd.api+json
Date: Fri, 09 Feb 2024 15:39:43 GMT
Location: https://pv-api.ddev.site/shipments/<apiShipmentId>
Server: Apache/2.4.56 (Debian)
 
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<apiShipmentId>","attributes":{"shipDate":"2024-02-10","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":"20129","state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"collectionLocation":{"name":"Collection Location","address1":"Collection street 123","city":"Milano","postalCode":"20129","state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":"80331","country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","insuranceDescription":"Insured goods description","insuranceValue":"123.45","customerReference":"REF 123","specialInstructions":"Second door on the left","confirmationEmail":"documents@ship.from","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"booking":true,"documentsOnly":false},"links":{"self":"https:\/\/pv-api.ddev.site\/shipments\/<apiShipmentId>","tracking":"https:\/\/tracking.qapla.it\/<trackingHash>"},"meta":{"scheduledProcessing":false,"service":"express","status":3,"reference":"<shipmentReference>","carrierName":"DHL Express (Web Services)","finalCost":{"amount":268.12,"currency":"EUR"},"insuranceCost":{"amount":6,"currency":"EUR"},"trackingNumber":"<trackingNumber>"}}}
```

---

[README](../../../README.md)
