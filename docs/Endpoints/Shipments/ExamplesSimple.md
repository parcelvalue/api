# Examples

## Creating a new shipment: success
```
POST /v3/shipments HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Content-Length: 1992
Host: api.parcelvalue.eu
Content-Type: application/vnd.api+json

{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "attributes": {
            "shipDate": "2018-11-13",
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
            "saturdayDelivery": true
        },
        "meta": {
            "service": "express"
        }
    }
}

HTTP/1.1 202 Accepted
Date: Fri, 09 Nov 2018 13:30:24 GMT
Server: Apache
Location: https://api.parcelvalue.eu/v3/shipments/251E63A94C6E663DF81885B3577603298D65D564AC04BAD30E0917CCFFD2F2B3
Content-length: 1135
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<ID>","attributes":{"shipDate":"2018-11-13","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"saturdayDelivery":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v1\/shipments\/<ID>"},"meta":{"service":"express","status":0}}}
```

## Creating a new shipment: error, missing service option
```
POST /v3/shipments HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Content-Length: 1930
Host: api.parcelvalue.eu
Content-Type: application/vnd.api+json

{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "attributes": {
            "shipDate": "2018-11-13",
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
            "saturdayDelivery": true
        }
    }
}

HTTP/1.1 400 Bad Request
Date: Fri, 09 Nov 2018 13:33:16 GMT
Server: Apache
Content-length: 129
Connection: close
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"errors":[{"status":400,"title":"Bad Request","detail":"Missing required data: data.meta.service"}]}
```
