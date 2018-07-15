---
layout: post
title: DNS and DHCP management through a mysql database
date: '2013-08-11 00:20:25'
---

Hello again,

I have gotten busy with work and not posted anything since then. It is time I posted.

One project I've been working on for the past few months is running my own DNS and DHCP servers. I decided I didn't want to have to edit 3 files to get forward and reverse DNS, as well as DHCP set up for a host.

Originally, my scripts started out by taking a flat file and generating the needed config files. This served me well for a few weeks, but I decided I needed to "kick it up a notch". It occurred to me that I'm already running a mySQL server, so I decided to tap into that.

Several hours later and I have scripts that can churn out config files from the database. Great! Now, how to edit the database without resorting to command line?

I had set up for a while a web interface, but that has since broken. It was half decent for what it was. Very simple, nothing terribly fancy. I've learned enough about mySQL to get by with the command line interface. :D (Added bonus of this project)

The scripts have gone through several iterations. Anyways, you can see all that on <a href="https://github.com/joshgordon/dns-dhcp-config">github</a>.

I haven't gotten around to setting it up somewhere else, but whenever I do (thinking of running it on a Raspberry Pi in my apartment that I'm moving into in a few weeks...), I will post a tutorial.