---
layout: default
title: ares
---

<ol><li><a href='index.html'><span>ares</span></a></li></ol>

## ares
**ares** is a multi-system emulator that began development on October 14th, 2004.

It is a descendent of [higan](https://higan.dev) and [bsnes](https://bsnes.dev)
and focuses on accuracy and preservation.

![](images/preview.png)

## Downloads

[ares v122 (Windows binary)](https://github.com/higan-emu/ares/releases/download/v122/ares-windows.zip) <br />
[ares v122 (macOS binary)](https://github.com/higan-emu/ares/releases/download/v122/ares-macos.zip) <br />
[ares v122 (ISC source code)](https://github.com/higan-emu/ares/archive/refs/tags/v122.zip)

ares is available under the terms of the [ISC](https://opensource.org/licenses/ISC) license.

### Other Platforms

These packages are maintained by third parties; they may not always be up-to-date.

[ares (ArchLinux AUR)](https://aur.archlinux.org/packages/ares-emu/)

## Issues

You may file issues via the [GitHub issue tracker](https://github.com/higan-emu/ares)

## Features
 * Native multi-platform UI
 * Adaptive sync
 * Dynamic rate control
 * Save states
 * Run-ahead
 * Rewind and fast-forward
 * Pixel shaders
 * Color correction
 * 6th-order IIR audio filtering
 * Input multi-mapping
 * Built-in games database
 * Debugger

## Systems

ares currently emulates the following 27 hardware devices:

<style>
  main tr td:nth-child(1) {
    min-width: 80px;
    transform: translateY(5%);
  }
  main tr td:nth-child(1) img {
    height: 16px;
    width: 16px;
  }
  main tr td:nth-child(2) {
    font-weight: bold;
  }
</style>

<table>
  <tr>
    <th>Status</th>
    <th>Name</th>
  </tr>
  <tr>
    <td><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/starless.png' alt=''><img src='images/starless.png' alt=''></td>
    <td><a href='images/gallery/famicom_gimmick.png'>Famicom</a> + <a href='images/gallery/famicom-disk-system_zelda.png'>Famicom Disk System</a></td>
  </tr>
  <tr>
    <td><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/star.png' alt=''></td>
    <td><a href='images/gallery/super-famicom_bahamut-lagoon.png'>Super Famicom</a> + <a href='images/gallery/super-game-boy_devichil-black-book.png'>Super Game Boy</a></td>
  </tr>
  <tr>
    <td><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/starless.png' alt=''><img src='images/starless.png' alt=''></td>
    <td><a href='images/gallery/nintendo-64_zelda-ocarina-of-time.png'>Nintendo 64</a></td>
  </tr>
  <tr>
    <td><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/starless.png' alt=''></td>
    <td><a href='images/gallery/game-boy_links-awakening.png'>Game Boy</a> + <a href='images/gallery/game-boy-color_devichil-white-book.png'>Game Boy Color</a></td>
  </tr>
  <tr>
    <td><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/starless.png' alt=''></td>
    <td><a href='images/gallery/game-boy-advance_golden-sun.png'>Game Boy Advance</a></td>
  </tr>
  <tr>
    <td><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/starless.png' alt=''></td>
    <td><a href='images/gallery/sg-1000_ninja-princess.png'>SG-1000</a></td>
  </tr>
  <tr>
    <td><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/star.png' alt=''></td>
    <td><a href='images/gallery/master-system_wonder-boy-iii.png'>Master System</a> + <a href='images/gallery/game-gear_sonic.png'>Game Gear</a></td>
  </tr>
  <tr>
    <td><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/starless.png' alt=''><img src='images/starless.png' alt=''></td>
    <td><a href='images/gallery/mega-drive_sonic-3.png'>Mega Drive</a> + <a href='images/gallery/mega-32x_chaotix.png'>Mega 32X</a> + <a href='images/gallery/mega-cd_lunar-silver-star.png'>Mega CD</a></td>
  </tr>
  <tr>
    <td><img src='images/star.png' alt=''><img src='images/starless.png' alt=''><img src='images/starless.png' alt=''><img src='images/starless.png' alt=''></td>
    <td><a href='images/gallery/playstation_wild-arms.png'>PlayStation</a></td>
  </tr>
  <tr>
    <td><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/starless.png' alt=''></td>
    <td><a href='images/gallery/pc-engine_bomberman-94.png'>PC Engine</a> + <a href='images/gallery/pc-engine-cd_rondo-of-blood.png'>PC Engine CD</a> + <a href='images/gallery/supergrafx_daimakaimura.png'>SuperGrafx</a></td>
  </tr>
  <tr>
    <td><img src='images/star.png' alt=''><img src='images/starless.png' alt=''><img src='images/starless.png' alt=''><img src='images/starless.png' alt=''></td>
    <td><a href='images/gallery/neo-geo-aes_metal-slug.png'>Neo Geo AES</a></td>
  </tr>
  <tr>
    <td><img src='images/star.png' alt=''><img src='images/starless.png' alt=''><img src='images/starless.png' alt=''><img src='images/starless.png' alt=''></td>
    <td><a href='images/gallery/msx_parodius.png'>MSX</a> + <a href='images/gallery/msx2_akumajou-dracula.png'>MSX2</a></td>
  </tr>
  <tr>
    <td><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/starless.png' alt=''></td>
    <td><a href='images/gallery/colecovision_frogger.png'>ColecoVision</a></td>
  </tr>

  <tr>
    <td><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/star.png' alt=''></td>
    <td><a href='images/gallery/neo-geo-pocket_samurai-shodown.png'>Neo Geo Pocket</a> + <a href='images/gallery/neo-geo-pocket-color_last-blade.png'>Neo Geo Pocket Color</a></td>
  </tr>
  <tr>
    <td><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/star.png' alt=''><img src='images/star.png' alt=''></td>
    <td><a href='images/gallery/wonderswan_langrisser.png'>WonderSwan</a> + <a href='images/gallery/wonderswan-color_riviera.png'>WonderSwan Color</a> + <a href='images/gallery/pocket-challenge-v2_sck1.png'>Pocket Challenge V2</a></td>
  </tr>
</table>
