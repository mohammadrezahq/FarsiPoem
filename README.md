# FarsiPoem

Get random persian poem with api.

FarsiPoem works with https://api.ganjoor.net/ api.

### Setup:

Install package with composer:

```
composer require mor/farsi-poem
```

### To Use

```php
use FarsiPoem\FarsiPoem;

$poem = new FarsiPoem();
```

### Get random poem

```php

echo $poem->random()->plainText;

```

#### Get random poem by poet

Ganjoor list of poets:
حافظ (2)، خیام (3)، ابوسعید ابوالخیر (26)، صائب (22)، سعدی (7)، باباطاهر (28)، مولوی (5)، اوحدی (19)، خواجو (20)، شهریار (35)، عراقی (21)، فروغی بسطامی (32)، سلمان ساوجی (40)، محتشم کاشانی (29)، امیرخسرو دهلوی (34)، سیف فرغانی (31)، عبید زاکانی (33)، هاتف اصفهانی (25) یا رهی معیری (41)

```php

$poet_id = 2; // default = 0 : random poem from random poet

$poem->random($poet_id);

echo $poem->plainText;
```

#### History mode

This feature works with php sessions, when use save() method, the poem will save in user sessions and will show the same poem to user on page refresh and different pages.

```php
$poem->save()->random();

echo $poem->plainText;
```

#### Other

```php
$poem->save()->random();

echo $poem->plainText; // show plain text of poem.

echo $poem->verses; // show object of verses (by ganjoor api).

echo $poem->verses(Int $count = 0); // only get $count verses: 0 means all verses.

echo $poem->versesAsPlain(Int $count = 0, String $seperator = ' / '):

echo $poem->poet;
```
