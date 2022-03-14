# Document structure

## `documents` object attributes

| Name          | Description                                       | Type             | Format          |
|---------------|---------------------------------------------------|------------------|-----------------|
| `contentType` | Content-Type MIME Header                          | string           | type/subtype    |
| `fileName`    | Name of the file                                  | string           |                 |
| `fileData`    | Body of the file, encoded using the Base64 scheme | string           |                 |

## `rate` object attributes

| Name                               | Type     | Notes    |
|------------------------------------|----------|----------|
| `type`                             | string   | required |
| `id`                               | string   | required |
| `attributes`                       | object   | required |
| `attributes.carrierCode`           | string   | required |
| `attributes.carrierName`           | string   | required |
| `attributes.serviceCode`           | string   | required |
| `attributes.serviceName`           | string   | required |
| `attributes.serviceDefinitionCode` | string   | required |
| `attributes.accountId`             | string   | required |
| `attributes.finalCost`             | `amount` | required |
| `attributes.estimatedDeliveryDate` | string   | optional; ISO 8601 Date; nullable |

## `shipment` object attributes

| Name                   | Description                                   | Type             | Format          | Restrictions  | Default |
|------------------------|-----------------------------------------------|------------------|-----------------|---------------|---------|
| `shipDate`             | Departure date                                | string           | ISO 8601 Date   | required      |         |
| `shipFrom`             | Sender address                                | `address` object |                 | required      |         |
| `shipTo`               | Receiver address                              | `address` object |                 | required      |         |
| `packages`             | One or more `package` objects                 | `package` object |                 | required (*)  |         |
| `goodsDescription`     | Description of items being shipped            | string           |                 | required      |         |
| `insuranceDescription` | Detailed description of insured items         | string           |                 | optional (**) |         |
| `insuranceValue`       | Insured amount.                               | number           | (³)(⁶)          | optional (**) |         |
| `invoiceSubtotal`      | Value of items being shipped                  | `amount` object  |                 | required      |         |
| `customerReference`    | Customer reference (free text)                | string           |                 | optional      |         |
| `specialInstructions`  | Special instructions for carrier              | string           |                 | optional      |         |
| `confirmationEmail`    | Send confirmation with labels to this address | string           |                 | optional      |         |
| `booking`              | Use collection booking                        | boolean          | `true`, `false` | optional      | `true`  |

(*) except for the `/shipments/save` endpoint, where `packages` can be omitted;

(**) insurance is optional, however if one field is filled then the other must also be filled;

## `shipment` object meta

| Name                  | Description                                | Type          | Format               | Restrictions                     |
|-----------------------|--------------------------------------------|---------------|----------------------|----------------------------------|
| `rate`                | Shipment rate to use when confirming       | `rate` object |                      | required for confirm endpoint    |
| `scheduledProcessing` | Scheduled processing option                | boolean       | `true`, `false`      | (*)
| `service`             | Shipment service option                    | string        | `express`, `economy` | required for "one-step" endpoint |
| `status`              | Shipment status code                       | integer       | `-1`, `0`, `3`       | response only                    |
| `carrierName`         | Carrier name                               | string        |                      | response only (⁷)                |
| `reference`           | Reference number (used in the Client area) | string        |                      | response only (⁷)                |
| `trackingNumber`      | Tracking number                            | string        |                      | response only (⁷)                |

#### (*) `scheduledProcessing`

Used only in the "one-step" endpoint;

##### `true`

* default option;
* shipment processing is asynchronous;
* separate call needed in order to obtain the result of shipment processing;
* response code `202 Accepted`;

##### `false`

* shipment processing is done immediately and result is returned in the response;
* response code `202 Created`;
* response time can be longer as a result of the processing overhead;

### Shipment status codes

| Code | Description                  |
|------|------------------------------|
| `-1` | Error                        |
|  `0` | Saved (pending confirmation) |
|  `3` | Shipment is confirmed        |

## `shipment` object links (response only)

| Name       | Description             | Type   | Format                   | Restrictions      |
|------------|-------------------------|--------|--------------------------|-------------------|
| `self`     | Shipment resource URL   | string | `<apiURL>/shipments<id>` | response only     |
| `tracking` | External tracking URL   | string |                          | response only (⁸) |


## `address` object structure

| Name         | Description          | Type   | Format                                            | Restrictions | Maximum length |
|--------------|----------------------|--------|---------------------------------------------------|--------------|----------------|
| `name`       | Name                 | string | Basic Latin string with no special characters (¹) | required     | 35             |
| `address1`   | Address              | string | Basic Latin string with no special characters (¹) | required     | 30             |
| `address2`   | Address              | string | Basic Latin string with no special characters (¹) | optional     | 30             |
| `city`       | City                 | string | Basic Latin string with no special characters (¹) | required     | 30             |
| `postalCode` | Postal code          | string |                                                   | required     | 30             |
| `state`      | State / province     | string | 2 letter ISO Alpha-2 code                         | required (⁴) | 20             |
| `country`    | Country              | string | 2 letter ISO Alpha-2 code                         | required     | 2              |
| `contact`    | Contact name         | string | Basic Latin string with no special characters (¹) | required     | 35             |
| `phone`      | Contact phone number | number | (²)(³)                                            | optional     | 25             |
| `email`      | Contact email        | string |                                                   | required (⁵) | 50             |

## `package` object structure

| Name          | Description        | Type                | Format                              | Restrictions |
|---------------|--------------------|---------------------|-------------------------------------|--------------|
| `weight`      | Package weight     | `weight` object     |                                     | required     |
| `dimensions`  | Package dimensions | `dimensions` object |                                     | required     |
| `type`        | Package type       | string              | Accepted values: 'CARTON', 'PALLET' | required     |

## `weight` object structure

| Name    | Description  | Type   | Format                                           | Restrictions |
|---------|--------------|--------|--------------------------------------------------|--------------|
| `value` | Weight value | number | (³)(⁶)                                           | required     |
| `units` | Weight units | number | Currently the only accepted value is 1, for "KG" | required     |

## `dimensions` object structure

| Name     | Description      | Type   | Format                                           | Restrictions |
|----------|------------------|--------|--------------------------------------------------|--------------|
| `length` | Package length   | number | (³)(⁶)                                           | required     |
| `width`  | Package width    | number | (³)(⁶)                                           | required     |
| `height` | Package height   | number | (³)(⁶)                                           | required     |
| `units`  | Dimensions units | number | Currently the only accepted value is 1, for "KG" | required     |

## `amount` object structure

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

(⁷) This field is only returned for completed shipments, otherwise the value is `null`;

(⁸) This field is only returned for completed shipments, otherwise the field is not present in the response;

---

[README](../../../README.md)
