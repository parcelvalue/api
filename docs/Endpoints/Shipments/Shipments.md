# `/shipments`

Create a new shipment.

Methods : `GET`, `POST`

## Request

### Creating a new shipment.
#### `POST` `/shipments`
The request `JSON API` document should contain a `shipment` object as the document's `data` member.

### Retrieving information about an existing shipment.
#### `GET` `/shipments/<id>`
The request should contain no content body.

---

## Response

On success, the API will return a `JSON API` document with a `shipment` object as the `data` member.  
The `id` member of the `shipment` object will contain the ParcelValue shipment id.  
The `shipment` object will also contain a `links` object, which in turn contains a `self` link that identifies the resource represented by the `shipment` object.

The `shipment` meta will contain the `status` member (please see status codes below).

### Response codes
| Result  | HTTP status code  |
|---------|-------------------|
| Success | `202 Accepted`    |
| Error   | `400 Bad Request` |
> Please see the [Error Handling documentation](/docs/ErrorHandling.md) for further information about errors.

---

## Document structure

### `shipment` object attributes

| Name               | Description                        | Type             | Format          | Restrictions | Default |
|--------------------|------------------------------------|------------------|-----------------|--------------|---------|
| `shipDate`         | Shipment departure date            | string           | ISO 8601 Date   | required     |         |
| `shipFrom`         | Sender address                     | `address` object |                 | required     |         |
| `shipTo`           | Receiver address                   | `address` object |                 | required     |         |
| `packages`         | One or more `package` objects      | `package` object |                 | required     |         |
| `goodsDescription` | Description of items being shipped | string           |                 | required     |         |
| `invoiceSubtotal`  | Value of items being shipped       | `amount` object  |                 | required     |         |
| `useCod`           | "Cash On Delivery" option          | boolean          | `true`, `false` | optional     |`false`  |
| `saturdayDelivery` | "Saturday Delivery" option         | boolean          | `true`, `false` | optional     |`false`  |

### `shipment` object meta
| Name      | Description             | Type    | Format               | Restrictions           |
|-----------|-------------------------|---------|----------------------|------------------------|
| `service` | Shipment service option | string  | `express`, `economy` | required               |
| `status`  | Shipment status code    | integer | `-1`, `0`, `3`       | used only in responses |

#### Shipment status codes
| Code | Description                  |
|------|------------------------------|
| `-1` | Error                        |
|  `0` | Saved (pending confirmation) |
|  `3` | Confirmed                    |

### `shipment` object links (response only)
| Name      | Description             | Type   | Format           |
|-----------|-------------------------|--------|------------------|
| `self`    | Shipment resource URL   | string | `/shipments<id>` |


### `address` object structure
| Name         | Description          | Type   | Format                                            | Restrictions |
|--------------|----------------------|--------|---------------------------------------------------|--------------|
| `name`       | Name                 | string | Basic Latin string with no special characters (¹) | required     |
| `address1`   | Address              | string | Basic Latin string with no special characters (¹) | required     |
| `city`       | City                 | string | Basic Latin string with no special characters (¹) | required     |
| `postalCode` | Postal code          | string |                                                   | required     |
| `state`      | State / province     | string | 2 letter ISO Alpha-2 code                         | required (⁴) |
| `country`    | Country              | string | 2 letter ISO Alpha-2 code                         | required     |
| `contact`    | Contact name         | string | Basic Latin string with no special characters (¹) | required     |
| `phone`      | Contact phone number | number | (²)(³)                                            | optional     |
| `email`      | Contact email        | string |                                                   | required (⁵) |

### `package` object structure
| Name          | Description        | Type                | Format                              | Restrictions |
|---------------|--------------------|---------------------|-------------------------------------|--------------|
| `weight`      | Package weight     | `weight` object     |                                     | required     |
| `dimensions`  | Package dimensions | `dimensions` object |                                     | required     |
| `packageType` | Package type       | string              | Accepted values: 'CARTON', 'PALLET' | required     |

