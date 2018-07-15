---
layout: post
title: Lights fading!
date: '2013-08-11 00:41:33'
tags:
- lights
---

I wish I had a video to show you how awesome this is. I just checked it in.

My lights can now fade between colors. The code is still in a partially hideous state, but It works! After a while of procrastinating, I finally decided to just do it.

I fought with it for an hour or so, and got it to work properly after a while.

I'm probably doing it poorly because of my decision to push fading onto the raspberry pi, but it works.
<h3>Anyways, my idea was to make them fade nonlinearly.</h3>
<pre>#fade in 64 steps. Convenient, since the arduino has 256 steps of pwm, and 64^(4/3) 
#is 256. 
exp = 4/3.0
for i in range(65): 
    current = list() 
    #fade each of the 3 colors
    for c in range(3): 
        if end[c] &gt; start[c]: 
            current.append(int((end[c]-start[c])/256.0 * i ** exp + start[c]))
        else: 
            current.append(int(start[c] - (start[c]-end[c])/255.0 * i ** exp))</pre>
As usual, the code is on <a href="https://github.com/joshgordon/pyLights">Github</a>. I haven't implemented fading in the web interface yet, but that's on my to-do list.