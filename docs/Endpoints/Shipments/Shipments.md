# `/shipments`

Create a new shipment.

Methods : `POST`

## Request

### Creating a new shipment.
#### `POST` `/shipments`
The request `JSON API` document should contain a `shipment` object as the document's `data` member.

### Retrieving information about an existing shipment. [TODO]
#### `GET` `/shipments/<id>`
The request should contain no content body.

## Response

On success, the API will return a `JSON API` document with a `shipment` object as the `data` member.  
[TODO] The `id` member of the `shipment` object will contain the ParcelValue shipment id.

### Response codes
| Result  | HTTP status code  |
|---------|-------------------|
| Success | `202 Accepted`    |
| Error   | `400 Bad Request` |
> Please see the [Error Handling documentation](/docs/ErrorHandling.md) for further information about errors.

---

## Document structure

### `shipment` object attributes

| Name               | Description                   | Type             | Format          | Restrictions | Default |
|--------------------|-------------------------------|------------------|-----------------|--------------|---------|
| `shipDate`         | Shipment departure date       | string           | ISO 8601 Date   | required     |         |
| `shipFrom`         | Sender address                | `address` object |                 | required     |         |
| `shipTo`           | Receiver address              | `address` object |                 | required     |         |
| `packages`         | One or more `package` objects | `package` object |                 | required     |         |
| `useCod`           | "Cash On Delivery" option     | boolean          | `true`, `false` | optional     |`false`  |
| `saturdayDelivery` | "Saturday Delivery" option    | boolean          | `true`, `false` | optional     |`false`  |

### `shipment` object meta
| Name      | Description             | Type   | Format               | Restrictions |
|-----------|-------------------------|--------|----------------------|--------------|
| `service` | Shipment service option | string | `express`, `economy` | required     |

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

(¹) Data containing special characters will be rejected;  
(²) For `US`, `phone` should start with 1 and contain 11 digits;  
(³) Numbers containing non-numeric characters will be rejected;  
(⁴) `state` is required only for the following countries: IT, CA, US;  
(⁵) `email` is required for the `shipFrom` address;  
(⁶) Any value using a fractional part must use a period as the decimal separator.

---

## Examples

### Creating a new shipment (success)
[TODO]

### Creating a new shipment (error)
[TODO]

### Retrieve a shipment (success)
[TODO]

### Retrieve a shipment (error)
[TODO]
