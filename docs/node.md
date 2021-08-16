---
layout: default
title: "Node Documentation"
---

<ol>
   <li><a href='/index'><span>ares</span></a></li>
   <li><a href='/docs'><span>docs</span></a></li>
   <li><a href='/docs/node'><span>node</span></a></li>
</ol>

## Node Documentation

ares emulation cores are based around a tree concept: rather than have a single
flat API that tries to capture the nuance of every supported system, each core
is instead constructed from a tree of node objects, where each node provides its
own API. In this way, any additional functionality can be added to the tree on
an as-needed basis.

Each Node object is reference-counted as a shared_pointer, and contains
functionality to enumerate and serialize its child nodes. An attribute system is
also used to allow a user interface layer to add any metadata to the nodes that
it finds useful.

Nodes are the glue-logic between the emulation core and the user interface. An
unfortunate side-effect of this is that the full API of each node is exposed to
both, even though some functions are only meant to be called by the emulation
cores, and others only by the user interface. To address this, API functions
meant to be used only by the emulation core are marked with <code>core</code>, 
functions meant to be used only by the user interface are marked with 
<code>user</code>, and functions allowed to be used by both are marked with 
<code>both</code>.

## index

 * [load](/docs/node#load)
 * [Node](/docs/node#node)
 * [Object](/docs/node#object)
 * [System](/docs/node#system)
 * [Peripheral](/docs/node#peripheral)
 * [Port](/docs/node#port)
 * [Component::Component](/docs/node#componentcomponent)
 * [Component::RealTimeClock](/docs/node#componentrealtimeclock)
 * [Video::Video](/docs/node#videovideo)
 * [Video::Sprite](/docs/node#videosprite)
 * [Video::Screen](/docs/node#videoscreen)
 * [Audio::Audio](/docs/node#audioaudio)
 * [Audio::Stream](/docs/node#audiostream)
 * [Input::Input](/docs/node#inputinput)
 * [Input::Button](/docs/node#inputbutton)
 * [Input::Axis](/docs/node#inputaxis)
 * [Input::Trigger](/docs/node#inputtrigger)
 * [Input::Rumble](/docs/node#inputrumble)
 * [Setting::Setting](/docs/node#settingsetting)
 * [Setting::Boolean](/docs/node#settingboolean)
 * [Setting::Natural](/docs/node#settingnatural)
 * [Setting::Integer](/docs/node#settinginteger)
 * [Setting::Real](/docs/node#settingreal)
 * [Setting::String](/docs/node#settingstring)
 * [Debugger::Debugger](/docs/node#debuggerdebugger)
 * [Debugger::Memory](/docs/node#debuggermemory)
 * [Debugger::Graphics](/docs/node#debuggergraphics)
 * [Debugger::Properties](/docs/node#debuggerproperties)
 * [Debugger::Tracer::Tracer](/docs/node#debuggertracertracer)
 * [Debugger::Tracer::Notification](/docs/node#debuggertracertracer)
 * [Debugger::Tracer::Instruction](/docs/node#debuggertracerinstruction)


## load

```
user load(Node::System& node, string name) -> bool;
```

A single function is needed to construct a new tree for any given system, and so
every core in ares exposes this function in its namespace (for instance,
ares::MasterSystem::load() for the ms core.)

The node passed to load() is an output parameter (it is written to and not read
from, thus it does not need to be initialized.) The name passed allows a single
core to support multiple hardware variants (for example, "Master System"; or
"Game Gear"; for the ms core.) The name is needed even for cores that only
support a single hardware configuration.

Frontends need only include <ares/ares.hpp> and then forward declare the load()
function to be able to fully control each emulation core.

This function returns true if the core was successfully loaded. A return value
of false means that the startup sequence should be aborted here.

## Node

```
core static create(string identifier) -> Object;
user static serialize(Object node) -> string;
user static unserialize(string markup) -> Object;
user static parent(Object child) -> Object;
user static find<T>(Object from, string name) -> Object;
user static enumerate<T>(Object from) -> vector<T>;
```

## Object

```
both name() const -> string;
both parent() const -> shared_pointer_weak<Object>;
core setName(string name) -> void;
core reset() -> void;
core remove(Node::Object) -> void;
core prepend(Node::Object) -> Node::Object;
core prepend<T, ...P>(P&&...) -> Node::Object;
core append(Node::Object) -> Node::Object;
core append<T, ...P>(P&&...) -> Node::Object;
both cast<T>() -> shared_pointer<T::type>;
both is<T>() -> bool;
both find(Node::Object source) -> Node::Object;
both find<T>() -> vector<shared_pointer<T::type>>;
both find<T>(uint index) -> shared_pointer<T::type>;
both find<T = Node::Object>(string name) -> T;
both scan<T = Node::Object>(string name) -> T;
both enumerate<T>(vector<T>& objects) -> void;
user attribute<T = string>(const string& name) const -> T;
user setAttribute<T = string, U = string>(string name, const U& value) -> void;
both save() -> string;
both begin() -> iterator<Node::Object>;
both end() -> iterator<Node::Object>;
core load(Node::Object source) -> bool;
core copy(Node::Object source) -> void;
core serialize(string& output, string depth) -> void;
core unserialize(Markup::Node markup) -> void;
```

## System

```
user game() -> string;
user run() -> void;
user power(bool reset = false) -> void;
user save() -> void;
user unload() -> void;
user serialize(bool synchronize = true) -> serializer;
user unserialize(serializer& s) -> bool;
core setGame(function<string ()>) -> void;
core setRun(function<void ()>) -> void;
core setPower(function<void (bool)>) -> void;
core setSave(function<void ()>) -> void;
core setUnload(function<void ()>) -> void;
core setSerialize(function<serializer (bool)>) -> void;
core setUnserialize(function<bool (serializer&)>) -> void;
```

## Peripheral

```
user manifest() -> string;
core setManifest(function<string ()>) -> void;
```
## Port

```
both type() const -> string;
both family() const -> string;
both hotSwappable() const -> bool;
both supported() const -> vector<string>;
core setAllocate(function<Node::Peripheral (string)>) -> void;
core setConnect(function<void ()>) -> void;
core setDisconnect(function<void ()>) -> void;
core setType(string type) -> void;
core setFamily(string family) -> void;
core setHotSwappable(bool hotSwappable) -> void;
core setSupported(vector<string> supported) -> void;
both connected() -> Node::Peripheral;
both allocate(string name = {}) -> Node::Peripheral;
both connect() -> void;
both disconnect() -> void;
```
## Component::Component

```
(no unique functions)
```

## Component::RealTimeClock

```
both update() -> void;
both timestamp() const -> u64;
core setUpdate(function<void ()>) -> void;
core setTimestamp(u64 timestamp) -> void;
both synchronize(u64 timestamp = 0) -> void;
```

## Video::Video

```
(no unique functions)
```

## Video::Sprite

```
both visible() const -> bool;
both x() const -> uint;
both y() const -> uint;
both width() const -> uint;
both height() const -> uint;
both image() const -> array_view<u32>;
core setVisible(bool visible) -> void;
core setPosition(uint x, uint y) -> void;
core setImage(nall::image, bool invert = false) -> void;
```

## Video::Screen

```
core Screen(string name = {}, uint width = 0, uint height = 0);
core ~Screen();
core main(uintptr_t) -> void;
core quit() -> void;
core power() -> void;
both canvasWidth() const -> uint;
botn canvasHeight() const -> uint;
both width() const -> uint;
both height() const -> uint;
both scaleX() const -> double;
both scaleY() const -> double;
both aspectX() const -> double;
both aspectY() const -> double;
both colors() const -> uint;
core pixels(bool frame = 0) -> array_span<u32>;
both saturation() const -> double;
both gamma() const -> double;
both luminance() const -> double;
both fillColor() const -> u32;
both colorBleed() const -> bool;
both interframeBlending() const -> bool;
both rotation() const -> uint;
core resetPalette() -> void;
core resetSprites() -> void;
core setRefresh(function<void ()>) -> void;
core setViewport(uint x, uint y, uint width, uint height) -> void;
core setSize(uint width, uint height) -> void;
core setScale(double scaleX, double scaleY) -> void;
core setAspect(double aspectX, double aspectY) -> void;
user setSaturation(double saturation) -> void;
user setGamma(double gamma) -> void;
user setLuminance(double luminance) -> void;
core setFillColor(u32 fillColor) -> void;
user setColorBleed(bool colorBleed) -> void;
user setInterframeBlending(bool interframeBlending) -> void;
user setRotation(uint rotation) -> void;
core setProgressive(bool progressiveDouble = false) -> void;
core setInterlace(bool interlaceField) -> void;
core attach(Node::Sprite) -> void;
core detech(Node::Sprite) -> void;
core colors(uint colors, function<u64 (u32)>) -> void;
core frame() -> void;
core refresh() -> void;
```

## Audio::Audio

```
(no unique functions)
```

## Audio::Stream

```
both channels() const -> uint;
both frequency() const -> double;
both resamplerFrequency() const -> double;
both muted() const -> bool;
core setChannels(uint channels) -> void;
core setFrequency(double frequency) -> void;
core setResamplerFrequency(double resamplerFrequency) -> void;
core setMuted(bool muted) -> void;
core resetFilters() -> void;
core addLowPassFilter(double cutoffFrequency, uint order, uint passes = 1) -> void;
core addHighPassFilter(double cutoffFrequency, uint order, uint passes = 1) -> void;
core addLowShelfFilter(double cutoffFrequency, uint order, double gain, double slope) -> void;
core addHighShelfFilter(double cutoffFrequency, uint order, double gain, double slope) -> void;
core pending() const -> bool;
core read(double samples[]) -> uint;
core write(const double samples[]) -> void;
core frame<...P>(P&&...) -> void;
```

## Input::Input

```
(no unique functions)
```

## Input::Button

```
core value() const -> bool;
user setValue(bool value) -> void;
```

## Input::Axis

```
core value() const -> i16;
user setValue(i16 value) -> void;
```

## Input::Trigger

```
core value() const -> i16;
user setValue(i16 value) -> void;
```

## Input::Rumble

```
user enable() const -> bool;
core setEnable(bool enable) -> void;
```

## Setting::Setting

```
both dynamic() const -> bool;
core setDynamic(bool dynamic) -> void;
user readValue() const -> string;
user readLatch() const -> string;
user readAllowedValues() const -> vector<string>;
user writeValue(string value) -> void;
```

Setting nodes are used to expose user-configurable values: things such as the
desired processor revision to emulate, the region the system should identify as,
whether to display the video overscan area or not, etc.

Some settings are safe to change at any time even while the system is running,
such as the overscan settings; while others are only safe to be modified at
certain key events, such as the system region only during power-on.

To facilitate this, the Setting nodes contain both the currently assigned value
as well as the latched value. Settings that can be changed at any time are set
to be dynamic. When a setting is not dynamic, only the current value is changed.
When a setting is dynamic, both the current value and latched values are
changed. The emulation cores call latch() to copy the current value to the
latched value when they are able to, and read out the latched value for
emulation purposes.

Often times only certain values are allowed for a given setting, such as a
region setting exposing only "NTSC" and "PAL", for example. The cores will set
the allowed values, and the user interface can use these values to show the
available settings. If a list of allowed values are set, attempting to change
the current value to a value not in the list will fail.

A modify callback is provided for the emulation cores, so that they can be
notified when the latched value has been modifed by the user interface in order
to react. For instance, toggling the overscan area would result in the emulation
core adjusting the video screen size as needed.

## Setting::Boolean

```
core Boolean(string name = {}, bool value = {}, function<void (bool)> modify = {});
core modify(bool value) const -> void;
both value() const -> bool;
both latch() const -> bool;
core setModify(function<void (bool)>) -> void;
both setValue(bool value) -> void;
```

## Setting::Natural

```
core Natural(string name = {}, u64 value = {}, function<void (u64)> modify = {});
core modify(u64 value) const -> void;
both value() const -> u64;
both latch() const -> u64;
core setModify(function<void (u64)>) -> void;
both setValue(u64 value) -> void;
core setAllowedValues(vector<u64> allowedValues) -> void;
```

## Setting::Integer

```
core Integer(string name = {}, i64 value = {}, function<void (i64)> modify = {});
core modify(i64 value) const -> void;
both value() const -> i64;
both latch() const -> i64;
core setModify(function<void (i64)>) -> void;
both setValue(i64 value) -> void;
core setAllowedValues(vector<i64> allowedValues) -> void;
```

## Setting::Real

```
core Real(string name = {}, f64 value = {}, function<void (f64)> modify = {});
core modify(f64 value) const -> void;
both value() const -> f64;
both latch() const -> f64;
core setModify(function<void (f64)>) -> void;
both setValue(f64 value) -> void;
core setAllowedValues(vector<f64> allowedValues) -> void;
```

## Setting::String

```
core String(string name = {}, string value = {}, function<void (string)> modify = {});
core modify(string value) const -> void;
both value() const -> string;
both latch() const -> string;
core setModify(function<void (string)>) -> void;
both setValue(string value) -> void;
core setAllowedValues(vector<string> allowedValues) -> void;
```

## Debugger::Debugger

```
(no unique functions)
```

## Debugger::Memory

```
user size() const -> uint;
user read(u32 address) const -> u8;
user write(u32 address, u8 data) const -> void;
core setSize(uint size) -> void;
core setRead(function<u8 (u32)>) -> void;
core setWrite(function<void (u32, u8)>) -> void;
```

## Debugger::Graphics

```
user width() const -> uint;
user height() const -> uint;
user capture() const -> vector<u32>;
core setSize(uint width, uint height) -> void;
core setCapture(function<vector<u32> ()>) -> void;
```

## Debugger::Properties

```
user query() const -> string;
core setQuery(function<string ()>) -> void;
```

## Debugger::Tracer::Tracer

```
core Tracer(string name = {}, string component = {});
user component() const -> string;
user enabled() const -> bool;
core setComponent(string component) -> void;
core setEnabled(bool enabled) -> void;
```

## Debugger::Tracer::Notification

```
core notify(string message = {}) -> void;
```

## Debugger::Tracer::Instruction

```
user addressBits() const -> uint;
user addressMask() const -> uint;
user mask() const -> bool;
user depth() const -> uint;
core setAddressBits(uint addressBits, uint addressMask = 0) -> void;
user setMask(bool mask) -> void;
user setDepth(uint depth) -> void;
core address(u32 address) -> bool;
core notify(string instruction, string context, string extra = {}) -> void;
```
