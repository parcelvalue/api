# Developer Installation

## Install

```sh
git clone https://github.com/parcelvalue/api.git
cd api
composer update
```

## Validate structure

```sh
composer check:structure
```

## Check coding standards (PHP_CodeSniffer)

```sh
composer check
```

## Analyze PHP code (PHPStan)

```sh
composer s:7
```

## Run unit tests

```sh
composer test
```

### Run unit tests (testdox output)

```sh
composer test:d
```

## Run all checks

```sh
composer all
```

---

[README](../README.md)
