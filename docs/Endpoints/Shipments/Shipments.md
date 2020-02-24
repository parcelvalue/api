# `/shipments`

Create a new shipment, retrieve shipment information, retrieve shipment documents.

Methods : `GET`, `POST`

## Request

### Creating a new shipment.
#### `POST` `/shipments`
The request `JSON API` document should contain a `shipment` object as the document's `data` member.

### Retrieving information about an existing shipment.
#### `GET` `/shipments/<shipmentId>`
The request should contain no content body.

### Retrieving shipment documents
#### `GET` `/shipments/<shipmentId>/documents`
The request should contain no content body.

---

## Response

On success, the API will return a `JSON API` document with a `shipment` or `documents` object as the `data` member.  
The `id` member of the response object will contain the ParcelValue shipment id.  

The `documents` object will contain base64 encoded file data, while the `shipments` object will contain all the available shipment information.

The `shipment` object will also contain a `links` object, which in turn contains a `self` link that identifies the resource represented by the `shipment` object.  

For shipment creation, the response will also include a `Location` header identifying the location of the newly created resource.

The `shipment` meta will contain the `status` member (please see status codes below).

### Response codes
| Result    | HTTP status code  | Notes                                 |
|-----------|-------------------|---------------------------------------|
| Success   | `200 OK`          | Retrieve shipment, retrieve documents |
| Success   | `202 Accepted`    | Create shipment                       |
| Error     | `400 Bad Request` |                                       |
| Not Found | `404 Not Found`   |                                       |
> Please see the [Error Handling documentation](/docs/ErrorHandling.md) for further information about errors.

---

## Document structure

### `documents` object attributes

| Name          | Description                                       | Type             | Format          |
|---------------|---------------------------------------------------|------------------|-----------------|
| `contentType` | Content-Type MIME Header                          | string           | type/subtype    |
| `fileName`    | Name of the file                                  | string           |                 |
| `fileData`    | Body of the file, encoded using the Base64 scheme | string           |                 |


### `shipment` object attributes

| Name               | Description                        | Type             | Format          | Restrictions  | Default |
|--------------------|------------------------------------|------------------|-----------------|---------------|---------|
| `shipDate`         | Departure date                     | string           | ISO 8601 Date   | required      |         |
| `shipFrom`         | Sender address                     | `address` object |                 | required      |         |
| `shipTo`           | Receiver address                   | `address` object |                 | required      |         |
| `packages`         | One or more `package` objects      | `package` object |                 | required      |         |
| `goodsDescription` | Description of items being shipped | string           |                 | required      |         |
| `invoiceSubtotal`  | Value of items being shipped       | `amount` object  |                 | required      |         |
| `useCod`           | "Cash On Delivery" option          | boolean          | `true`, `false` | optional      |`false`  |
| `saturdayDelivery` | "Saturday Delivery" option         | boolean          | `true`, `false` | optional      |`false`  |

### `shipment` object meta
| Name             | Description                                | Type    | Format               | Restrictions      |
|------------------|--------------------------------------------|---------|----------------------|-------------------|
| `service`        | Shipment service option                    | string  | `express`, `economy` | required          |
| `status`         | Shipment status code                       | integer | `-1`, `0`, `3`       | response only     |
| `reference`      | Reference number (used in the Client area) | string  |                      | response only (⁷) |
| `trackingNumber` | Tracking number                            | string  |                      | response only (⁷) |

#### Shipment status codes
| Code | Description                  |
|------|------------------------------|
| `-1` | Error                        |
|  `0` | Saved (pending confirmation) |
|  `3` | Shipment is confirmed        |

### `shipment` object links (response only)
| Name       | Description             | Type   | Format                   | Restrictions      |
|------------|-------------------------|--------|--------------------------|-------------------|
| `self`     | Shipment resource URL   | string | `<apiURL>/shipments<id>` | response only     |
| `tracking` | External tracking URL   | string |                          | response only (⁷) |


### `address` object structure
| Name         | Description          | Type   | Format                                            | Restrictions | Maximum length |
|--------------|----------------------|--------|---------------------------------------------------|--------------|----------------|
| `name`       | Name                 | string | Basic Latin string with no special characters (¹) | required     | 255            |
| `address1`   | Address              | string | Basic Latin string with no special characters (¹) | required     | 50             |
| `city`       | City                 | string | Basic Latin string with no special characters (¹) | required     | 40             |
| `postalCode` | Postal code          | string |                                                   | required     | 30             |
| `state`      | State / province     | string | 2 letter ISO Alpha-2 code                         | required (⁴) | 20             |
| `country`    | Country              | string | 2 letter ISO Alpha-2 code                         | required     | 2              |
| `contact`    | Contact name         | string | Basic Latin string with no special characters (¹) | required     | 40             |
| `phone`      | Contact phone number | number | (²)(³)                                            | optional     | 40             |
| `email`      | Contact email        | string |                                                   | required (⁵) | 40             |

