# Examples

## Confirm shipment: success

```
POST /v3-testing/shipments/confirm HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 2754
{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "attributes": {
            "shipDate": "2021-10-16",
            "shipFrom": {
                "name": "Sender Name",
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
                "name": "Receiver Name",
                "address1": "Receiver address 123",
                "city": "Muenchen",
                "postalCode": 80331,
                "country": "DE",
                "contact": "Receiver Contactname",
                "phone": "987654321",
                "email": "receiver@ship.to"
            },
            "packages": [
                {
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
                }
            ],
            "goodsDescription": "Items from order #1",
            "invoiceSubtotal": {
                "amount": "13.69",
                "currency": "EUR"
            },
            "saturdayDelivery": false
        },
        "meta": {
            "rate": {
                "type": "rate",
                "id": "t2-DHL_WEB_SERVICES-EXP",
                "attributes": {
                    "carrierCode": "DHL_WEB_SERVICES",
                    "carrierName": "DHL Express (Web Services)",
                    "serviceCode": "EXP",
                    "serviceName": "DHL Express Worldwide",
                    "serviceDefinitionCode": "DAY_DEFINITE",
                    "accountId": "PV_DHL_IT_OUTBOUND",
                    "finalCost": {
                        "amount": 76.48,
                        "currency": "EUR"
                    }
                }
            }
        }
    },
    "included": []
}
HTTP/1.1 202 Accepted
Date: Fri, 15 Oct 2021 15:53:59 GMT
Server: Apache
Location: https://api.parcelvalue.eu/v3-testing/shipments/<SHIPMENID>
Content-length: 1242
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<SHIPMENID>","attributes":{"shipDate":"2021-10-16","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"saturdayDelivery":false},"links":{"self":"https:\/\/api.parcelvalue.eu\/v3-testing\/shipments\/<SHIPMENID>","tracking":"https:\/\/tracking.qapla.it\/25d455fd2dd011ecb93442010a8400f1"},"meta":{"status":3,"reference":"100002021086","trackingNumber":"1242222822"}}}
```

## Confirm shipment: error - price is different

```
POST /v3-testing/shipments/confirm HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 2755
{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "attributes": {
            "shipDate": "2021-10-16",
            "shipFrom": {
                "name": "Sender Name",
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
                "name": "Receiver Name",
                "address1": "Receiver address 123",
                "city": "Muenchen",
                "postalCode": 80331,
                "country": "DE",
                "contact": "Receiver Contactname",
                "phone": "987654321",
                "email": "receiver@ship.to"
            },
            "packages": [
                {
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
                }
            ],
            "goodsDescription": "Items from order #1",
            "invoiceSubtotal": {
                "amount": "13.69",
                "currency": "EUR"
            },
            "saturdayDelivery": false
        },
        "meta": {
            "rate": {
                "type": "rate",
                "id": "t2-DHL_WEB_SERVICES-EXP",
                "attributes": {
                    "carrierCode": "DHL_WEB_SERVICES",
                    "carrierName": "DHL Express (Web Services)",
                    "serviceCode": "EXP",
                    "serviceName": "DHL Express Worldwide",
                    "serviceDefinitionCode": "DAY_DEFINITE",
                    "accountId": "PV_DHL_IT_OUTBOUND",
                    "finalCost": {
                        "amount": 123.45,
                        "currency": "EUR"
                    }
                }
            }
        }
    },
    "included": []
}
HTTP/1.1 400 Bad Request
Date: Fri, 15 Oct 2021 15:54:40 GMT
Server: Apache
Content-length: 153
Connection: close
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"errors":[{"status":400,"title":"Bad Request","detail":"Price is different. Original price: 123.45; updated price: 76.48"}]}
```
