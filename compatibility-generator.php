<?php

/***
 * ares compatibility database seeder
 * This script iterates through a set of redump/no-intro datfiles and generates a game database
 * and static pages for the ares compatibility list
 *
 */

function progressBar($done, $total) {
    $perc = floor(($done / $total) * 100);
    $left = 100 - $perc;
    $write = sprintf("\033[0G\033[2K[%'={$perc}s>%-{$left}s] - $perc%% - $done/$total", "", "");
    fwrite(STDERR, $write);
}

// Cleanup old system markdown files
$dir = new DirectoryIterator('compatibility');
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot() && $fileinfo->getExtension() == 'md') {
        unlink($fileinfo->getRealPath());
    }
}

$dir = new DirectoryIterator("_data/datfiles/");
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot() && $fileinfo->getExtension() == 'dat') {
        // Step 1: Generate json from DAT files
        $xml = simplexml_load_file($fileinfo->getRealPath());

        $info = [];
        $info['header'] = [];
        $info['games'] = [];

        $info['header'] = [
            'name' => (string)$xml->header->name,
            'description' => (string)$xml->header->description,
            'version' => (string)$xml->header->version,
            'homepage' => (string)$xml->header->homepage,
            'url' => (string)$xml->header->url
        ];

        foreach($info['header'] as $key => &$value) {
            $value = str_replace(' (BigEndian)', '', $value);
            $value = str_replace(' (Decrypted)', '', $value);
        }

        $total = count($xml->game);
        $completed = 0;

        $jsonFile = '_data/romsets/'.$info['header']['name'].'.json';
        echo "Generating ".$jsonFile."\n";

        foreach($xml->game as $game) {
            $completed++;

            // Attempt to skip bios files and other non-game content
            $ignoredStrings = [
                '[BIOS]',       // Bios/Firmware
                '[Prototype', // Neo Geo
                '[Homebrew', // Neo Geo
                '[Demo', // Neo Geo
                '[Bootleg', // Neo Geo
                '[Hack', // Neo Geo
                '(Demo',
                '(Sample',
                '(Beta',
                '(beta', // Neo Geo
                'Beta)',
                '(Proto',
                '(Program)',
                '(Pirate)',
                '(bootleg', // Neo Geo
                '[hack', // Neo Geo
                '(hack', // Neo Geo
                'hack)', // Neo Geo
                'Hack)', // Neo Geo
                'EEZEZY)', // Neo Geo
                '(Unl)',
                '(Test Program)',
                // Exclude emulated re-release roms
                '(Sega Channel)',
                '(SegaNet)',
                '(Sega Ages)',
                '(PC Rerelease)',
                '(Wii',
                'Wii)',
                '(Virtual Console',
                'Virtual Console)',
                '(iQue)',
                'Switch Online)',
                'Collection)',
                'Mini)',
                // TOSEC
                '[a',       // 'alternate' sets
                '[b',       // known bad dumps
                '[f',       // fixed (modified)
                '[h',       // hacks
                '[m',       // modified
                '[cr',      // cracked copies
                '[t',       // Trainer applied and/or translation [tr]
                '[u',       // Under-dumped
                '[o',       // Over-dumped
                '[v',       // infected with virus
                '[p',       // remove private copies
                '[re-release]',
                // Atari,
                '(Atari Anthology)',
                'Atari 7800 Development Card (USA)'
            ];

            foreach($ignoredStrings as $string) {
                if (str_contains($game['name'], $string)) { continue 2; }
                if (str_contains($game['description'], $string)) continue 2;
                if (str_contains($game->description, $string)) continue 2;
            }

               // HACK: Jekyll falls over when encountering "...", so filter it out
            $name = str_replace('...', '', $game['name']);

            $info['games'][] = [
              'name' => (string)$name,
              'description' => (string)$game->description,
            ];

            progressBar($completed, $total);
        }

        // Sort games by name
        usort($info['games'], function($a, $b) {
            return strcasecmp($a['name'], $b['name']);
        });

        // Merge multi-disc games together
        foreach($info['games'] as &$game) {
            if(preg_match("/\((Disc|Disk|Side|Tape)[^)]+\)/", $game['name'])) {
                $nameWithoutDisc = preg_replace("/\((Disc|Disk|Side|Tape)[^)]+\)/","", $game['name']);
                $descriptionWithoutDisc = preg_replace("/\((Disc|Disk|Side|Tape)[^)]+\)/","", $game['description']);

                foreach($info['games'] as $key => $otherGame) {
                    // Prevent removing the parent entry
                    if ($otherGame['name'] == $game['name']) continue;

                    $otherGame['name'] = preg_replace("/\((Disc|Disk|Side|Tape)[^)]+\)/","", $otherGame['name']);
                    if ($nameWithoutDisc == $otherGame['name']) {
                        unset($info['games'][$key]);
                    }
                }

                $game['name'] = $nameWithoutDisc;
                $game['description'] = $descriptionWithoutDisc;
            }

            $info['games'] = array_values($info['games']);
        }


        file_put_contents($jsonFile, json_encode($info, JSON_PRETTY_PRINT));

        // Step 2: Generate static compatibility pages for systems/games
        $content = "---\n".
                   "layout: compatibility\n".
                   "title: \"".$info['header']['name']."\"\n".
                   "---\n";

        file_put_contents('compatibility/'.$info['header']['name'].'.md', $content);

        // Step 3: Generate edit pages for systems/games
        $content = "---\n".
          "layout: compatibility-edit\n".
          "title: \"".$info['header']['name']."\"\n".
          "---\n";

        file_put_contents('compatibility/'.$info['header']['name'].'-edit.md', $content);

        $systemPath = 'compatibility/'.$info['header']['name'].'/';

        // Cleanup old markdown files
        if (file_exists($systemPath)) {
            $dir = new DirectoryIterator($systemPath);
            foreach ($dir as $fileinfo) {
                if (!$fileinfo->isDot() && $fileinfo->getExtension() == 'md') {
                    unlink($fileinfo->getRealPath());
                }
            }
        }

        echo "\n";
    }
}
?>
