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

| Name     | Description | Type              | Format                | Restrictions |
|----------|-------------|-------------------|-----------------------|--------------|
| shipment | Shipment    | `shipment` object | Please see `shipment` | required     |

##### `shipment`

| Name       | Description      | Type   | Format               | Restrictions |
|------------|------------------|--------|----------------------|--------------|
| `shipFrom` | Sender address   | object | please see `address` | required     |
| `shipTo`   | Receiver address | object | please see `address` | required     |

##### `address`
| Name         | Description          | Type   | Format                            | Restrictions |
|--------------|----------------------|--------|-----------------------------------|--------------|
| `name`       | Name                 | string | String with no special characters | required     |
| `address1`   | Address              | string | String with no special characters | required     |
| `city`       | City                 | string | String with no special characters | required     |
| `postalCode` | Postal code          | string |                                   | required     |
| `state`      | State / province     | string | 2 letter ISO Alpha-2 code         | required (¹) |
| `country`    | Country              | string | 2 letter ISO Alpha-2 code         | required     |
| `contact`    | Contact name         | string | String with no special characters | required     |
| `phone`      | Contact phone number | string |                                   | optional (²) |
| `email`      | Contact email        | string |                                   | required (³) |

(¹) `state` is required only for the following countries: IT, CA, US;  
(²) For `US`, `phone` should start with 1 and contain 11 digits;  
(³) `email` is required for `shipFrom`;  
