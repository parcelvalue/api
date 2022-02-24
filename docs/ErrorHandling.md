# Error handling

In case of an unsuccessful request, the API will return a `4xx` or `5xx` response.  
The response `JSON API` document will contain an `error` object.  

Please see the [`JSON API` Error documentation](https://jsonapi.org/format/#errors) for more details.

Additionally, for authentication errors, the response will also contain a `WWW-Authenticate` header containing information about the error.  

Please see the [Authentication documentation](docs/Authentication.md) for further information.

## `error` object attributes

| Name     |                                                                                 |
|----------|---------------------------------------------------------------------------------|
| `status` | "the HTTP status code applicable to this problem, expressed as a string value." |
| `title`  | "a short, human-readable summary of the problem"                                |
| `detail` | "a human-readable explanation specific to this occurrence of the problem"       |
