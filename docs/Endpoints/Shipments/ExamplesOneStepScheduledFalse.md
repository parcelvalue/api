# Examples - "one step" - `scheduledProcessing` "false"

## Creating a new shipment: success

```
POST /v3-testing/shipments HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.26.8
Postman-Token: 23251586-62e9-45d8-ae4e-6dccc8c4660d
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 2283
{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "id": 123,
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
Date: Wed, 16 Mar 2022 15:11:52 GMT
Server: Apache
    Location: https://api.parcelvalue.eu/v3-testing/shipments/<apiShipmentId>
Content-length: 1631
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<apiShipmentId>","attributes":{"shipDate":"2022-03-17","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","insuranceDescription":"Insured goods description","insuranceValue":"123.45","customerReference":"REF 123","specialInstructions":"Second door on the left","confirmationEmail":"documents@ship.from","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"booking":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v3-testing\/shipments\/<apiShipmentId>","tracking":"https:\/\/tracking.qapla.it\/<trackingHash>"},"meta":{"scheduledProcessing":false,"service":"express","status":3,"reference":"<shipmentReference>","carrierName":"United Parcel Services (Web Services)","finalCost":{"amount":85.62,"currency":"EUR"},"insuranceCost":{"amount":4,"currency":"EUR"},"trackingNumber":"1Z329W880497121792"}}}
```

## Creating a new shipment: error, missing service option

```
POST /v3-testing/shipments HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 2116
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
HTTP/1.1 400 Bad Request
Date: Fri, 18 Feb 2022 14:42:39 GMT
Server: Apache
Content-length: 132
Connection: close
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"errors":[{"status":400,"title":"Bad Request","detail":"Missing required data: 'data.meta.service'."}]}
```

---

[README](../../../README.md)
