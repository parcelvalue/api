# Examples

## Confirm shipment: success

```
POST /v3-testing/shipments/confirm HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.26.8
Postman-Token: 6e19831e-939c-4d68-a1bc-9a772df5d823
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 3020
{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "attributes": {
            "shipDate": "2022-03-17",
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
            "rate": {
                "type": "rate",
                "id": "t2-DHL_WEB_SERVICES-ECO",
                "attributes": {
                    "carrierCode": "DHL_WEB_SERVICES",
                    "carrierName": "DHL Express (Web Services)",
                    "serviceCode": "ECO",
                    "serviceName": "DHL Economy Select",
                    "serviceDefinitionCode": "DAY_DEFINITE",
                    "accountId": "PV_DHL_IT_OUTBOUND",
                    "finalCost": {
                        "amount": 20.64,
                        "currency": "EUR"
                    },
                    "estimatedDeliveryDate": "2022-03-21"
                }
            }
        }
    },
    "included": []
}
HTTP/1.1 202 Accepted
Date: Wed, 16 Mar 2022 15:29:18 GMT
Server: Apache
Location: https://api.parcelvalue.eu/v3-testing/shipments/<apiShipmentId>
Content-length: 1574
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<apiShipmentId>","attributes":{"shipDate":"2022-03-17","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","insuranceDescription":"Testers","insuranceValue":"123.45","customerReference":"REF 123","specialInstructions":"Second door on the left","confirmationEmail":"documents@ship.from","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"booking":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v3-testing\/shipments\/<apiShipmentId>","tracking":"https:\/\/tracking.qapla.it\/<trackingHash>"},"meta":{"scheduledProcessing":false,"status":3,"reference":"<shipmentReference>","carrierName":"DHL Express (Web Services)","finalCost":{"amount":20.64,"currency":"EUR"},"insuranceCost":{"amount":4,"currency":"EUR"},"trackingNumber":"1271544864"}}}
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
Content-Length: 3023
{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "attributes": {
            "shipDate": "2022-03-15",
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
                        "amount": 80.02,
                        "currency": "EUR"
                    },
                    "estimatedDeliveryDate": "2022-02-22"
                }
            }
        }
    },
    "included": []
}
HTTP/1.1 503 Service Unavailable
Date: Mon, 14 Mar 2022 09:29:21 GMT
Server: Apache
Content-length: 160
Connection: close
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"errors":[{"status":503,"title":"Service Unavailable","detail":"Price is different. Original price: 80.02; updated price: 76.21"}]}
```

---

[README](../../../README.md)
