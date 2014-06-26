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

Just use the models / repos included.

All locations are saved in a single table, and their relations with one another are handled with [harp-orm/materialized-path](https://github.com/harp-orm/materialized-path)

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

License
-------

Copyright (c) 2014, Clippings Ltd. Developed by Ivan Kerin

Under BSD-3-Clause license, read LICENSE file.
