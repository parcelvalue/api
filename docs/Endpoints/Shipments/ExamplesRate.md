# Examples

## Rate shipment

```
POST /v3-testing/shipments/rate HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 2084
{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "attributes": {
            "shipDate": "2022-02-19",
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
Date: Fri, 18 Feb 2022 15:24:26 GMT
Server: Apache
Content-length: 1750
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":[{"type":"rate","id":"t2-DHL_WEB_SERVICES-EXP","attributes":{"carrierCode":"DHL_WEB_SERVICES","carrierName":"DHL Express (Web Services)","serviceCode":"EXP","serviceName":"DHL Express Worldwide","serviceDefinitionCode":"DAY_DEFINITE","accountId":"PV_DHL_IT_OUTBOUND","finalCost":{"amount":80.02,"currency":"EUR"},"estimatedDeliveryDate":"2022-02-22"}},{"type":"rate","id":"t2-TNT_ITALY-ECO","attributes":{"carrierCode":"TNT_ITALY","carrierName":"TNT Express (Italy)","serviceCode":"ECO","serviceName":"TNT Economy Express (Italy)","serviceDefinitionCode":"DAY_DEFINITE","accountId":"PV_TNT_IT_EXP","finalCost":{"amount":38.15,"currency":"EUR"},"estimatedDeliveryDate":"2022-02-23"}},{"type":"rate","id":"t2-TNT_ITALY-EXP","attributes":{"carrierCode":"TNT_ITALY","carrierName":"TNT Express (Italy)","serviceCode":"EXP","serviceName":"TNT Express (Italy)","serviceDefinitionCode":"DAY_DEFINITE","accountId":"PV_TNT_IT_EXP","finalCost":{"amount":98.88,"currency":"EUR"},"estimatedDeliveryDate":"2022-02-22"}},{"type":"rate","id":"t2-UPS_WEB_SERVICES-STD","attributes":{"carrierCode":"UPS_WEB_SERVICES","carrierName":"United Parcel Services (Web Services)","serviceCode":"STD","serviceName":"UPS Standard","serviceDefinitionCode":"DAY_DEFINITE","accountId":"PV_MASTER_UPS_IT","finalCost":{"amount":59.77,"currency":"EUR"},"estimatedDeliveryDate":"2022-02-23"}},{"type":"rate","id":"t2-UPS_WEB_SERVICES-XSS","attributes":{"carrierCode":"UPS_WEB_SERVICES","carrierName":"United Parcel Services (Web Services)","serviceCode":"XSS","serviceName":"UPS Express Saver","serviceDefinitionCode":"DAY_DEFINITE","accountId":"PV_MASTER_UPS_IT","finalCost":{"amount":84.53,"currency":"EUR"},"estimatedDeliveryDate":"2022-02-22"}}]}
```

---

[README](../../../README.md)
