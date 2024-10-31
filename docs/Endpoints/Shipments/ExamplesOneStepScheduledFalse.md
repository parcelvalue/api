# Examples - "one step" - `scheduledProcessing` "false"

## Creating a new shipment: success

```
POST /v3-testing/shipments HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.37.3
Postman-Token: 0fcbba4c-af34-4b21-9d14-0bd6f6eb70c0
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 2375
 
{
"jsonapi": {
"version": "1.0"
},
"data": {
"type": "shipment",
"id": 123,
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
"taxIdentification": "161531102024"
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
Date: Thu, 31 Oct 2024 15:15:44 GMT
Server: Apache
X-Powered-By: Italia Multimedia Srl
Vary: User-Agent
Location: https://api.parcelvalue.eu/v3-testing/shipments/8077FA81A76066372AD0458E406B232EF9C30E80BB05552687C376FA95F5CAC5
Content-length: 1665
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
 
{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"8077FA81A76066372AD0458E406B232EF9C30E80BB05552687C376FA95F5CAC5","attributes":{"shipDate":"2024-11-01","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":"20129","state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from","taxIdentification":"161531102024"},"collectionLocation":null,"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":"80331","country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to","isResidential":true},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","insuranceDescription":"Insured goods description","insuranceValue":"123.45","customerReference":"REF 123","specialInstructions":"Second door on the left","confirmationEmail":"documents@ship.from","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"booking":true,"documentsOnly":false},"links":{"self":"https:\/\/api.parcelvalue.eu\/v3-testing\/shipments\/8077FA81A76066372AD0458E406B232EF9C30E80BB05552687C376FA95F5CAC5"},"meta":{"scheduledProcessing":false,"service":"express","status":3,"reference":"101101000021","carrierName":"United Parcel Services (Web Services)","finalCost":{"amount":255.78,"currency":"EUR"},"insuranceCost":{"amount":6,"currency":"EUR"},"trackingNumber":"1ZXXXXXXXXXXXXXXXX"}}}
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
