# Examples - "one step" - `scheduledProcessing` "false" - with export declaration

## Creating a new shipment with export declaration (`scheduledProcessing` "false")

### OK

```
POST /shipments HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>>
User-Agent: PostmanRuntime/7.36.1
Postman-Token: 36c58c6f-ef22-4d1c-bbee-cf0c37bca8f5
Host: pv-api.ddev.site
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 3107
 
{
"jsonapi": {
"version": "1.0"
},
"data": {
"type": "shipment",
"id": 123,
"attributes": {
"shipFrom": {
"name" : "Sender Name",
"address1": "Sender street 123",
"city": "Rome",
"postalCode": "00195",
"state": "RM",
"country": "IT",
"contact": "Sender Contactname",
"phone": "1234567890",
"email": "sender@ship.from"
},
"shipTo": {
"name" : "Receiver Name",
"address1": "Receiver address 123",
"city": "San Diego",
"postalCode": 92101,
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
"booking": true,
"exportDeclaration": {
"exportReasonType": "PERSONAL_BELONGINGS_OR_PERSONAL_USE",
"invoiceDate": "2023-10-01",
"invoiceReference": "INVREF123",
"invoiceFreight": 234.56,
"shipmentPurpose": "PERSONAL",
"lineItems": [
{
"reference": "REF013",
"productId": "PRID01",
"description": "DESC01",
"originCountry": "CN",
"commodityCode": "COM01",
"quantity": "1",
"unitPrice": "1.23",
"unitWeight": "1.11"
}
]
}
},
"meta": {
"carrierChoice": "DHL",
"scheduledProcessing": false,
"service": "economy"
}
}
}
 
HTTP/1.1 201 Created
Content-Length: 2057
Content-Type: application/vnd.api+json
Date: Mon, 19 Feb 2024 11:52:59 GMT
Location: https://pv-api.ddev.site/shipments/<apiShipmentId>
Server: Apache/2.4.56 (Debian)
 
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<apiShipmentId>","attributes":{"shipDate":"2024-02-19","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Rome","postalCode":"00195","state":"RM","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"collectionLocation":null,"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"San Diego","postalCode":"92101","state":"CA","country":"US","contact":"Receiver Contactname","phone":"12345678901","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","insuranceDescription":"Insured goods description","insuranceValue":"123.45","customerReference":"REF 123","specialInstructions":"Second door on the left","confirmationEmail":"documents@ship.from","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"booking":true,"documentsOnly":false,"exportDeclaration":{"exportReasonType":"PERSONAL_BELONGINGS_OR_PERSONAL_USE","invoiceDate":"2023-10-01","invoiceReference":"INVREF123","invoiceFreight":234.56,"shipmentPurpose":"PERSONAL","lineItems":[{"reference":"REF013","productId":"PRID01","description":"DESC01","originCountry":"CN","commodityCode":"COM01","quantity":"1","unitPrice":"1.23","unitWeight":"1.11"}]}},"links":{"self":"https:\/\/pv-api.ddev.site\/shipments\/<apiShipmentId>","tracking":"https:\/\/tracking.qapla.it\/<trackingHash>"},"meta":{"scheduledProcessing":false,"carrierChoice":"DHL","service":"economy","status":3,"reference":"<shipmentReference>","carrierName":"DHL Express (Web Services)","finalCost":{"amount":385.68,"currency":"EUR"},"insuranceCost":{"amount":6,"currency":"EUR"},"trackingNumber":"<trackingNumber>"}}}
```

---

[README](../../../README.md)
