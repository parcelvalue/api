# Examples

## Save shipment (without packages)

```
POST /v3-testing/shipments/save HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 1209
{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "attributes": {
            "shipDate": "2021-10-28",
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
            "useCod": false,
            "saturdayDelivery": false
        },
        "meta": {
        }
    }
}
HTTP/1.1 202 Accepted
Date: Wed, 27 Oct 2021 14:08:58 GMT
Server: Apache
Location: https://api.parcelvalue.eu/v3-testing/shipments/18B09923FE050D859B24539257783A116BBA7A42D3D7449625B116AB5BC058E1
Content-length: 914
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"18B09923FE050D859B24539257783A116BBA7A42D3D7449625B116AB5BC058E1","attributes":{"shipDate":"2021-10-28","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[],"goodsDescription":"Items from order #1","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"saturdayDelivery":false},"links":{"self":"https:\/\/api.parcelvalue.eu\/v3-testing\/shipments\/18B09923FE050D859B24539257783A116BBA7A42D3D7449625B116AB5BC058E1"},"meta":{"status":0,"reference":"100002021094","trackingNumber":null}}}
```

## Save shipment (with packages)

```
POST /v3-testing/shipments/save HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 1961
{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "attributes": {
            "shipDate": "2021-10-28",
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
            "useCod": false,
            "saturdayDelivery": false
        },
        "meta": {
        }
    }
}
HTTP/1.1 202 Accepted
Date: Wed, 27 Oct 2021 14:13:59 GMT
Server: Apache
Location: https://api.parcelvalue.eu/v3-testing/shipments/8418E6184996BF74534EDCC5794FF50C3F76F375E80FA9873AC574E70FA2846E
Content-length: 1159
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"8418E6184996BF74534EDCC5794FF50C3F76F375E80FA9873AC574E70FA2846E","attributes":{"shipDate":"2021-10-28","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"saturdayDelivery":false},"links":{"self":"https:\/\/api.parcelvalue.eu\/v3-testing\/shipments\/8418E6184996BF74534EDCC5794FF50C3F76F375E80FA9873AC574E70FA2846E"},"meta":{"status":0,"reference":"100002021095","trackingNumber":null}}}
```
