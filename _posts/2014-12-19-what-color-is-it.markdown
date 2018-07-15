---
layout: post
title: What color is it?
date: '2014-12-19 00:12:43'
---

I saw [What colour Is It](http://whatcolourisit.scn9a.org/) online the other day, and wasn't quite happy with the way it slapped hours minutes and seconds together to form a color, so I grabbed the code (which is all Javascript done on the client side, so not really that hard to grab) and fixed it. 

Each hex character represents 4 bits, so a 6 character (8 bits/channel) hex value has 24 bits. I decided to use as much of this as I could. Here's how it broke down: 

- 3 bits for Month. Seeing as that gives me 0-7, I dropped the least significant bit (basically dividing in half, rounding down...) 
- 5 bits for Day, which gives me 0-31. I'm cool with that. 
- 4 bits for hour, which gives me 0-15. Not enough space to do 24 hours, so colors get repeated twice a day. 
- 6 bits for Minutes, giving me 0-63
- 6 bits for Seconds, giving me 0-63. 

After implementing this, [David](http://blog.ohnoitsyou.net) stepped in and helped out a bit with some stuff. I'm not too much of an HTML/CSS wizard (I love bootstrap, though, which is what I do for everywhere I need to make stuff look pretty), so he mucked about with the stuff I didn't feel like mucking with. (and fixing my stupid mistakes, like pulling day of the week instead of day of the month...)

Then today David said "You should add permalinks", so half an hour of poking at javascript later, I made it work. Surprisingly easy. 

You can see the site live [here](https://joshgordon.github.io/colortime/) (edit 2018-04-23: Sorry, I let the original domain lapse. It's still up on github, though.), and see the github repo [here](https://github.com/joshgordon/coloredtime). 

I've had it produce some really pretty colors... Enjoy! 