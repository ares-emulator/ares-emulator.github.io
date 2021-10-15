---
layout: post
title: "ares v123 released"
date: "2021-08-22 14:50"
---

ares v123 includes significant improvements to the emulation of the ColecoVision, 
SG-1000 and the Game Boy/Game Boy Color.

This release brings the compatibility rating for ColecoVision and SG-1000 to 
four stars. 

This means that we have 100% compatibility with both of those libraries, with
the only exception being the few games that require additional peripherals 
(driving controllers; touchpads, etc).

The Game Boy improvements are significant, but not quite enough to increase 
the compatibility rating at the present time, even so, Many more games are 
playable than before.

Finally, a few tweaks to MegaDrive emulation have improved compatibility,
reduced the occurance of video corruption, and improved performance of 
the Sega 32X emulation.


**Changelog:**

 * ColecoVision: Initialize ram to 0; fixes a crash in The Heist [Luke Usher]
 * ColecoVision: Disable cartridge rom mirroring; fixes Sammy Lightfoot [invertego] 
 * ColecoVision/MSX/SG-1000: Initialize VRAM to 0; fixes various games [invertego]
 * Game Boy: Check window x-coord instead of only y-coord; improves the Acid2 test rom [Luke Usher]
 * Game Boy: Only raise STAT interrupt when display is enabled; fixes Cool Hand [invertego]
 * Game Boy: Implement HALT hardware bug [Meepster99]
 * Game Boy: Fix relationship between LY and STAT interrupt; fixes Elite Soccer, Mouse Trap Hotel, Shantae [invertego]
 * Game Boy: Only trigger STAT interrupts at the start of OAM search; fixes Mortal Kombat 3 [invertego]
 * Game Boy Color: Fix HDMA5 bit.7 reads; improves a significant number of GBC games [invertego]
 * Game Boy Advance: Simulate standard GBA instead of Game Boy Player; fixes GBA Video titles [Luke Usher]
 * Mega Drive: Implement support for Sonic & Knuckles merged roms; fixes Sonic 2K, Sonic 3K [Luke Usher]
 * Mega Drive: Implement support for SRAM/EEPROM when using the SEGA Mapper; fixes Demons of Asteborg [Luke Usher] 
 * Mega Drive: Default to 'accuracy' VDP; improves compatibility at the expense of performance [Luke Usher]
 * Mega Drive: Optimize how often the emulator synchronises between components; offsets the cost of the previous change [Luke Usher]
 * Nintendo 64: Maintain Parallel-RDP as a subtree; simplifies compilation [Luke Usher]
 * SG-1000: Implement support for roms greater than 32KB [Luke Usher]
 * SG-1000: Implement support for Taiwan Type-A/Type-B mappers; fixes unlicensed Taiwan releases [Luke Usher]
 * SM83: Fix DAA instruction [Meepster99]
 * TMS9918: Implement multicolor mode; fixes various SG-1000/ColecoVision games [invertego]
 * TMS9918/Master System/MSX: Allow sprites to bleed off top/left screen edges [invertego]
 * ares: Rename lucia to desktop-ui to better represent it's function [Luke Usher]
 * mia: Improve N64 save-type database [jeltaqq]
 * mia: Add support for UNF extension, alongside UNIF and NES [Shideravan]
 * nall: Add macOS deployment target flags; fixes ares on macOS 10.14 [MerryMage]
 * ruby: Give PulseAudio higher priority than ALSA on Linux Systems; ALSA was causing frame-rate issues [Luke Usher]

[Download Here](/)
