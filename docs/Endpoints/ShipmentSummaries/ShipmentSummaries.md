# `shipment-summaries` endpoints

## Retrieve shipment summaries
### `GET /shipment-summaries`

#### Query parameters

| Name       | Description                  | Type          | Restrictions | Default     |
|------------|------------------------------|---------------|--------------|-------------|
| `dateFrom` | Period start.                | ISO 8601 Date | Optional     | 14 days ago |
| `dateTo`   | Period end.                  | ISO 8601 Date | Optional     | Current day |
| `limit`    | Number of items to retrieve. | integer       | Optional     | `10`        |

#### Response

In case there are any results the response will contain one or more `shipmentSummary` objects.

If there are no results, the response `data` will be empty.

##### `shipmentSummary` object attributes

| Name              | Description                            | Format             | Notes                     |
|-------------------|----------------------------------------|--------------------|---------------------------|
| `reference`       | Reference number                       | string             |                           |
| `shipDate`        | Departure date                         | string             | ISO 8601 Date             |
| `shipFromName`    | Sender address name                    | string             |                           |
| `shipFromCountry` | Sender address country                 | string             | 2 letter ISO Alpha-2 code |
| `shipToName`      | Receiver address name                  | string             |                           |
| `shipToCountry`   | Receiver address country               | string             | 2 letter ISO Alpha-2 code |
| `status`          | Shipment status code                   | integer            | `-1`, `0`, `3`            |
| `trackingStatus`  | Status of latest tracking event (*)    | integer (nullable) |
| `trackingDate`    | Date and time of latest tracking event | string (nullable)  |

###### (**) `trackingStatus`

For complete information about the tracking status code please see [Qapla' documentation](https://webhook.qapla.dev/en/#qaplaStatus).

##### Shipment status codes

| Code | Description                  |
|------|------------------------------|
| `-1` | Error                        |
|  `0` | Saved (pending confirmation) |
|  `3` | Shipment is confirmed        |

[Examples](ExamplesShipmentSummaries.md)

---

[README](../../../README.md)
