---
layout: post
title: "ares v124 released"
date: "2021-10-15 15:00"
---

ares v124 brings the compatibility rating for the Famicom and Nintendo 64 cores  
up to three stars. This means that at least 80% of the game library is working.

There have been notable improvements to Game Boy, Mega Drive, Sega Mega CD, 
Sega 32X and Nintendo 64 emulation, and the PC-Engine multi-tap is now supported.

Finally, the dynamic recompiler now generates slightly more efficient code. You 
may notice a slight performance boost in Nintendo 64, Sega 32X and Sony 
PlayStation.

**Changelog:**
 * Famicom: Add support for Jaleco JF11/JF14 mapper [Shideravan]
 * Game Boy: Bring fast-boot closer to normal boot; Fixes Dr. Fraken [invertego]
 * Game Boy: Use stable sort for sprites; fixes speech bubbles in Crayon Shin-chan 3 [invertego]
 * Game Boy: Remove limit on window width; fixes pause screen in Heiankyo Alien [invertego]
 * Game Boy: Emulate serial transfers with no link; fixes input in Alleyway [invertego]
 * Game Boy: Improve handling of LCD/BG enable for DMG; fixes Hyper Lode Runner [invertego]
 * Game Boy: Resume from halt whenever (IE & IF) != 0; fies Amazing Penguin [invertego]
 * Mega Drive: Fix DMA transfer rate and H-Int signalling; fixes Another World, 3 Ninja's Kick Back, Virtua Racing, Burning Force [TascoDLX]
 * Mega Drive: Fix sprite masking and overflow; Fixes Mickey Mania [TascoDLX]
 * Mega Drive: Fix DMA fill; Fixes Demons of Asteborg [TascoDLX]
 * Mega Drive: Fix VRAM byte addressing; Fixes Contra Hard Corps, Musha [TascoDLX]
 * Mega Drive: Fix VDP control port writes [TascoDLX]
 * Mega Drive: Implement HV Counter Patching [TascoDLX]
 * Mega Drive: Implement STOP instruction; fixes Thunder Force IV [TascoDLX]
 * Mega Drive: Default to 3-button gamepad; fixes games that don't support 6-button pads [Shideravan]
 * Mega Drive/Mega CD: Fix detection of device rom header; allows Mode-1 to work [Luke Usher]
 * Mega CD: Fix word-ram 1M access pattern; Fixes Lethal Enforcers II [TascoDLX]
 * Mega CD: Fix H-Int vectoring; Fixes Microcosm, Silpheed, Wing Commander, and others [TascoDLX]
 * Mega CD: Implement full graphics/1M wordram translations; fixes Rebel Assault [TascoDLX]
 * Mega 32X: Tighten M68k sync; Fixes Kolibri and Fifa 96 [TascoDLX]
 * Neo Geo Pocket: Fix off-by-one error in LDAR instruction; fixes a crash in SNK Gals' Fighters [invertego]  
 * Nintendo 64: Support controller ports 3 & 4 [LukeUsher]
 * Nintendo 64: Better Flash Ram support; Fixes Majora's Mask, Paper Mario, Derby Stallion 64 [jeltaqq]  
 * Nintendo 64: Add mempack/rumble status to database; eliminates controller pak/rumble pak warnings [remutro]
 * Nintendo 64: Consume cycles to compensate for skipped RDRAM initialization; fixes Wave Race 64 Shindou Pak [invertego]
 * Nintendo 64: Fix PIF RAM init on cold boot, preserve RDRAM on warm reset; fixes Perfect Dark boot [invertego]
 * Nintendo 64: Default to 3 controllers for Jeopardy!, this game doesn't work with 4 controllers, even on hardware [invertego]
 * Nintendo 64: Fix FPU compare and divide exceptions; Turok is now able to play the entire Acclaim logo animation [invertego]
 * Nintendo 64: Decrease SI DMA delay; improves Turok, Donkey Kong 64, Forsaken 64, Hercules, Triple Play 2000 [invertego]
 * Nintendo 64: Implement perfect PI DMA write [rasky]
 * PC Engine: Support Multi-Tap [LukeUsher]
 * TMS9918: Widen vcounter to 9-bits; improves ColecoVision, SG-1000, MSX [invertego]
 * desktop-ui: Support up-to 5 virtual controllers (For PC-Engine) [LukeUsher]
 * desktop-ui: Fix window background with GTK3 [ghisvail]
 * desktop-ui: Install icons in freedesktop compliant locations [ghisvail]
 * desktop-ui/hiro: Improved macOS user experience [LIJI32]
 * ruby: Fix conflated keys on Windows; fixes some keyboard input issues [invertego]
 * nall: Use XDG base directories on *nix systems [ghisvail]
 * shaders: Include a selection of public-domain shaders [LukeUsher]
 * ares: Fix address masking in instruction tracer [invertego]
 * ares: Fix warnings reported by clang [invertego]
 * ares: Fix static init in node subclasses [invertego]
 * ares: Use 64-bit integers instead of 128-bit integers in the scheduler [invertego]
 * ares: Use IP relative direct branches in the recompiler, where possible [invertego]
 * ares: Emit only one epilog per block in the recompiler [invertego]
 * ares: add label API to recompiler to simplify branches [invertego]
 * ares: Use fixed BSS allocation for code cache; improves recompiler performance [invertego]
 * ares: Fix instructionEpilogue test [invertego]
 * ares: Directly emit code for target ABI; generates more efficient code in the recompiler [invertego]
 * ares: Avoid encoding absolute data addresses in the recompiler [invertego]
 * nall: allow mingw headers to define _MSVCRT_VERSION_ [invertego]
 * nall: generate PDB when building with clang on windows [invertego]
 * nall: allow generation of debug symbols with symbols=true [invertego]
 * nall: link with lld wen building with clang on Windows [invertego]
 * nall: Make thread movable but not copyable; fixes random UI hangs on Windows [invertego]
 * mia: Fix MSU-1 rom loading [Luke Usher]

[Download Here](/)
