# Examples

## Retrieve shipment summaries

### Success, with results (default, no filters)

```
GET /v3-testing/shipment-summaries HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.26.8
Postman-Token: 2314f862-0cf7-4e26-b98e-2cfc986efb25
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
HTTP/1.1 200 OK
Date: Mon, 28 Mar 2022 15:08:39 GMT
Server: Apache
Content-length: 3136
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":[{"type":"shipmentSummary","id":"","attributes":{"reference":"100002021233","shipDate":"2022-03-28","shipFromName":"Test Client 100002","shipFromCountry":"IT","shipToName":"Germany Remote Srl","shipToCountry":"DE","status":3,"trackingStatus":null,"trackingDate":null}},{"type":"shipmentSummary","id":"<apiShipmentId>","attributes":{"reference":"100002021225","shipDate":"2022-03-23","shipFromName":"Sender Name","shipFromCountry":"IT","shipToName":"Receiver Name","shipToCountry":"DE","status":3,"trackingStatus":null,"trackingDate":null}},{"type":"shipmentSummary","id":"<apiShipmentId>","attributes":{"reference":"100002021226","shipDate":"2022-03-23","shipFromName":"Sender Name","shipFromCountry":"IT","shipToName":"Receiver Name","shipToCountry":"DE","status":3,"trackingStatus":null,"trackingDate":null}},{"type":"shipmentSummary","id":"<apiShipmentId>","attributes":{"reference":"100002021227","shipDate":"2022-03-23","shipFromName":"Sender Name","shipFromCountry":"IT","shipToName":"Receiver Name","shipToCountry":"GB","status":3,"trackingStatus":null,"trackingDate":null}},{"type":"shipmentSummary","id":"<apiShipmentId>","attributes":{"reference":"100002021228","shipDate":"2022-03-23","shipFromName":"TEST","shipFromCountry":"IT","shipToName":"TEST","shipToCountry":"IT","status":3,"trackingStatus":null,"trackingDate":null}},{"type":"shipmentSummary","id":"<apiShipmentId>","attributes":{"reference":"100002021229","shipDate":"2022-03-23","shipFromName":"TEST","shipFromCountry":"IT","shipToName":"TEST","shipToCountry":"IT","status":3,"trackingStatus":null,"trackingDate":null}},{"type":"shipmentSummary","id":"<apiShipmentId>","attributes":{"reference":"100002021230","shipDate":"2022-03-23","shipFromName":"TEST","shipFromCountry":"IT","shipToName":"TEST","shipToCountry":"IT","status":3,"trackingStatus":null,"trackingDate":null}},{"type":"shipmentSummary","id":"<apiShipmentId>","attributes":{"reference":"100002021231","shipDate":"2022-03-23","shipFromName":"TEST","shipFromCountry":"IT","shipToName":"TEST","shipToCountry":"IT","status":3,"trackingStatus":null,"trackingDate":null}},{"type":"shipmentSummary","id":"<apiShipmentId>","attributes":{"reference":"100002021214","shipDate":"2022-03-22","shipFromName":"Sender name","shipFromCountry":"IT","shipToName":"Receiver name","shipToCountry":"DE","status":3,"trackingStatus":null,"trackingDate":null}},{"type":"shipmentSummary","id":"<apiShipmentId>","attributes":{"reference":"100002021216","shipDate":"2022-03-17","shipFromName":"Sender Name","shipFromCountry":"IT","shipToName":"Receiver Name","shipToCountry":"DE","status":3,"trackingStatus":2,"trackingDate":"2022-03-16 16:00:00"}}]}
```

### Success, with results (with filters)

```
GET /v3-testing/shipment-summaries?dateFrom=2022-03-01&dateTo=2022-03-28&limit=3 HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.26.8
Postman-Token: c7cffd5e-a149-40c3-bcce-2367068d30eb
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
HTTP/1.1 200 OK
Date: Mon, 28 Mar 2022 15:09:36 GMT
Server: Apache
Content-length: 946
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":[{"type":"shipmentSummary","id":"","attributes":{"reference":"100002021233","shipDate":"2022-03-28","shipFromName":"Test Client 100002","shipFromCountry":"IT","shipToName":"Germany Remote Srl","shipToCountry":"DE","status":3,"trackingStatus":null,"trackingDate":null}},{"type":"shipmentSummary","id":"<apiShipmentId>","attributes":{"reference":"100002021225","shipDate":"2022-03-23","shipFromName":"Sender Name","shipFromCountry":"IT","shipToName":"Receiver Name","shipToCountry":"DE","status":3,"trackingStatus":null,"trackingDate":null}},{"type":"shipmentSummary","id":"<apiShipmentId>","attributes":{"reference":"100002021226","shipDate":"2022-03-23","shipFromName":"Sender Name","shipFromCountry":"IT","shipToName":"Receiver Name","shipToCountry":"DE","status":3,"trackingStatus":null,"trackingDate":null}}]}
```

### Success, no results

```
GET /v3-testing/shipment-summaries?dateFrom=2022-04-01&dateTo=2022-04-01&limit=3 HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.26.8
Postman-Token: e9777534-9273-4667-afa5-7adf49b9d384
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
HTTP/1.1 200 OK
Date: Mon, 28 Mar 2022 15:13:25 GMT
Server: Apache
Content-length: 39
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"data":[]}
```

### Error, invalid date

```
GET /v3-testing/shipment-summaries?dateFrom=2022-02-29&dateTo=2022-03-28&limit=3 HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
User-Agent: PostmanRuntime/7.26.8
Postman-Token: cf85e952-5dc5-4605-8401-0c16ed2db08d
Host: api.parcelvalue.eu
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
HTTP/1.1 400 Bad Request
Date: Mon, 28 Mar 2022 19:58:28 GMT
Server: Apache
Content-length: 131
Connection: close
Content-Type: application/vnd.api+json
{"jsonapi":{"version":"1.0"},"errors":[{"status":400,"title":"Bad Request","detail":"filter.dateFrom: Invalid date: 2022-02-29."}]}
```
