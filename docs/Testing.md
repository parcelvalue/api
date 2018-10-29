# Testing

One way of testing the API could be by installing a web browser extension.  

Some examples:  
[Restlet Client](https://chrome.google.com/webstore/detail/restlet-client-rest-api-t/aejoelaoggembcahagimdiliamlcdmfm  ) (Google Chrome)  
[RESTClient](https://addons.mozilla.org/en-US/firefox/addon/restclient/) (Mozilla Firefox)

## Test authentication
Access point: `/clients/current`  
Methods : `GET`, `HEAD`

```
GET /v999/clients/current HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Fri, 26 Oct 2018 09:13:33 GMT
Server: Apache
Content-length: 103
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json; charset=utf-8

{"jsonapi":{"version":"1.0"},"data":{"type":"client","id":"<clientId>","attributes":{"name":"<clientName>"}}}
```

---

## Test sending values to the API
Access point: `/test`  
Methods : `GET`, `HEAD`, `POST`

## Simple test

```
GET /v999/test HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Fri, 26 Oct 2018 09:08:47 GMT
Server: Apache
Content-length: 92
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json; charset=utf-8

{"jsonapi":{"version":"1.0"},"data":{"type":"test","id":null,"attributes":{"method":"GET"}}}
```

## Specify an id

```
GET /v999/test/13 HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Fri, 26 Oct 2018 09:09:24 GMT
Server: Apache
Content-length: 92
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json; charset=utf-8

{"jsonapi":{"version":"1.0"},"data":{"type":"test","id":"13","attributes":{"method":"GET"}}}
```

## Add query paramters

```
GET /v999/test/?key1=value1&key2=value2 HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Host: api.parcelvalue.eu

HTTP/1.1 200 OK
Date: Fri, 26 Oct 2018 09:09:49 GMT
Server: Apache
Content-length: 134
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json; charset=utf-8

{"jsonapi":{"version":"1.0"},"data":{"type":"test","id":null,"attributes":{"method":"GET","query":{"key1":"value1","key2":"value2"}}}}
```

## Send `POST` data

```
POST /v999/test/13 HTTP/1.1
Accept: application/vnd.api+json
Authorization: Bearer <JWT>
Content-Length: 23
Host: api.parcelvalue.eu
Content-Type: application/x-www-form-urlencoded

key1=value1&key2=value2

HTTP/1.1 200 OK
Date: Fri, 26 Oct 2018 09:10:23 GMT
Server: Apache
Content-length: 134
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: application/vnd.api+json; charset=utf-8

{"jsonapi":{"version":"1.0"},"data":{"type":"test","id":"13","attributes":{"method":"POST","data":{"key1":"value1","key2":"value2"}}}}
```
