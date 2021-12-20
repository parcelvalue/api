# JWT

The `JWT` Hashing algorithm used by the ParcelValue API is `HMAC SHA256`.

The `JWT` will be constructed using the following data you should have been provided with (please check the [`API`](https://my.parcelvalue.eu) section of the ParcelValue client area for the up to date values to use): `clientId`, `clientKey`, `serverKey`.

---

A request `JWT` will have the following structure:

## Header: Algorithm & token type
```
{
  "alg": "HS256",
  "typ": "JWT"
}
```

## Payload: Data
```
{
  "sub": "<clientId>",
  "clientKey": "<clientKey>"
}
```

## Signature

The signature will be created using the `serverKey` as the secret.

---

For instructions on how to create the `JWT` please see the [official documentation](https://jwt.io/introduction/)

There are `JWT` libraries for Token signing/verification available for a multitude of programming and scripting languages:

.NET, Python, Node.js, Java, JavaScript, Perl, Ruby, Elixir, Erlang, Go, Groovy, Haskell, Haxe, Rust, Lua, Scala, D, Clojure, Objective-C, Swift, C, C++, kdb+/Q, Delphi, PHP, Crystal, 1C, PostgreSQL.  

Please see https://jwt.io/ for more information.

You can also use the [Official JWT Debugger](https://jwt.io/) to decode, verify, and generate JWTs.

For an example of generating a JWT in PHP please see the project [ParcelValue API Client](https://github.com/parcelvalue/api-client)

---

The JWT should be sent via a "`Bearer`" `Authorization` HTTP Header, like so:
```
Authorization: Bearer <JWT>
```

---
