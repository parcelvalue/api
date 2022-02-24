# Examples

## Creating a new shipment: success (`scheduledProcessing` "true")
```
POST /v3-testing/shipments HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.26.8
Postman-Token: 5ad75b88-0b39-40c7-a478-931d322d3543
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 2251
{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "id": 123,
        "attributes": {
            "shipDate": "2022-02-25",
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
            "insuranceDescription": "",
            "insuranceValue": "",
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
            "scheduledProcessing": true,
            "service": "express"
        }
    }
}
HTTP/1.1 202 Accepted
Date: Thu, 24 Feb 2022 17:28:37 GMT
Server: Apache
Location: https://api.parcelvalue.eu/v3-testing/shipments/<SHIPMENTID>
Content-length: 1352
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<SHIPMENTID>","attributes":{"shipDate":"2022-02-25","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","insuranceDescription":"","insuranceValue":"","customerReference":"REF 123","specialInstructions":"Second door on the left","confirmationEmail":"documents@ship.from","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"booking":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v3-testing\/shipments\/<SHIPMENTID>"},"meta":{"scheduledProcessing":true,"service":"express","status":0,"reference":null,"trackingNumber":null}}}
```

## Creating a new shipment: success (`scheduledProcessing` "false")
```
POST /v3-testing/shipments HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.26.8
Postman-Token: a29704a2-2da1-47f3-ad2c-38e2378284c7
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 2252
{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "id": 123,
        "attributes": {
            "shipDate": "2022-02-25",
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
            "insuranceDescription": "",
            "insuranceValue": "",
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
Date: Thu, 24 Feb 2022 17:29:31 GMT
Server: Apache
Location: https://api.parcelvalue.eu/v3-testing/shipments/<SHIPMENTID>
Content-length: 1446
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<SHIPMENTID>","attributes":{"shipDate":"2022-02-25","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","insuranceDescription":"","insuranceValue":"","customerReference":"REF 123","specialInstructions":"Second door on the left","confirmationEmail":"documents@ship.from","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"booking":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v3-testing\/shipments\/<SHIPMENTID>","tracking":"https:\/\/tracking.qapla.it\/5be98d9e959711ec8d3842010a840066"},"meta":{"scheduledProcessing":false,"service":"express","status":3,"reference":"100002021199","trackingNumber":"1268541400"}}}
```

## Creating a new shipment: error, missing service option
```
POST /v3-testing/shipments HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.26.8
Postman-Token: 798b3900-de19-4a13-9e33-f837919fa067
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
        "id": 123,
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
