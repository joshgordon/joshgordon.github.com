---
layout: post
title: Lights, v2.0 (Coming soon!)
date: '2014-03-27 02:40:08'
tags:
- lights
---

I discovered [Bottle](http://bottlepy.org/docs/dev/index.html) for Python, and it inspired me to work on my lights some more...  I never really was happy witht the web interface before. It felt slow, it looked pretty bland, and while it worked, I wasn't happy. 

Bottle should (hopefully) be changing that. But, before I got down to that, I decided it was time for a backend re-write. I wanted fading to be easier, and to be a bit more object oriented. 

I got that far, then I noticed something that annoyed me before. My lights were *flickering*. I would set the color to 25, 25, 25 (r, g, b), and they would flicker at 1-2hz. I found [this](http://jeelabs.org/2011/11/09/fixing-the-arduinos-pwm-2/), which gave me hope. I did what it said, and it fixed one of my 2 strings! I thought "Oh, I'll increment the number."

[**NOPE**](https://www.youtube.com/watch?v=Gu8mkLJqVJI&feature=youtu.be)

I ended up doing some digging through datasheets for the ATmega processor on the Arduino Leonardo. I set a few bits, but nothing. Then I came across (what I thought was) the solution page in another datasheet for the same chip. If I set PWM4x to 1 and WGM40 to 0, it should put me in fastPWM mode. Which (I thought) was what I wanted. (hint: it's not.) 

I had assumed that I was already in normal mode. It turns out that's what I wanted, and I was in Phase and Frequency Correct PWM Mode. (The Datasheet is [here](http://www.pjrc.com/teensy/atmega32u4.pdf), around page 150). 

So all I really had to do was to set WGM40 to 0, and I was done. No more lights flickering. 

That's easy. One line: 

    TCCR4D = TCCR4D & 0b11111110; 

WGM40 is the least significant bit of TCCR4D, so you just have to set it to 0 using a bitmask. 

The other lines I got (and the second one, which I incremented and actually had it work!) from the other place was this:
    
    bitSet(TCCR1B, WGM12);
    bitSet(TCCR3B, WGM12);

Which fixes the counting mode of counters 1 and 3. 

I'll push the code into my bottle branch on [github](https://github.com/joshgordon/pyLights/tree/bottle), and eventually, after all the bottle work is done, I'll get it into master! 