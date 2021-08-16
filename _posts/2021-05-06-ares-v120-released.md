---
layout: post
title: "ares v120 released"
date: "2021-05-06 15:13"
---

This release provides improved Nintendo 64 and Mega Drive emulation, plus some emulation speedups and new features like keyboard-mapping for all Nintendo 64 controls.

The infamous Titan Overdrive demos now run with the exception of one glitched screen each, but you will need to compile with <code>profile=accuracy</code> to enable the required cycle-based VDP renderer for this to work. I'll try in the future to support as much of it as I can with the default scanline renderer as well.

Changelog:

 * SH2: added support for Windows ABI to the recompiler
 * SH2: MAC must increment R[n] before reading from R[m]; fixes Virtua Fighter and Toughman Contest
 * SH2: fixed dynarec MOV @Rm+,Rn to not increment when Rm==Rn
 * SH2: fixed dynarec TST instruction
 * SH2: improved dynarec accuracy by breaking blocks on delay slot branches
 * SH2: improved dynarec accuracy by decreasing the underclocking amount
 * Mega Drive: implemented undocumented VSRAM and CRAM DMA fill
 * Mega Drive: simplified scanline VDP renderer; fixes TMNT: Tournament Fighters graphics
 * Mega Drive: improved region detection; correctly identifies Alien Soldier region now
 * Mega CD: fixed crash on game load
 * Super Famicom: fixed direct color mode; fixes Secret of Mana world map
 * WonderSwan Color: fixed initial state for new EEPROMs plus EEPROM size; fixes missing sound
 * lucia: fixed saving RAM files when a manual save path was specified
 * ruby: fixed library dependency detection for Arch Linux and other distributions
 * SH2: additional correction for dynarec MOV @Rm+,Rn instructions
 * hiro/GTK3: added CSS stylesheet overrides to improve appearance [Screwtape]
 * N64: VMRG was not clearing VCO in C++ version [Rasky]
 * N64: fixed &quot;ctc2&quot; in the disassembler
 * Mega Drive: VDP address/command bits are set even for non-register writes [Eke]
 * Mega Drive: implemented VDP FIFO with approximated timings
 * Mega Drive: implemented CPU bus arbitrator
 * N64: fixed RSP vector unit register values in the disassembler
 * Mega Drive: implemented proper VDP FIFO timings for both reads and writes (hopefully)
 * Mega Drive: enabled external and RAM refresh timing
 * Mega Drive: added (Mega Drive / Mega 32X) + Mega CD mode 1 emulation
 * Mega Drive: refactored dot-based VDP renderer
 * ares: added Thread::restart() function to reset a thread without resetting its clock
 * Mega Drive: improved DRAM refresh timings
 * Mega Drive: added VDP I/O logger
 * Mega Drive: fixed VDP counter emulation (still inaccurate)
 * Mega Drive: improved VDP DMA and FIFO emulation
 * Nintendo 64: report 64DD as missing for now; fixes F-Zero X
 * Nintendo 64: improved TLB emulation; fixes Conker's Bad Fur Day
 * Nintendo 64: PI DMA from flash always reads data, never the status; fixes Paper Mario
 * Mega Drive: improved VDP FIFO emulation
 * Mega Drive: improved VDP dot-renderer
 * nall/bit-range: fixed bug with bit indexes &gt;= 32
 * Mega Drive: fixed VDP read buffer indexing for VSRAM and CRAM
 * Mega Drive: fixed 68K to VDP DMA so that it instantly freezes the CPU
 * Mega Drive: emulated VDP left window hardware glitch where hscroll&amp;15!=0
 * Mega Drive: improved CPU interrupt handling
 * Mega Drive: added APU bus mirrorings
 * Mega Drive: emulated the VDP debug register
 * Mega Drive: fixed VDP VRAM DMA copy
 * Mega Drive: improved 128KB VRAM mode support
 * Mega Drive: mask sprite attribute table address in H40 mode [Sik]
 * Mega Drive: VDP timing improvements
 * Nintendo 64: improved EEPROM support; fixes Perfect Dark
 * Nintendo 64: improved VI interrupt support; fixes Star Wars: Rogue Squadron title screen [nodev]
 * Nintendo 64: emulated CIC-NUS-6105 copy protection; fixes Banjo-Tooie [XScale]
 * Nintendo 64: added serrate (interlace) support and fixed bug when supersampling in serrate mode
 * Nintendo 64: emulated CPU instruction cache
 * Nintendo 64: emulated CPU data cache
 * Nintendo 64: emulated CPU CACHE instruction
 * Nintendo 64: fixed CPU TLB bug; fixes GoldenEye
 * Nintendo 64: began adapting CPU cached interpreter into a dynamic recompiler
 * Nintendo 64: began adapting RSP cached interpreter into a dynamic recompiler
 * Nintendo 64: added 64-bit addressing and TLB supporting
 * Nintendo 64: added endian support to [LS][WD][LR] instructions
 * Nintendo 64: improved dynamic recompiler
 * PlayStation: began adapting CPU cached interpreter into a dynamic recompiler
 * lucia: allow mapping analog axes separately (allows mapping sticks to the keyboard)
 * Nintendo 64: corrected analog stick ranges
 * Nintendo 64: emulate the analog stick as an octagon rather than a circle [YetAnotherEmuDev]

[Download Here](/)
