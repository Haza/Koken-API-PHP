# Basic Koken API PHP implementation


## Dependencies


The following PHP extensions are required:

* curl

## Quick Start Example

    <?php

    require_once 'PATH_TO_KOKEN/lib/Koken.php';

    $koken = new Koken('http://koken.exemple.com');
    $data    = $koken->call("/albums");
    print_r($data);

    $koken = new Koken('http://koken.exemple.com');
    $data    = $koken->call("/albums/1");
    print_r($data);


    $koken = new Koken('http://koken.exemple.com');
    $data    = $koken->call("/albums/1/content");
    print_r($data);
    ?>

## Documentation

 * For now, there is no official Koken documentation about their API :(

## License

See the LICENSE file.