### `weight` object structure
| Name    | Description  | Type   | Format                                           | Restrictions |
|---------|--------------|--------|--------------------------------------------------|--------------|
| `value` | Weight value | number | (³)(⁶)                                           | required     |
| `units` | Weight units | number | Currently the only accepted value is 1, for "KG" | required     |

### `dimensions` object structure
| Name     | Description      | Type   | Format                                           | Restrictions |
|----------|------------------|--------|--------------------------------------------------|--------------|
| `length` | Package length   | number | (³)(⁶)                                           | required     |
| `width`  | Package width    | number | (³)(⁶)                                           | required     |
| `height` | Package height   | number | (³)(⁶)                                           | required     |
| `units`  | Dimensions units | number | Currently the only accepted value is 1, for "KG" | required     |

### `amount` object structure
| Name       | Description     | Type   | Format                                           | Restrictions |
|------------|-----------------|--------|--------------------------------------------------|--------------|
| `amount`   | Amount value    | number | (³)(⁶)                                           | required     |
| `currency` | Amount currency | string | Currently the only accepted value is "EUR"       | required     |

(¹) Data containing special characters will be rejected;  
(²) For `US`, `phone` should start with 1 and contain 11 digits;  
(³) Numbers containing non-numeric characters will be rejected;  
(⁴) `state` is required only for the following countries: IT, CA, US;  
(⁵) `email` is required for the `shipFrom` address;  
(⁶) Any value using a fractional part must use a period as the decimal separator.

---

## Examples

### Creating a new shipment: success
```
POST /v1/shipments HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Content-Length: 1834
Host: api.parcelvalue.eu
Content-Type: application/vnd.api+json

{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "attributes": {
            "shipDate": "2018-12-01",
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
                "packageType": "CARTON"
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
                "packageType": "CARTON"
            }],
            "useCod": true,
            "saturdayDelivery": true
        },
        "meta": {
            "service": "express"
        }
    }
}

HTTP/1.1 202 Accepted
Date: Fri, 02 Nov 2018 14:10:44 GMT
Server: Apache
Content-length: 1022
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"906C7AA076355F9BDD6DDF478BC1501A6BFC0D9B9678C9946F1080523673CC24","attributes":{"shipDate":"2018-12-01","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTp":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"packageType":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"packageType":"CARTON"}],"useCod":true,"saturdayDelivery":true},"links":{"self":"\/shipments\/906C7AA076355F9BDD6DDF478BC1501A6BFC0D9B9678C9946F1080523673CC24"},"meta":{"service":"express","status":0}}}
```

### Creating a new shipment: error, missing service option
```
POST /v1/shipments HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Content-Length: 1772
Host: api.parcelvalue.eu
Content-Type: application/vnd.api+json

{
    "jsonapi": {
        "version": "1.0"
    },
    "data": {
        "type": "shipment",
        "attributes": {
            "shipDate": "2018-12-01",
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
                "packageType": "CARTON"
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
                "packageType": "CARTON"
            }],
            "useCod": true,
            "saturdayDelivery": true
        }
    }
}

HTTP/1.1 400 Bad Request
Date: Fri, 02 Nov 2018 14:19:31 GMT
Server: Apache
Content-length: 129
Connection: close
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"errors":[{"status":400,"title":"Bad Request","detail":"Missing required data: data.meta.service"}]}
```

### Retrieve a shipment: success
```
GET /v1/shipments/<ID> HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Fri, 02 Nov 2018 14:21:24 GMT
Server: Apache
Content-length: 1022
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<ID>","attributes":{"shipDate":"2018-12-01","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTp":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"packageType":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"packageType":"CARTON"}],"useCod":true,"saturdayDelivery":true},"links":{"self":"\/shipments\/<ID>"},"meta":{"service":"express","status":0}}}
```

### Retrieve a shipment: error (invalid id)
```
GET /v1/shipments/1 HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 404 Not Found
Date: Fri, 02 Nov 2018 14:23:23 GMT
Server: Apache
Content-length: 105
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"errors":[{"status":404,"title":"Not Found","detail":"Shipment not found"}]}
```
