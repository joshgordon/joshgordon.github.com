---
layout: post
title: ZFS Backups
date: '2014-01-18 05:02:35'
tags:
- python
---

I've used a combination of snapshots, send/recv, and external disks (2 to be exact) to back up my mirrored pair of disks offsite. The old process went something like this: 

1. Bring my disk home from its offsite location. Mount it on the server. 
2. Procrastinate for a while. 
3. Take a snapshot of my zpool, then read the documentation because it's been over a month since my last backup. 
4. Fight with it for a while, finally figure out how to do it. 
5. Actually run the darn backup. 
6. Remember to take the disk back with me to its offsite location. 

Obviously, this is not ideal. So, I wrote a [small python](https://github.com/joshgordon/pyBackup) script that does steps 2-5 for me. <sup>[1](#footnotes)</sup>

Hopefully someone can find it useful. There's still some stuff missing... Most notably, it freaks out if there isn't at least one snapshot on your destination disk. (fortunately, this is fairly straightforward to fix...) 

This is going to make running backups something that I actually do on a regular basis now- instead of putting it off indefinitely. 

### Why bother in the first place?

There's a couple of reasons for doing this. Offsite backups are a critical part of a disaster recovery plan. Should a localized disaster happen at home (Fire, Basement Flood, etc), I still haven't lost any data. One of my backups lives ~15-20 miles away, the other just a few. Losing all 3 (well, 4) copies of my data at once would be a pretty fantastic feat. 

Another reason for offline backups is to defend against ransomware. Should<sup>[2](#footnotes)</sup> someone <del>happen</del> manage to attack me, I simply laugh in their general directions and go "I have backups!" 

"But I have online (cloud-based) backups" you say. I've found Online Backups (while convinently automatic - set and forget) to be really slow. If I suffer a full disk's worth of data loss, I want a backup that I can plug into my computer and be back up and running in a matter of hours, not days. 

---
<a name="footnotes"></a>

<sup>1</sup>Disclaimer: Does not actually perform step 2, or read documentation. Neither does it fight with zfs or figure out how zfs works. It merely knows. 

<sup>2</sup>Extremely improbable, but not to be ruled totally outside the set of possible outcomes. 
