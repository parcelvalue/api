# Document structure

## `address` object attributes

| Name                | Description                  | Type     | Format                                            | Restrictions | Maximum length |
|---------------------|------------------------------|----------|---------------------------------------------------|--------------|----------------|
| `name`              | Name                         | string   | Basic Latin string with no special characters (¹) | required     | 35             |
| `address1`          | Address                      | string   | Basic Latin string with no special characters (¹) | required     | 30             |
| `address2`          | Address                      | string   | Basic Latin string with no special characters (¹) | optional     | 30             |
| `city`              | City                         | string   | Basic Latin string with no special characters (¹) | required     | 30             |
| `postalCode`        | Postal code                  | string   |                                                   | required     | 30             |
| `state`             | State / province             | string   | 2 letter ISO Alpha-2 code                         | required (⁴) | 20             |
| `country`           | Country                      | string   | 2 letter ISO Alpha-2 code                         | required     | 2              |
| `contact`           | Contact name                 | string   | Basic Latin string with no special characters (¹) | required     | 35             |
| `phone`             | Contact phone number         | number   | (⁹)(²)(³)                                         | optional     | 25             |
| `email`             | Contact email                | string   |                                                   | required (⁵) | 50             |
| `isResidential`     | Address is not for a company | boolean  |                                                   | optional     |                |
| `taxIdentification` | Tax / VAT number             | string   | Basic Latin string with no special characters (¹) | optional (*) | 45             |

(*) `taxIdentification` is only required for sender address in international shipments with starting point "IT" and carrier FEDEX.

## `amount` object attributes

| Name       | Description     | Type   | Format                                           | Restrictions |
|------------|-----------------|--------|--------------------------------------------------|--------------|
| `amount`   | Amount value    | number | (³)(⁶)                                           | required     |
| `currency` | Amount currency | string | Currently the only accepted value is "EUR"       | required     |

## `dimensions` object attributes

| Name     | Description      | Type   | Format                                           | Restrictions |
|----------|------------------|--------|--------------------------------------------------|--------------|
| `length` | Package length   | number | (³)(⁶)                                           | required     |
| `width`  | Package width    | number | (³)(⁶)                                           | required     |
| `height` | Package height   | number | (³)(⁶)                                           | required     |
| `units`  | Dimensions units | number | Currently the only accepted value is 1, for "KG" | required     |

## `documents` object attributes

| Name          | Description                                       | Type             | Format          |
|---------------|---------------------------------------------------|------------------|-----------------|
| `contentType` | Content-Type MIME Header                          | string           | type/subtype    |
| `fileName`    | Name of the file                                  | string           |                 |
| `fileData`    | Body of the file, encoded using the Base64 scheme | string           |                 |

## `exportDeclaration` object attributes

| Name                | Description                     | Type              | Format        | Restrictions |
|---------------------|---------------------------------|-------------------|---------------|--------------|
| `exportReasonType`  | Reason for export.              | string            | (*)           | required     |
| `invoiceDate`       | Date of invoice.                | string            | ISO 8601 Date | required     |
| `invoiceReference`  | Invoice reference.              | string            |               | required     |
| `invoiceFreight`    | Invoice freight.                | `amount` object   |               | optional     |
| `shipmentPurpose`   | Shipment purpose.               | string            | (**)          | required     |
| `lineItems`         | One or more `lineItem` objects. | `lineItem` object |               | required     |

(*) possible values:
- 'COMMERCIAL_PURPOSE_OR_SALE'
- 'DEFENCE_MATERIAL'
- 'DIPLOMATIC_GOODS'
- 'GIFT'
- 'INTERCOMPANY_USE'
- 'PERMANENT'
- 'PERSONAL_BELONGINGS_OR_PERSONAL_USE'
- 'RETURN'
- 'RETURN_TO_ORIGIN'
- 'SAMPLE'
- 'TEMPORARY'
- 'USED_EXHIBITION_GOODS_TO_ORIGIN'
- 'WARRANTY_REPLACEMENT'

(**) possible values:
- 'COMMERCIAL'
- 'PERSONAL'


## `lineItem` object attributes

| Name            | Description     | Type   | Format | Restrictions |
|-----------------|-----------------|--------|--------|--------------|
| `reference`     | Item reference. | string |        | required     |
| `productId`     | Product Id      | string |        | required     |
| `description`   | Description     | string |        | required     |
| `quantity`      | Quantity        | number | (³)(⁶) | required     |
| `unitPrice`     | Unit price      | number | (³)(⁶) | required     |
| `originCountry` | Origin country. | string |        | required     |
| `commodityCode` | HS Code         | string |        | required     |
| `unitWeight`    | Unit weight     | number | (³)(⁶) | required     |


## `package` object attributes

| Name          | Description        | Type                | Format                              | Restrictions |
|---------------|--------------------|---------------------|-------------------------------------|--------------|
| `weight`      | Package weight     | `weight` object     |                                     | required     |
| `dimensions`  | Package dimensions | `dimensions` object |                                     | required     |
| `type`        | Package type       | string              | Accepted values: 'CARTON', 'PALLET' | required     |

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

