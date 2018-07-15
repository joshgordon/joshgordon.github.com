---
layout: post
title: Cloudflare, IPv6, and more
date: '2014-11-02 03:38:12'
---

# Cloudflare
I've started running most of my websites through Cloudflare. Mostly becuase of [Universal SSL](https://blog.cloudflare.com/introducing-universal-ssl/) which let's me HTTPS all the things. 

![HTTPS ALL THE THINGS](https://i.imgur.com/Nzbj58P.jpg)

# IPv6
I discovered yesterday that we get IPv6 at home. (Thanks, Comcast. I hate you 0.3% less now.) As a result, I'm trying to bring all my stuff up to snuff with IPv6. (I'd make an IPv6 ALL THE THINGS joke, but why bother) 

This website should now be accessible through IPv6. If it's not, something's seriously wrong. (and you should contact me at [myname][at][rootdomain][dot][net] where [rootdomain][dot][net] is joshgordon.net. myname can be just about anything. 

# OpenVPN
I set up OpenVPN on my network at school, mostly so I can get on with my laptop when I'm not there. It's really awesome. I added the DigitalOcean Droplet that this is hosted on to the VPN, so now I can proxy stuff *inside* my school network out through nginx running on Digital Ocean. I haven't actually done this with a production-worthy site (I proxied the fios router for a short time yesterday to reconfigure it... VPN came up on my VPS, but not on my laptop.), but I have plans for some... Interesting? stuff to come. 

# College. The final Chapter
Dun dun dun. A little more than 43 days from now and I should be done with all my classes. I set up a pretty-crude countdown timer [here](https://jgordon.me/countdown). 

# DKIM Signatures
I set up DKIM signatures for all mail being sent out from my mail server. This is awesome, because it helps people (mostly gmail) know that I actually should be sending mail. 