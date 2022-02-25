# parcelvalue/api

[![license](https://img.shields.io/github/license/parcelvalue/api.svg)](https://github.com/parcelvalue/api)
[![PHP](https://img.shields.io/packagist/php-v/parcelvalue/api.svg)](https://www.php.net)
[![PDS Skeleton](https://img.shields.io/badge/pds-skeleton-blue.svg)](https://github.com/php-pds/skeleton)
[![Build Status](https://travis-ci.org/parcelvalue/api.svg)](https://travis-ci.org/parcelvalue/api)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/parcelvalue/api/badges/quality-score.png)](https://scrutinizer-ci.com/g/parcelvalue/api/)

## ParcelValue API

For the latest version of this documentation please visit [https://parcelvalue.github.io/api/](https://parcelvalue.github.io/api/).

---

Before using the API please make sure you have a ParcelValue client account set up.  
Please log in the [ParcelValue client area (my.parcelvalue.eu)](https://my.parcelvalue.eu) and visit the section [`API`](https://my.parcelvalue.eu/Clients/api) where you will find the API keys and any related information.

---

## ParcelValue API documentation

### General information

* [Content type](/docs/ContentType.md)
* [Error handling](/docs/ErrorHandling.md)
* [Authentication](/docs/Authentication.md)
* [Testing the API](/docs/Testing.md)

### Endpoints

* Test
    * [`/test`](/docs/Endpoints/Test.md)

* Clients
    * [`/clients/current`](/docs/Endpoints/Clients/Current.md)

* Shipments
    * [`/shipments`](/docs/Endpoints/Shipments/Shipments.md)

---

### Project documentation

This project contains the API documentation.  
The project code is only required by the [ParcelValue API Client](https://github.com/parcelvalue/api-client), so a standalone installation is usually not needed.  
For code checking and validation, please see the [Developer installation information](/docs/DeveloperInstallation.md)


---

### Related projects

* [ParcelValue API Client](https://github.com/parcelvalue/api-client)
* [ParcelValue API Postman Collection](https://github.com/parcelvalue/postman-collection)

---

### Change log

#### v3

* Shipment object meta properties `reference` and `trackingNumber` are now always returned, with default value `null`;
* Removed unused shipment object attribute `useCod`;

#### v3.3.0

* Removed unused shipment object attribute `saturdayDelivery`;
* New optional fields: `customerReference`, `specialInstructions`, `confirmationEmail`, `booking`;

#### v3.4.0

* Add insurance support; new fields: `insuranceDescription`, `insuranceValue`;

#### v3.5.0

* New meta option for one-step endpoint: `scheduledProcessing`;
