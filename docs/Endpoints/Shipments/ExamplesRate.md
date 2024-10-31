# Examples

## Rate shipment

```
POST /v3-testing/shipments/rate HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.37.3
Postman-Token: 18606d0c-cbcb-47e6-bf07-95e9ab79273e
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 2263
 
{
"jsonapi": {
"version": "1.0"
},
"data": {
"type": "shipment",
"attributes": {
"shipDate": "2024-11-01",
"shipFrom": {
"name" : "Sender Name",
"address1": "Sender street 123",
"city": "Milano",
"postalCode": 20129,
"state": "MI",
"country": "IT",
"contact": "Sender Contactname",
"phone": "1234567890",
"email": "sender@ship.from",
"taxIdentification": "155531102024"
},
"shipTo": {
"name" : "Receiver Name",
"address1": "Receiver address 123",
"city": "Muenchen",
"postalCode": 80331,
"country": "DE",
"contact": "Receiver Contactname",
"phone": "987654321",
"email": "receiver@ship.to",
"isResidential": true
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
"insuranceDescription": "Testers",
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
}
}
}
 
HTTP/1.1 202 Accepted
Date: Thu, 31 Oct 2024 15:13:19 GMT
Server: Apache
X-Powered-By: Italia Multimedia Srl
Vary: User-Agent
Content-length: 2461
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
 
{"jsonapi":{"version":"1.0"},"data":[{"type":"rate","id":"t2-FEDEX_WEB_SERVICES-INTL_PRI","attributes":{"carrierCode":"FEDEX_WEB_SERVICES","carrierName":"FedEx","serviceCode":"INTL_PRI","serviceName":"FedEx International Priority\u00ae","serviceDefinitionCode":"DAY_DEFINITE","accountId":"PV_FEDEX_ITALY","finalCost":{"amount":203.7,"currency":"EUR"},"prepaidCost":{"amount":248.51,"currency":"EUR"},"vatValue":22,"estimatedDeliveryDate":null}},{"type":"rate","id":"t2-FEDEX_WEB_SERVICES-REG_ECO","attributes":{"carrierCode":"FEDEX_WEB_SERVICES","carrierName":"FedEx","serviceCode":"REG_ECO","serviceName":"FedEx Regional Economy\u00ae","serviceDefinitionCode":"DAY_DEFINITE","accountId":"PV_FEDEX_ITALY","finalCost":{"amount":76.82,"currency":"EUR"},"prepaidCost":{"amount":93.72,"currency":"EUR"},"vatValue":22,"estimatedDeliveryDate":null}},{"type":"rate","id":"t2-TNT_ITALY-ECO","attributes":{"carrierCode":"TNT_ITALY","carrierName":"TNT Express (Italy)","serviceCode":"ECO","serviceName":"TNT Economy Express (Italy)","serviceDefinitionCode":"DAY_DEFINITE","accountId":"PV_TNT_IT_EXP","finalCost":{"amount":128.56,"currency":"EUR"},"prepaidCost":{"amount":160.5,"currency":"EUR"},"vatValue":22,"estimatedDeliveryDate":"2024-11-06"}},{"type":"rate","id":"t2-TNT_ITALY-EXP","attributes":{"carrierCode":"TNT_ITALY","carrierName":"TNT Express (Italy)","serviceCode":"EXP","serviceName":"TNT Express (Italy)","serviceDefinitionCode":"DAY_DEFINITE","accountId":"PV_TNT_IT_EXP","finalCost":{"amount":340.38,"currency":"EUR"},"prepaidCost":{"amount":418.92,"currency":"EUR"},"vatValue":22,"estimatedDeliveryDate":"2024-11-05"}},{"type":"rate","id":"t2-UPS_WEB_SERVICES-STD","attributes":{"carrierCode":"UPS_WEB_SERVICES","carrierName":"United Parcel Services (Web Services)","serviceCode":"STD","serviceName":"UPS Standard","serviceDefinitionCode":"DAY_DEFINITE","accountId":"PV_MASTER_UPS_IT","finalCost":{"amount":192.71,"currency":"EUR"},"prepaidCost":{"amount":239.38,"currency":"EUR"},"vatValue":22,"estimatedDeliveryDate":"2024-11-06"}},{"type":"rate","id":"t2-UPS_WEB_SERVICES-XSS","attributes":{"carrierCode":"UPS_WEB_SERVICES","carrierName":"United Parcel Services (Web Services)","serviceCode":"XSS","serviceName":"UPS Express Saver","serviceDefinitionCode":"DAY_DEFINITE","accountId":"PV_MASTER_UPS_IT","finalCost":{"amount":255.78,"currency":"EUR"},"prepaidCost":{"amount":316.32,"currency":"EUR"},"vatValue":22,"estimatedDeliveryDate":"2024-11-05"}}]}
```

---

[README](../../../README.md)
