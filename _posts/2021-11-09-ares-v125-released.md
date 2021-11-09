---
layout: post
title: "ares v125 released"
date: "2021-11-09 20:37"
---

ares v125 brings significant improvments to Famicom, Mega Drive and Mega CD/32X emulation
and minor improvements to Master System and GearGear emulation.

An issue that caused most recompiler based cores to crash on macOS has been solved.

The desktop ui also gained support for a 'screenshot' hot-key, a crash issue was fixed in the Nintendo 64 emulation core.

The website has also been updated to house a compatibility list, but a large number of titles have not yet been tested.
Feel free to submit PRs to add missing entries (edit instructions can be found on the compatibility pages)

**Changelog:**
* ci: use MSYS2 on Windows, add support for clang. Fixes performance issues on Windows [invertego]
* desktop-ui: add screenshot hotkey [kawa-oneechan]
* desktop-ui: fix file/folder browser dialog alignment [invertego]
* desktop-ui: fix linking on older macOS toolchains [rasky]
* fc: add chip type to manifest [encoded-byte]
* fc: always check for ram presence [encoded-byte]
* fc: check for ram and simplify banking [encoded-byte]
* fc: fix jaleco jf14 banking [encoded-byte]
* fc: pinout support for konami vrc7 [encoded-byte]
* fc: support expanded bnrom & uxrom [LukeUsher]
* fc: support for irem g101 mapper [encoded-byte]
* fc: support for irem h3001 mapper [encoded-byte]
* fc: support for item if12 mapper [encoded-byte]
* fc: support for item lrog017 mapper [encoded-byte]
* fc: support for taito x1-005 mapper [encoded-byte]
* fc: support for taito x1-017 mapper [encoded-byte]
* fc: support jaleco fc05 mapper [encoded-byte]
* fc: support jaleco jf13 mapper [encoded-byte]
* fc: support jaleco jf17/19 mappers [encoded-byte]
* fc: support konami vrc2 varient [encoded-byte]
* fc: support taito tc0190 mapper [encoded-byte]
* fc: support taito tc0690 mapper [encoded-byte]
* gg: add 'Micky Mouse no Castle Illusion (Japan)' to game database [LukeUsher]
* libco: fix vector register handling on aarch64 [Sintendo]
* libco: optimise co_swap_function on aarch64 [Sintendo]
* m68000: avoid changing interrupt mask on exceptions [TascoDLX]
* m68000: fix disassembly of pc-relative addresses [TascoDLX]
* m68000: restore TAS instruction for cpus other than MD main [TascoDLX]
* mcd: allow continuous CD playbacl [TascoDLX]
* mcd: auto-detect disc region based on boot code, fixes some false detections [TascoDLX]
* mcd: report error on unhandled cdd command [TascoDLX]
* mcd: reset timer on write [TascoDLX]
* mcd: support 3-button pad as default [TascoDLX]
* md: fix interrupt ack special case [TascoDLX]
* md: fix irq issues, timing, delays, ack [TascoDLX]
* md: fix z80 bus access & timing issues [TascoDLX]
* md: improved cpu open bus line accuracy [TascoDLX]
* md: improved timing/signaling for Z80 busreq [TascoDLX]
* md: prevent SRAM from masking out high rom [TascoDLX]
* md: sram support for Super Hydlide (J) [TascoDLX]
* mia: add konami vvrc2/4/6 to database [encoded-byte]
* mia: use database for fc [encoded-byte]
* ms: fix "set VDPBuffer" tests in VDPTEST.sms [LukeUsher]
* n64: increase screen canvas to 576 lines, fixes a crash in certain display modes [invertego]
* nall: Tweak & fix generation of CD subchannel data [TascoDLX]
* nall: Various fixes to CD session handling [TascoDLX]
* nall: improved CD cuesheet loading to handle PREGAP and POSTGAP [TascoDLX]
* recompiler: on macOS allow data segment to be executable [invertego]
* sh2: fix several instructions, default to recompiler [invertego]
* snes: Fix D-Port BOS test in SPC7110 Check Program [jbo-85]


 

[Download Here](/)
