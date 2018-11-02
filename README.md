# parcelvalue/api

[![license](https://img.shields.io/github/license/parcelvalue/api.svg)](https://github.com/parcelvalue/api)
[![PHP](https://img.shields.io/packagist/php-v/parcelvalue/api.svg)](https://www.php.net)
[![PDS Skeleton](https://img.shields.io/badge/pds-skeleton-blue.svg)](https://github.com/php-pds/skeleton)
[![Build Status](https://travis-ci.org/parcelvalue/api.svg)](https://travis-ci.org/parcelvalue/api)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/parcelvalue/api/badges/quality-score.png)](https://scrutinizer-ci.com/g/parcelvalue/api/)

ParcelValue API

---

Before using the API please make sure you have an account set up and can log in to the [ParcelValue client area](https://my.parcelvalue.eu).  
You can find your access data in the [`API`](https://my.parcelvalue.eu/Clients/api) section of [my.ParcelValue.eu](https://my.parcelvalue.eu).

---

## ParcelValue API documentation

### General information

* [Content type](docs/ContentType.md)
* [Error handling](docs/ErrorHandling.md)
* [Authentication](docs/Authentication.md)
* [Testing the API](docs/Testing.md)

### Endpoints

* Test
    * [`/test`](docs/Endpoints/Test.md)

* Clients
    * [`/clients/current`](docs/Endpoints/Clients/Current.md)

* Shipments
    * [`/shipments`](docs/Endpoints/Shipments/Shipments.md)

---

### Project documentation
This project contains the API documentation.  
The project code is only required by the [ParcelValue API Client](https://github.com/parcelvalue/api-client), so a standalone installation is usually not needed.  
For code checking and validation, please see the [Developer installation information](docs/DeveloperInstallation.md)
