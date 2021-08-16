---
layout: default
title: "Type Documentation"
---

<ol>
   <li><a href='/index'><span>ares</span></a></li>
   <li><a href='/docs'><span>docs</span></a></li>
   <li><a href='/docs/types'><span>types</span></a></li>
</ol>

## Type Documentation

ares uses the following primitive number types:

```
s8   =>   8 bit signed integer
s16  =>  16 bit signed integer
s32  =>  32 bit signed integer
s64  =>  64 bit signed integer
s128 => 128 bit signed integer

u8   =>   8 bit unsigned integer
u16  =>  16 bit unsigned integer
u32  =>  32 bit unsigned integer
u64  =>  64 bit unsigned integer
u128 => 128 bit unsigned integer

f32  =>  32 bit floating point value
f64  =>  64 bit floating point value
```

ares also contains class-based numbers used for zero-initialization, arbitrary
bit-precision, implicit wrapping and masking, better self-documenting code, and
individual bit access within variables:

```
i{1-64} => 1-64 bit signed integer
n{1-64} => 1-64 bit unsigned integer
r32     => 32 bit floating point value
r64     => 64 bit floating point value
```
