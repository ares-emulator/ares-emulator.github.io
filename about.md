---
layout: default
title: "ares - About"
---

<ol><li><a href='/index'><span>ares</span></a></li><li><a href='/about'><span>about</span></a></li></ol>

## About ares

ares is an open-source multi-system emulator with a focus on accuracy and
preservation. Its source code is structured to be maximally readable and
self-documenting.

The ares name was chosen as an homage to the protagonist of my all-time favorite
video game, Lunar: The Silver Star. In fact, most of the internal naming of ares
falls in the same vein: hiro, nall, ruby, luna, lucia, mia and more are all from
the Lunar universe, which is further reflected in ares' icon. Being able to play
these great games today inside ares is the realization of a childhood dream for 
Near.

## Components

ares is the main project name and consists of the emulation cores for each
supported system. The project as a whole consists of several additional
components. They are:

**libco** — a cooperative threading library<br>
**nall** — a C++ template library and platform abstraction layer<br>
**hiro** — a cross-platform user interface abstraction layer<br>
**ruby** — a cross-platform hardware audiovisual abstraction layer<br>
**mia** — a game analyzer driven by databases and heuristics<br>
**luna** — an advanced tree-based emulator user interface, discontinued in favor of:<br>
**desktop-ui** — a simplified file-based emulator user interface (previously lucia)

## History

This project began on October 14th, 2004 under the name **bsnes**
as a Super Famicom emulator. It maintained this naming from v001-v090. 
Over the years,bsnes grew to emulate many additional systems.

On August 9th, 2012, the project was renamed to **higan**, to better reflect its
new nature as a multi-system emulator. It maintained this naming from v091-v110.
Over the years, higan grew in complexity to support more and more additional
systems.

On February 22nd, 2019, **bsnes** was revived as a spin-off of higan, to once
again focus solely on the Super Famicom -- the project's original claim to fame.
The purpose of this was to restore the ease-of-use of earlier bsnes versions,
and to provide additional performance boosts and enhancements that were not
within the spirit of the new higan project. bsnes' revival proved to be very
successful, and led to a rethink regarding the project's other emulation cores.

On March 25th, 2020, **ares** was created as a fork of higan. The reason for
this was to build on the successes of the bsnes revival to create an easy-to-use
multi-system emulator, as well as to begin adding more modern systems such as
the Nintendo 64 and PlayStation, which simply cannot be emulated using the
cycle-accurate model of higan.

Presently, bsnes, higan, and ares are developed as public open-source projects 
under group management bsnes runs as its own project, having diverged too far 
from higan to share code any longer; whereas higan and ares continue to share
code and bugfixes between the two projects.

For now, this even extends to higan and ares sharing each others' differing user
interfaces, but over time the intention is for the two projects to diverge and
stand on their own as separate, unique emulators, though still attempting to
share code improvements as much as possible between the two projects.

## Further Reading
[Credits](/credits)

