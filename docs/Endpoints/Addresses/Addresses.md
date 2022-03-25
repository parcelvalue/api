# `/addresses` endpoints

## Search addresses
### `GET /addresses`

#### Query parameters

| Name           | Description                           | Restrictions |
|----------------|---------------------------------------|--------------|
| `searchString` | The string used to perform the search | required     |

#### Response

In case there are any results the response will contain one or more `address` objects.

If there are no results, the response `data` will be empty.

Please see [Shipments Document Structure](../Shipments/DocumentStructure.md) for the list of `address` object attributes.

[Examples](ExamplesSearch.md)

---

[README](../../../README.md)
