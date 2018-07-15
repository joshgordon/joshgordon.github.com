---
layout: post
title: Podcasting; game of things
date: '2014-02-08 05:21:53'
---

Podcasting
-------
I was disappointed with the set of tools availble for generating podcast feeds, so I simply decided to bake my own with a few hundred lines of python. 

It pulls a bunch of config information from a config file, then goes and connects to a mysql database to get the list of episodes. The xml file is currently only generated on demand (and served out as a static file), though I have thoughts of dynamically generating this. 

The code is not in a state to share here (need to clean up some database connection stuff out of the repo...), but I will definitely try to share it when I get the chance. 

An interesting challenge was to write a script that read metadata. I ended up using mediainfo and parsing the xml, which seems to be working great, except when there's some bit of metadata missing. I need to go back and make that script smarter about going "Oh, this is missing $tag, I better just leave that bit out of the description." 

----
Game of Things
----------
I also started working on a bit of a side project for fun. I started writing some python (in my [nonexistent]) free time that lets the user more easily track guesses in the [Game of Things](http://www.thingsthegame.com/). This came about after I realized how easy it would be to get a computer to win that game by the time it got to the end - but how difficult it would be at the beginning, where the dynamic of the game is one of guessing based on what you know of the other people playing the game. 

This falls under the same boat as my podcast scripts. They're not ready to release just yet (I haven't really finished them), but I'll release it when I get a chance. 

Here's a bit of a teaser of the output. 

    +----------+---------+---------+---------+---------+
    |   Player |   salad |    kale |    soup |   steak |
    +==========+=========+=========+=========+=========+
    |       p1 |     UNK |      NO |     UNK |     UNK |
    |       p2 |      NO |     YES |      NO |      NO |
    |       p3 |     UNK |      NO |     UNK |     UNK |
    +----------+---------+---------+---------+---------+

Getting all that lined up in python was surprisingly not difficult. Just had to do some string formatting trickery to get the values stuck in there... 

Anyways, I'd best be getting to bed. 