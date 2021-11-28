---
layout: post
title: "ares v126 released"
date: "2021-11-28 08:30"
---

ares v126 brings even more improvements to the NES/Famicom emulation by adding support for many more rom mappers.
Compatibility for MSX1/MSX2 has also improved as a result of adding heuristics for better mapper detection.

An issue that prevented Windows users from mapping inputs in v125.1 has also been fixed.

**Changelog:**
* fc: support for namco 175/340 boards [encoded-byte]
* fc: support for namco 118 board [encoded-byte]
* fc: support for Color Dreams board [sp1187]
* fc: support for bandai 74161 boards [encoded-byte]
* fc: split bandai fcg / lz93d50 boards [encoded-byte]
* fc: Support for Action 52 board [sp1187]
* fc: support for bandai lz93d50 variant [encoded-byte]
* fc: support for unrom variants [encoded-byte]
* fc: support for sxrom boards with mmc1a [encoded-byte]
* fc: support for cnrom with security [encoded-byte]
* fc: support txrom variants [encoded-byte]
* fc: support for namco 163 board (no sound) [encoded-byte]
* fc: attach sunsoft 4 + ext rom [encoded-byte]
* fc: support for cprom board [encoded-byte]
* fc: support for bandai karaoke board [encoded-byte]
* fc: fix saving on bandai lz93d50 + m24c02 [encoded-byte]
* fc: support for bandai oeka board [encoded-byte]
* fc: partial support for bandai datach [encoded-byte]
* msx: add heuristics for rom type detection [LukeUsher]
* msx: msx: use the slot layout and memory expected by cbios [LukeUsher]
* component: fix eeprom m24c mode selection [encoded-byte]
* hiro: monitor activate messages for window focus [invertego]
* mia: updated fc database [encoded-byte]


[Download Here](/)
