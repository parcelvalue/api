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

It is recommended to start by using the testing environment while developing your integration, then move to using a real account in the production environment.

Please ask ParcelValue to create a test client which you can use in the testing environment.

Once you have obtained the user and password, please log in the ParcelValue client area and visit the `API` section where you will find all the information specific to the current environment:

- API URL and version;
- Server key;
- Your Client key(s);

Current client area URL's for the API section are:

- Testing: [test.v3.my.parcelvalue.eu/api](https://test.v3.my.parcelvalue.eu/api)
- Staging: [demo.my.parcelvalue.eu/api](https://demo.my.parcelvalue.eu/api)
- Production: [v3.my.parcelvalue.eu/api](https://v3.my.parcelvalue.eu/api)

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

* Addresses
    * [`/addresses`](/docs/Endpoints/Addresses/Addresses.md)

* Clients
    * [`/clients`](/docs/Endpoints/Clients/Clients.md)

* Shipments
    * [`/shipments`](/docs/Endpoints/Shipments/Shipments.md)
    * [`/shipment-summaries`](/docs/Endpoints/ShipmentSummaries/ShipmentSummaries.md)

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

### v3.23

September 2025

- New optional field: `package`.`irregular`.

### v3.22

April 2025

* New optional field: `incoTerms`.

### v3.21

November 2024

* Add support for additional address object fields: `isResidential`, `taxIdentification`;

### v3.19

February 2023

* Add `exportDeclaration.invoiceFreight`;

### v3.18

Feburary 2023

* Add `collectionLocation`;

#### v3.17

December 2023

* New shipment field: `documentsOnly`;

#### v3.16

October 2023

* Add `exportDeclaration`;

#### v3.15

July 2023

* New endpoint: delete shipment;

#### v3.12

June 2022

* New shipment meta data field: `carrierChoice`;

#### v3.11

April 2022

* `shipDate` is now optional; if not set, it will be managed by the system;

#### v3.10.2

March 2022

* `client` object now contains the complete client address;

#### v3.10.1

March 2022

* Data containing special characters will be converted (until now it was rejected);

#### v3.10.0

March 2022

* New endpoint: `/shipment-summaries`;

#### v3.9.0

March 2022

* New endpoint: `/addresses`;

#### v3.8.0

March 2022

* New endpoint: `/clients/authentication`;

#### v3.7.0

March 2022

* New shipment object meta properties: `finalCost`, `insuranceCost`;
* New endpoint: `/shipments/<apiShipmentId>/tracking`;

#### v3.6.0

March 2022

* New shipment object meta property: `carrierName`;

#### v3.5.0

February 2022

* New meta option for one-step endpoint: `scheduledProcessing`;

#### v3.4.0

February 2022

* Add insurance support; new fields: `insuranceDescription`, `insuranceValue`;

#### v3.3.0

February 2022

* Removed unused shipment object attribute `saturdayDelivery`;
* New optional fields: `customerReference`, `specialInstructions`, `confirmationEmail`, `booking`;

#### v3

July 2021

* Shipment object meta properties `reference` and `trackingNumber` are now always returned, with default value `null`;
* Removed unused shipment object attribute `useCod`;

October 2021

* New shipment endpoints: Save, Rate, Confirm

---