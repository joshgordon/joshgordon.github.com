---
layout: post
title: Arduino Control of PWM lights (Or at least a start...)
date: '2013-05-30 02:19:44'
tags:
- arduino
- led
- lights
- raspberry-pi
---

Ever since I got my first strip of RGB LED lights, I've loved them quite a bit.
The only issue is the pesky controller that came with them.

I have been meaning to do something about this for a while, so I asked for (and
received) an Arduino for Christmas. Before you say it, yes, I know that
was <em>over five months ago.</em>

Well anyways, I'm finally getting around to doing some actual stuff with it. I
had seen this <a
href="http://blog.allgaiershops.com/2012/05/10/reversing-an-rgb-led-remote/">reverse-engineering
of the existing remote and controller</a> <del>a few months back</del> nearly a
year ago on <a
href="http://hackaday.com/2012/05/10/reverse-engineering-an-rgb-led-remote/">Hack-A-Day</a>.
I went back to that earlier today, and decided to crack my controller open and
use those transistors.

I opened the controller up, and, as I had hoped, I was greeted with the exact
same board as was in the post.

I decided to rip the IC off the board, as I didn't know (and don't want to find
out) how it or the Arduino interact with each other.

I soldered some wires onto the appropriate sides of the transistors, and then
tested with the 5v and ground going to the IR receiver. Success! I could switch
the colors on and off!

I cut up some jumper wires that came with my Arduino starter kit to make it
easy to connect to the Arduino. I soldered these onto the wires that I soldered
to the transistors. Unfortunately, though, in the process of soldering wires, I
managed to rip one of the legs off one of the transistors. :( Fortunately, <a
href="https://www.amazon.com/dp/B00A46UAQO/ref=as_li_ss_til?tag=geetimlor-20&amp;camp=0&amp;creative=0&amp;linkCode=as4&amp;creativeASIN=B00A46UAQO&amp;adid=0X0H90Z8T8EZFKJHTQ5Y&amp;">I
have a box that's basically just a few transistors on the way.</a> If that
doesn't work, I still have another controller I can use.

I also included 12v and ground off the control board to the Arduino, since at
the time I was thinking of doing more control on the Arduino side of things. In
the end, I could've left the 12v off, but definitely need the ground to keep
the PWM looking nice.

I loaded up the "blink" example, and was greeted with a flashing color LED
strip. Yay!

I coded up a short program write out a reasonable white to 2 pins (I soldered
the red line directly to the power supply...), then extended it to to read in 3
bytes of serial and set pins' values to be the bytes passed in on serial.

<figure>
  <img alt="The results of my RGB white. " src="http://joshgordon.net/wp-content/uploads/2013/05/pwm-1024x576.jpg" width="630" height="354" />
  <figcaption>The results of my RGB white.</figcaption>
</figure>

I then kept going with a couple dozen lines of python that held some colors and
could easily write those to the serial port. That python as well as the code
for the Arduino are available in their current form from <a
href="https://github.com/joshgordon/pyLights">github</a>. (They're in a very
early state currently, but I'll keep working on them over the coming
<del>weeks</del> months...)

Here are some more pictures of the control board itself. I ended up PHYSICALLY ripping the IC off the board, which left the contacts in a not very nice state.

<figure>
  <img alt="The circuit board after I finished my modifications. Red and black wires you see coming towards the front are power for the Arduino, red wires towards the back are control from the Arduino. " src="http://joshgordon.net/wp-content/uploads/2013/05/board-1024x576.jpg" width="630" height="354" />
  <figcaption> The circuit board after I finished my modifications. Red and
  black wires you see coming towards the front are power for the Arduino,
  red wires towards the back are control from the Arduino.
  </figcaption>
</figure>

&nbsp;

<figure>
  <img alt="The Arduino all hooked up. " src="http://joshgordon.net/wp-content/uploads/2013/05/arduino-1024x576.jpg" width="630" height="354" />
  <figcaption> The Arduino all hooked up.</figcaption>
</figure>

Generally, I'm very happy with the direction in which this project is headed. I
have some thoughts in my head about what to do with the python stuff. (change
the color temperature based on time of day, etc...)
