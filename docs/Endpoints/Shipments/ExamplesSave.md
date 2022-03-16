# Examples

## Save shipment

```
POST /v3-testing/shipments/save HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.26.8
Postman-Token: 031996a8-a5dd-4d67-ae48-c02a8224e7c9
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 2171
{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "attributes": {
            "shipDate": "2022-03-17",
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
Date: Wed, 16 Mar 2022 15:45:28 GMT
Server: Apache
Location: https://api.parcelvalue.eu/v3-testing/shipments/<apiShipmentId>
Content-length: 1413
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<apiShipmentId>","attributes":{"shipDate":"2022-03-17","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","insuranceDescription":"Testers","insuranceValue":"123.45","customerReference":"REF 123","specialInstructions":"Second door on the left","confirmationEmail":"documents@ship.from","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"booking":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v3-testing\/shipments\/<apiShipmentId>"},"meta":{"scheduledProcessing":false,"status":0,"reference":"<shipmentReference>","carrierName":null,"finalCost":null,"insuranceCost":null,"trackingNumber":null}}}
```

## Save shipment (without packages)

```
POST /v3-testing/shipments/save HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.26.8
Postman-Token: dd5be1a9-f6b4-406a-8ae8-d48dbf977af7
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 1332
{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "attributes": {
            "shipDate": "2022-03-17",
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
Date: Wed, 16 Mar 2022 15:46:15 GMT
Server: Apache
Location: https://api.parcelvalue.eu/v3-testing/shipments/<apiShipmentId>
Content-length: 1159
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<apiShipmentId>","attributes":{"shipDate":"2022-03-17","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[],"goodsDescription":"Items from order #1","insuranceDescription":null,"insuranceValue":null,"customerReference":"REF 123","specialInstructions":"Second door on the left","confirmationEmail":"documents@ship.from","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"booking":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v3-testing\/shipments\/<apiShipmentId>"},"meta":{"scheduledProcessing":false,"status":0,"reference":"<shipmentReference>","carrierName":null,"finalCost":null,"insuranceCost":null,"trackingNumber":null}}}
```

---

[README](../../../README.md)
