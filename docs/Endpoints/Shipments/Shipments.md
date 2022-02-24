# `/shipments` endpoints

Create a new shipment, rate and confirm, retrieve shipment information, retrieve shipment documents.

Methods : `GET`, `POST`

## Save shipment
### `POST /shipments/save`

The request `JSON API` document should contain a `shipment` object as the document's `data` member.

[Examples](/docs/Endpoints/Shipments/ExamplesSave.md)

## Rate shipment
### `POST /shipments/rate`

The request `JSON API` document should contain a `shipment` object as the document's `data` member.

[Examples](/docs/Endpoints/Shipments/ExamplesRate.md)

---

## Confirm shipment
### `POST /shipments/confirm`

The request `JSON API` document should contain a `shipment` object as the document's `data` member.

The meta property of the `shipment` should contain a `rate` object (retrieved using the "Rate shipment" endpoint).

The `attributes.finalCost` property of the rate is optional. If present, the API will attempt to math the rate price when confirming the shipment.
If the new price is different, the shipment will not be confirmed and an error will be returned.
If the `attributes.finalCost` property is omitted, the shipment will be confirmed without checking the price.

[Examples](/docs/Endpoints/Shipments/ExamplesConfirm.md)

---

## Create and confirm a new shipment - simplified "one step" endpoint.
### `POST /shipments`

The request `JSON API` document should contain a `shipment` object as the document's `data` member.

The meta property of the `shipment` must contain the chosen `service` option, and can optionally contian the `scheduledProcessing` option.

[Example](/docs/Endpoints/Shipments/ExamplesSimple.md)

---

## Retrieve information about an existing shipment.
#### `GET /shipments/<shipmentApiId>`

The request should contain no content body.

[Examples](/docs/Endpoints/Shipments/ExamplesRetrieveShipment.md)

---

## Retrieve shipment documents
#### `GET /shipments/<shipmentApiId>/documents`

The request should contain no content body.

[Examples](/docs/Endpoints/Shipments/ExamplesRetrieveDocuments.md)

---

## Resources

* [Document Structure](/docs/Endpoints/Shipments/DocumentStructure.md)
* [Response](/docs/Endpoints/Shipments/Response.md)
