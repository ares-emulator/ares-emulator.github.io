---
layout: post
title: "ares v122 released"
date: "2021-08-02 20:23"
---

This release primarily provides improved Neo Geo Pocket/Neo Geo Pocket Color and Sega 32X emulation.

The entire Neo Geo Pocket/Color library is now thought to be playable, with minor graphical issues in four titles.

A small number of SEGA 32X games are now playable, although most still experience graphical and/or audio issues.

This is the first release without Near's involvement. I (Luke Usher) will be running the ares project going forward, 
as an open-source, community project on [GitHub](https://github.com/higan-emu/ares), contributions welcome!

**Changelog:**

* ColecoVision: Clear top bit of controller port reads; fixes Defender [invertego]
* Neo Geo Pocket: Allow BIOS to handle the boot process [invertego]
* Neo Geo Pocket: Copy SNK logo from BIOS during fast boot; fixes Metal Slug: 2nd Mission [invertego]
* Neo Geo Pocket: Fix address used to test ram initialization [invertego]
* Neo Geo Pocket: Initialize Neo Geo Pocket port 1 to zero; fixes Dynamite Slugger [invertego]
* Neo Geo Pocket: Many improvements to 'fast boot' [invertego]
* Neo Geo Pocket: Re-enable savint ram to disk on unload [invertego]
* Sega 32X: Implement FM/Framebuffer access bit; fixes Spiderman [Luke Usher]
* Sega 32X: Implement RV bit [Luke Usher]
* Sega 32X: Optimise SH7604 recompiler min-cycles for 32X; fixes Knuckles Choatix & Virtua Fighter [remutro]
* Sega 32X: PWM DREQ and timer are different things; fixes PWM audio in many games [Luke Usher]
* Sega 32X: Used cached interpreter instead of recompiler [Luke Usher]
* TMS9918: Fix sprite size emulation; fixes many graphical issues in ColecoVision/MSX/SG-1000 [invertego]
* TMS9918: fix interrupt behavior [invertego]
* hiro: Fix browser dialog filters on macOS [Luke Usher]
* hiro: Force GTK3 to use X11 backend; fixes a crash under Wayland [thrimbor]
* lucia: Disable fast boot by default [Luke Usher]
* lucia: Support digital presses from analog inputs [invertego]
* mia: Add workaround for underdumped Delta Warp rom [Luke Usher]
* mia: Improve Nintendo 64 save chip database; fixes saving in some titles [sp1187]
* nall: Enable LTO by default on non-debug builds [Luke Usher]
* nall: Speed up recompiler codegen [Luke Usher]
* sh2: Allow cores to determine an ideal minimum recompiler block size [Luke Usher]
* sh2: Optimised code-gen for the interpreter [Luke Usher]
* sh2: Recompiler should invalidate single blocks, not entire pools [Luke Usher]
* tlc2900h: Fix immediate mask in BIT #,r; fixes Pocket Tennis [invertego]
* z80: Correct the effect of IE on the next instruction; fixes audio drop-out in Neo Geo Pocket games [invertego]

[Download Here](/)
