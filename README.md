Locations
=========

[![Build Status](https://travis-ci.org/harp-orm/locations.svg?branch=master)](https://travis-ci.org/harp-orm/locations)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/harp-orm/locations/badges/quality-score.png)](https://scrutinizer-ci.com/g/harp-orm/locations/)
[![Code Coverage](https://scrutinizer-ci.com/g/harp-orm/locations/badges/coverage.png)](https://scrutinizer-ci.com/g/harp-orm/locations/)
[![Latest Stable Version](https://poser.pugx.org/harp-orm/locations/v/stable.svg)](https://packagist.org/packages/harp-orm/locations)

Regions, Countries and Cities.
Hierachical Location struction - you can have regions that encompas countries or cities.

Usage
-----

Just use the provided models

All locations are saved in a single table, and their relations with one another are handled with [harp-orm/materialized-path](https://github.com/harp-orm/materialized-path)
All Models are children of the Locaition model, inhereting its methods.

__Database Tables:__

```
┌─────────────────────────┐
│ Table: Location         │
├─────────────┬───────────┤
│ id          │ ingeter   │
│ name        │ string    │
│ class       │ string    │
│ parentId    │ integer   │
│ path        │ string    │
│ code        │ string    │
└─────────────┴───────────┘
```


Methods
-------

City, Country, Region and Locaiotn models have some helper methods:

Method                                    | Description
------------------------------------------|--------------------------------------------------
__contains__(Location $location)          | Check if a given location contains another location, will return true if its a child or is the same location
__isRegion__()                            | Return true for Region models and false for everything else
__isCountry__()                           | Return true for Country models and false for everything else
__isCity__()                              | Return true for City models and false for everything else


License
-------

Copyright (c) 2014, Clippings Ltd. Developed by Ivan Kerin

Under BSD-3-Clause license, read LICENSE file.