| Name                   | Description                                   | Type             | Format         | Restrictions     | Default   |
|------------------------|-----------------------------------------------|------------------|----------------|------------------|-----------|
| `shipDate`             | Departure date                                | string           | ISO 8601 Date  | optional (****)  |           |
| `shipFrom`             | Sender address                                | `address` object |                | required         |           |
| `collectionLocation`   | Collection location                           | `address` object |                | optional         |           |
| `shipTo`               | Receiver address                              | `address` object |                | required         |           |
| `packages`             | One or more `package` objects                 | `package` object |                | required (*)     |           |
| `goodsDescription`     | Description of items being shipped            | string           |                | required         |           |
| `insuranceDescription` | Detailed description of insured items         | string           |                | optional (**)    |           |
| `insuranceValue`       | Insured amount.                               | number           | (³)(⁶)         | optional (**)    |           |
| `invoiceSubtotal`      | Value of items being shipped                  | number           | (³)(⁶)         | required         |           |
| `customerReference`    | Customer reference (free text)                | string           |                | optional         |           |
| `specialInstructions`  | Special instructions for carrier              | string           |                | optional         |           |
| `confirmationEmail`    | Send confirmation with labels to this address | string           |                | optional         |           |
| `booking`              | Use collection booking                        | boolean          | `true`, `false` | optional        | `true`    |
| `documentsOnly`        | Ship documents instead of goods.              | boolean          | `true`, `false` | optional (^)    |   `false` |
| `incoTerms`            | Incoterms                                     | number           | `1`,`2`,`3` (i) | optional        | `2`       |


(*) except for the `/shipments/save` endpoint, where `packages` can be omitted;

(**) insurance is optional, however if one field is filled then the other must also be filled;
Currently the insurance rate is NOT included in the A.P.I. rating, but if this is requested 
(by filling in the goods description and value fields) it will be invoiced at the end of the month according to the agreed rates; 
you can check the costs of the insurance policy with the ParcelValue Customer Service by writing to info@parcelvalue.eu

(****) if `shipDate` is omitted, it will be managed by the system;

(^) `documentsOnly` restrictions:
- available only for shipments that are subject to customs;
- maximum package dimensions: 30 cm x 21 cm x 15 cm;
- maximum package weight: 2.5 kg;
- unavailable fields (will be ignored): `goodsDescription`, `invoiceSubtotal`, `insuranceDescription`, `insuranceValue`;

(i) `incoTerms` possible values:
- `1`: DDP - Delivered Duty Paid (named place of destination); 
- `2`: DAP - Delivered At Place (named place of destination);
- `3`: EXW – Ex Works (named place of delivery);

## `shipment` object meta

| Name                  | Description                                | Type            | Format               | Restrictions                     |
|-----------------------|--------------------------------------------|-----------------|----------------------|----------------------------------|
| `carrierChoice`       | Carrier Choice (request)                   | string          | `DHL`, `POSTE_ITALIANE`, `TNT`, `UPS` | Optional, used in "one-step" endpoint |
| `carrierName`         | Carrier name                               | string          |                      | response only (⁷)                |
| `finalCost`           | Final shipment cost                        | `amount` object |                      | response only (⁷)                |
| `insuranceCost`       | Insurance finalCost                        | `amount` object |                      | response only (⁷)                |
| `rate`                | Shipment rate to use when confirming       | `rate` object   |                      | required for confirm endpoint    |
| `reference`           | Reference number (used in the Client area) | string          |                      | response only (⁷)                |
| `scheduledProcessing` | Scheduled processing option                | boolean         | `true`, `false`      | (*)
| `service`             | Shipment service choice (request)          | string          | `express`, `economy` | required for "one-step" endpoint |
| `status`              | Shipment status code                       | integer         | `-1`, `0`, `3`       | response only                    |
| `trackingNumber`      | Tracking number                            | string          |                      | response only (⁷)                |

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

## `tracking` object attributes

| Name                | Description                                | Type               |
|---------------------|--------------------------------------------|--------------------|
| `carrierShipmentId` | Tracking number                            | string             |
| `trackingHash`      | Tracking hash code (*)                     | string             |
| `trackingStatus`    | Status of latest tracking event (**)        | integer (nullable) |
| `trackingDate`      | Date and time of latest tracking event     | string (nullable)  |

### (*) `trackingHash`

The hash code can be used to generate the tracking link. The format is: `https://tracking.qapla.it/<trackingHash>`.

### (**) `trackingStatus`

For complete information about the tracking status code please see [Qapla' documentation](https://webhook.qapla.dev/en/#qaplaStatus).

## `weight` object attributes

| Name    | Description  | Type   | Format                                           | Restrictions |
|---------|--------------|--------|--------------------------------------------------|--------------|
| `value` | Weight value | number | (³)(⁶)                                           | required     |
| `units` | Weight units | number | Currently the only accepted value is 1, for "KG" | required     |

---

### Notes

(¹) Data containing special characters will be converted;

(²) For `US`, `phone` should start with 1 and contain 11 digits;

(³) Numbers containing non-numeric characters will be rejected; Please make sure to use the point (`.`) as decimal separator;

(⁴) `state` is required only for the following countries: IT, CA, US;

(⁵) `email` is required for the `shipFrom` address;

(⁶) Any value using a fractional part must use a period as the decimal separator;

(⁷) This field is only returned for completed shipments, otherwise the value is `null`;

(⁸) This field is only returned for completed shipments, otherwise the field is not present in the response;

(⁹) Non numeric values will be discarded.

---

[README](../../../README.md)
