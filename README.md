# ares-emulator.github.io

Source code for the new official ares website.

## Compatibility Database

The compatibility database is seeded from no-intro/redump datfiles.

In order to update the game database, place current datfiles in `_data/datfiles`, and run `php -f compatibility-generator.php`.
This script will iterate through all dat files, and generate the static page tree required to render the compatibility lists.

Actual compatibility status is stored outside of this tree, such that updates to datfiles to not overwrite test results/content.
Actual compatibility data can be found in json format at `_data/compatibility/`. Please see existing files for an example on how to structure these.

