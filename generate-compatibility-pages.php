<?php

/***
 * ares compatibility database seeder
 * This script iterates through a set of redump/no-intro datfiles and generates a game database
 * and static pages for the ares compatibility list
 *
 */

$ignoredStrings = [
    'global' => [
        '[BIOS]',                                                       // Bios/Firmware
        '[b]',                                                          // Bad Dumps
        '(Beta', 'Beta)', '(Proto', '[Proto',                           // Prototypes
        '(Unl)', '(Pirate)',                                            // Unlicensed Software
        '(Demo', '(Sample', '[Demo',                                    // Demos
        'Virtual Console)', 'Collection)', 'Switch Online)',            // Modern Digital Re-Releases
        'Mini)',                                                        // Mini consoles
        'Sega Ages)', 'Sega Channel)', 'SegaNet)',                      // SEGA Compilations
    ],
    'Nintendo - Super Nintendo Entertainment System' => [
        '(Wii)',                                                        // Wii re-releases
    ],
    'Sega - Mega Drive - Genesis' => [
        '(PC Rerelease)',                                               // PC Versions
    ],
    'Sega - SG-1000' => [
        'SC-3000',                                                      // SC-3000 software
        'SF-7000',                                                      // SC-3000 add-on
    ],
    'SNK - Neo Geo' => [
        '[Homebrew', '[Bootleg', 'bootleg)', '(bootleg',                // Unofficial Software
        'Hack)', 'hack)', '[hack', 'Hack]', 'EEZEZY)',                  // Hacks
        'conversion)',                                                  // CD Conversion hacks
        'Treasure of the Caribbean',                                    // Unreleased NeoCD game
        'Kof\'98 Mix (2011-10-01)',                                     // Unmarked hack
    ],
    'Nintendo - Nintendo 64' => [
        '(iQue)',                                                       // iQue Player is not 100% n64 compatible
    ]
];


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

            $combinedIgnoreList = array_merge($ignoredStrings['global'], $ignoredStrings[$info['header']['name']] ?? [], $ignoredStrings[$info['header']['homepage']] ?? []);

            foreach($combinedIgnoreList as $string) {
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