### `package` object structure
| Name          | Description        | Type                | Format                              | Restrictions |
|---------------|--------------------|---------------------|-------------------------------------|--------------|
| `weight`      | Package weight     | `weight` object     |                                     | required     |
| `dimensions`  | Package dimensions | `dimensions` object |                                     | required     |
| `type`        | Package type       | string              | Accepted values: 'CARTON', 'PALLET' | required     |

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
(³) Numbers containing non-numeric characters will be rejected; Please make sure to use the point (`.`) as decimal separator;  
(⁴) `state` is required only for the following countries: IT, CA, US;  
(⁵) `email` is required for the `shipFrom` address;  
(⁶) Any value using a fractional part must use a period as the decimal separator;  
(⁷) This field is only returned for completed shipments;

---

## Examples

### Creating a new shipment: success
```
POST /v1/shipments HTTP/1.1
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
            "useCod": true,
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
Location: https://api.parcelvalue.eu/v1/shipments/251E63A94C6E663DF81885B3577603298D65D564AC04BAD30E0917CCFFD2F2B3
Content-length: 1135
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<ID>","attributes":{"shipDate":"2018-11-13","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"useCod":true,"saturdayDelivery":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v1\/shipments\/<ID>"},"meta":{"service":"express","status":0}}}
```

### Creating a new shipment: error, missing service option
```
POST /v1/shipments HTTP/1.1
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
            "useCod": true,
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

### Retrieve a shipment: error
> Shipment id is invalid

```
GET /v1/shipments/<ID> HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 404 Not Found
Date: Fri, 09 Nov 2018 13:35:16 GMT
Server: Apache
Content-length: 105
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"errors":[{"status":404,"title":"Not Found","detail":"Shipment not found"}]}
```

### Retrieve a shipment: success
> Shipment is newly created, not yet processed (status 0).

```
GET /v1/shipments/<ID> HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Fri, 09 Nov 2018 13:39:15 GMT
Server: Apache
Content-length: 1135
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<ID>","attributes":{"shipDate":"2018-11-13","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"useCod":true,"saturdayDelivery":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v1\/shipments\/<ID>"},"meta":{"service":"express","status":0}}}
```

### Retrieve a shipment: success
> Shipment is successfully processed (status 3)

```
GET /v1/shipments/<ID> HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Fri, 09 Nov 2018 13:42:13 GMT
Server: Apache
Content-length: 1214
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<ID>","attributes":{"shipDate":"2018-11-13","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"useCod":true,"saturdayDelivery":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v1\/shipments\/<ID>","tracking":<URL>},"meta":{"service":"express","status":3,"reference":<REFERENCE>,"trackingNumber":"<TRACKINGNUMBER>"}}}
```

### Retrieve a shipment: success
> There was an error processing the shipment (status -1)

```
GET /v1/shipments/<ID> HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Fri, 09 Nov 2018 13:44:33 GMT
Server: Apache
Content-length: 1161
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"shipment","id":"<ID>","attributes":{"shipDate":"2018-11-01","shipFrom":{"name":"Sender Name","address1":"Sender street 123","city":"Milano","postalCode":20129,"state":"MI","country":"IT","contact":"Sender Contactname","phone":"1234567890","email":"sender@ship.from"},"shipTo":{"name":"Receiver Name","address1":"Receiver address 123","city":"Muenchen","postalCode":80331,"country":"DE","contact":"Receiver Contactname","phone":"987654321","email":"receiver@ship.to"},"packages":[{"weight":{"value":"1.2","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"},{"weight":{"value":"1.9","units":"1"},"dimensions":{"length":"32","width":"33","height":"34","units":"1"},"type":"CARTON"}],"goodsDescription":"Items from order #1","invoiceSubtotal":{"amount":"13.69","currency":"EUR"},"useCod":true,"saturdayDelivery":true},"links":{"self":"https:\/\/api.parcelvalue.eu\/v1\/shipments\/<ID>"},"meta":{"service":"express","status":-1,"reference":<REFERENCE>}}}
```

### Retrieve shipment documents: success

```
GET /v1/shipments/<SHIPMENTID>/documents HTTP/1.1
Authorization: Bearer <JWT>
Accept: application/vnd.api+json
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Mon, 12 Nov 2018 13:48:46 GMT
Server: Apache
Content-length: 201972
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"data":{"type":"documents","id":"<SHIPMENTID>","attributes":{"contentType":"<CONTENTTYPE>","fileName":"<FILENAME>","fileData":"<FILEDATA>"}}}
```

### Retrieve shipment documents: error
> Shipment is in error (status -1), so no documents are  available

```
GET /v1/shipments/<SHIPMENTID>/documents HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 404 Not Found
Date: Mon, 12 Nov 2018 13:52:28 GMT
Server: Apache
Content-length: 101
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"errors":[{"status":404,"title":"Not Found","detail":"Shipment error"}]}
```

### Retrieve shipment documents: error
> Shipment is not yet processed (status 0), so no documents are  available

```
GET /v1/shipments/<SHIPMENTID>/documents HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 404 Not Found
Date: Mon, 12 Nov 2018 13:55:51 GMT
Server: Apache
Content-length: 113
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"errors":[{"status":404,"title":"Not Found","detail":"Shipment not yet processed"}]}
```

### Retrieve shipment documents: error
> Shipment doesn't exist

```
GET /v1/shipments/<SHIPMENTID>/documents HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 404 Not Found
Date: Mon, 12 Nov 2018 13:57:33 GMT
Server: Apache
Content-length: 105
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json

{"jsonapi":{"version":"1.0"},"errors":[{"status":404,"title":"Not Found","detail":"Shipment not found"}]}
```
