# `/clients` endpoints

## Authenticate
### `POST /clients/authentication`

By using this endpoint you can obtain the client data needed in order to generate the JWT token used in all authenticated API calls.

Input data needed:

| field            | Description              |
|------------------|--------------------------|
| `username`       | Client username          |
| `password`       | Client password          |
| `integrationKey` | Software integration key |

In order to call this endpoint please send an `Authorization` header using a custom HTTP authentication scheme named `ParcelValueApi`, with the following authorization parameters:

| parameter        | Description                                                                     |
|------------------|---------------------------------------------------------------------------------|
| `hash`           | A SHA-256 checksum of a string containing <`username`>:<MD5 hash of `password`> |
| `integrationKey` | Software integration key                                                        |

#### Response

On success, the API will return a `JSON API` document with a `client` object as the `data` member.  
The `id` member of the `client` object will contain the ParcelValue client id.

##### Response codes

| Result  | HTTP status code   |
|---------|--------------------|
| Success | `200 OK`           |
| Error   | `401 Unauthorized` |

Please see the [Error Handling documentation](../../ErrorHandling.md) for further information about errors.

Please see the [Authentication documentation](../../Authentication.md) for further information about the authentication process and error handling.

##### Response document structure

###### `client` object attributes

| Name                | Description          | Type   |
|---------------------|----------------------|--------|
| `name`              | Client name          | string |
| `address1`          | Address              | string |
| `address2`          | Address              | string |
| `city`              | City                 | string |
| `postalCode`        | Postal code          | string |
| `state`             | State / province     | string |
| `country`           | Country              | string |
| `contact`           | Contact name         | string |
| `phone`             | Contact phone number | number |
| `email`             | Contact email        | string |
| `taxIdentification` | Tax / VAT number     | string |
| `clientKey`         | Client API key       | string |

#### `Authorization` header example

* `username`: smith
* `password`: HowSoonIsNow?1985
* `integrationKey` ABCDEFGHIJKLMNOPQRSTUVWXYZ

MD5 hash of `HowSoonIsNow?1985` is `fa0c515f46c330669d8df781f5e0b031`.

The authentication `hash` parameter is the SHA-256 checksum of:

`smith:fa0c515f46c330669d8df781f5e0b031`,

so:

`949fa85ce02bde08a1c8ef8601a20af3e1fcb4d89b0efb05f0a397bd127959cf`.

The complete header will then be:

`Authorization: ParcelValueApi hash=949fa85ce02bde08a1c8ef8601a20af3e1fcb4d89b0efb05f0a397bd127959cf, integrationKey=ABCDEFGHIJKLMNOPQRSTUVWXYZ`

Note: The [ParcelValue API Client](https://github.com/parcelvalue/api-client) project contains a functionality that generates the authentication hash based on username/password.

[Examples](ExamplesAuthentication.md)

---

## Retrieve information about the current client.
### `GET /clients/current`
### `HEAD /clients/current`

The request should contain no content body.

## Response

On success, the API will return a `JSON API` document with a `client` object as the `data` member.  
The `id` member of the `client` object will contain the ParcelValue client id.

##### Response document structure

###### `client` object attributes

| Name                | Description          | Type   |
|---------------------|----------------------|--------|
| `name`              | Client name          | string |
| `address1`          | Address              | string |
| `address2`          | Address              | string |
| `city`              | City                 | string |
| `postalCode`        | Postal code          | string |
| `state`             | State / province     | string |
| `country`           | Country              | string |
| `contact`           | Contact name         | string |
| `phone`             | Contact phone number | number |
| `email`             | Contact email        | string |
| `taxIdentification` | Tax / VAT number     | string |
| `clientKey`         | Client API key       | string |

Tip: in order to simply verify the authentication status, one could issue a `HEAD` request instead of `GET`.

[Examples](ExamplesCurrent.md)

---

[README](../../../README.md)
