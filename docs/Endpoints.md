# Endpoints

## Testing
### `/test`
Methods : `GET`, `HEAD`, `POST`

Test the ParcelValue API. Please see [Testing the API](docs/Testing.md) for more information.

## Clients

### `/clients/current`
Methods : `GET`, `HEAD`

Retrieve information about the current client.

## Shipments

### `/shipments`
Methods : `POST`

Create a new shipment.

#### Request data

| Name     | Description | Type              | Format | Restrictions |
|----------|-------------|-------------------|--------|--------------|
| shipment | Shipment    | `shipment` object |        | required     |

##### `shipment` object structure

| Name       | Description                   | Type             | Format | Restrictions |
|------------|-------------------------------|------------------|--------|--------------|
| `shipFrom` | Sender address                | `address` object |        | required     |
| `shipTo`   | Receiver address              | `address` object |        | required     |
| `packages` | One or more `package` objects | `package` object |        | required     |

##### `address` object  structure
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

##### `package` object  structure
| Name          | Description        | Type                | Format                              | Restrictions |
|---------------|--------------------|---------------------|-------------------------------------|--------------|
| `weight`      | Package weight     | `weight` object     |                                     | required     |
| `dimensions`  | Package dimensions | `dimensions` object |                                     | required     |
| `packageType` | Package type       | string              | Accepted values: 'CARTON', 'PALLET' | required     |

##### `weight` object structure
| Name    | Description  | Type   | Format                                           | Restrictions |
|---------|--------------|--------|--------------------------------------------------|--------------|
| `value` | Weight value | number | (³)(⁶)                                           | required     |
| `units` | Weight units | number | Currently the only accepted value is 1, for "KG" | required     |

##### `dimensions` object structure
| Name     | Description      | Type   | Format                                           | Restrictions |
|----------|------------------|--------|--------------------------------------------------|--------------|
| `length` | Package length   | number | (³)(⁶)                                           | required     |
| `width`  | Package width    | number | (³)(⁶)                                           | required     |
| `height` | Package height   | number | (³)(⁶)                                           | required     |
| `units`  | Dimensions units | number | Currently the only accepted value is 1, for "KG" | required     |
---

(¹) Data containing special characters will be rejected;  
(²) For `US`, `phone` should start with 1 and contain 11 digits;  
(³) Numbers containing non-numeric characters will be rejected;  
(⁴) `state` is required only for the following countries: IT, CA, US;  
(⁵) `email` is required for the `shipFrom` address;  
(⁶) Any value using a fractional part must use a period as the decimal separator.
