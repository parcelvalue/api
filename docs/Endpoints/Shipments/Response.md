# Response

On success, the API will return a `JSON API` document with a `shipment` or `documents` object as the `data` member.  
The `id` member of the response object will contain the ParcelValue shipment id.  

The `documents` object will contain base64 encoded file data, while the `shipments` object will contain all the available shipment information.

The `shipment` object will also contain a `links` object, which in turn contains a `self` link that identifies the resource represented by the `shipment` object.  

For shipment creation, the response will also include a `Location` header identifying the location of the newly created resource.

The `shipment` meta will contain the `status` member (please see status codes below).

## Response codes
| Result    | HTTP status code  | Notes                                 |
|-----------|-------------------|---------------------------------------|
| Success   | `200 OK`          | Retrieve shipment, retrieve documents |
| Success   | `202 Accepted`    | Create shipment                       |
| Error     | `400 Bad Request` |                                       |
| Not Found | `404 Not Found`   |                                       |

Please see the [Error Handling documentation](../../ErrorHandling.md) for further information about errors.

---

[README](../../../README.md)
