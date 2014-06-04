DROP TABLE IF EXISTS `Location`;
CREATE TABLE `Location` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT  ,
  `name` varchar(255) NULL                       ,
  `class` varchar(255) NULL                      ,
  `parentId` int(11) UNSIGNED NULL               ,
  `path` varchar(255) NULL                       ,
  `code` varchar(255) NULL                       ,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Location` (`id`, `name`, `class`, `code`, `parentId`, `path`)
VALUES
  (1  , 'Everywhere'      , 'Harp\\Locations\\Model\\Region'  , NULL , 0  , ''),
  (2  , 'European Union'  , 'Harp\\Locations\\Model\\Region'  , 'EU' , 1  , '1'),
  (3  , 'Europe - Non EU' , 'Harp\\Locations\\Model\\Region'  , NULL , 1  , '1'),
  (4  , 'USA'             , 'Harp\\Locations\\Model\\Country' , 'US' , 1  , '1'),
  (5  , 'Germany'         , 'Harp\\Locations\\Model\\Country' , 'GR' , 2  , '1/2'),
  (6  , 'France'          , 'Harp\\Locations\\Model\\Country' , 'FR' , 2  , '1/2'),
  (7  , 'United Kingdom'  , 'Harp\\Locations\\Model\\Country' , 'GB' , 2  , '1/2'),
  (8  , 'London'          , 'Harp\\Locations\\Model\\City'    , NULL , 7  , '1/2/7'),
  (9  , 'Berlin'          , 'Harp\\Locations\\Model\\City'    , NULL , 5  , '1/2/5'),
  (10 , 'Bulgaria'        , 'Harp\\Locations\\Model\\Country' , 'BG' , 3  , '1/3'),
  (11 , 'Sofia'           , 'Harp\\Locations\\Model\\City'    , 'BG' , 10 , '1/3/10');
