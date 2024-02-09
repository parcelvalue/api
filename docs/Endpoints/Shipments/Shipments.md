# `/shipments` endpoints

Create a new shipment, rate and confirm, retrieve shipment information, retrieve shipment documents.

There are two options for creating shipments:

1) Multiple API calls (similar workflow to client area):

- call [Rate](#rate-shipment) endpoint;
- select one of the rates returned;
- call [Confirm](#confirm-shipment) endpoint specifying the chosen rate;

2) Simplified "one step" procedure:

- call only one endpoint: [Create and confirm a new shipment](#create-and-confirm-a-new-shipment)
- specify a general service to use (economy or express) and the system will select the best rate automatically;

Methods : `GET`, `POST`

Note: if the shipment is subject to customs, the `exportDeclaration` object is required.

---

## Save shipment
### `POST /shipments/save`

The request `JSON API` document should contain a `shipment` object as the document's `data` member.

[Examples](ExamplesSave.md)

## Rate shipment
### `POST /shipments/rate`

The request `JSON API` document should contain a `shipment` object as the document's `data` member.

[Examples](ExamplesRate.md)

---

## Confirm shipment
### `POST /shipments/confirm`

The request `JSON API` document should contain a `shipment` object as the document's `data` member.

The meta property of the `shipment` should contain a `rate` object (retrieved using the "Rate shipment" endpoint).

The `attributes.finalCost` property of the rate is optional. If present, the API will attempt to match the rate price when confirming the shipment.
If the new price is different, the shipment will not be confirmed and an error will be returned.
If the `attributes.finalCost` property is omitted, the shipment will be confirmed without checking the price.

[Examples](ExamplesConfirm.md)

---

## Create and confirm a new shipment
### `POST /shipments`

Simplified "one step" endpoint.

The request `JSON API` document should contain a `shipment` object as the document's `data` member.

The meta property of the `shipment` must contain the chosen `service` option, and can optionally contain the `carrierChoice` and `scheduledProcessing` options.

[Examples - `scheduledProcessing` "true"](ExamplesOneStepScheduledTrue.md)

[Examples - `scheduledProcessing` "false"](ExamplesOneStepScheduledFalse.md)

[Examples - `scheduledProcessing` "false" - with carrier choice](ExamplesOneStepScheduledFalseCarrierChoice.md)

[Examples - "one step" - `scheduledProcessing` "true" - `documentsOnly`](ExamplesOneStepScheduledTrueDocumentsOnly.md)

[Examples - `scheduledProcessing` "false" - with collection location](ExamplesOneStepScheduledFalseCollectionLocation.md)

---

## Delete an existing shipment.

#### `DELETE /shipments/<apiShipmentId>`

The request should contain no content body.

On success the API returns the HTTP code 204 No Content.

[Examples](ExamplesDeleteShipment.md)

---

## Retrieve information about an existing shipment.
#### `GET /shipments/<apiShipmentId>`

The request should contain no content body.

[Examples](ExamplesRetrieveShipment.md)

---

## Retrieve shipment documents
#### `GET /shipments/<apiShipmentId>/documents`

The request should contain no content body.

[Examples](ExamplesRetrieveDocuments.md)

---

## Retrieve shipment tracking information
#### `GET /shipments/<apiShipmentId>/tracking`

The request should contain no content body.

[Examples](ExamplesRetrieveTracking.md)

---

## Resources

* [Document Structure](DocumentStructure.md)
* [Response](Response.md)

---

[README](../../../README.md)
