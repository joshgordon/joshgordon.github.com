---
layout: post
title: Sermon Archive
date: '2014-12-07 04:34:45'
tags:
- programming
- php
---

I got fed up with the appearance of my Church's sermon archive (which was just an FTP site - not very pretty or user friendly...), so I ~~hacked together~~ wrote up a more elegant frontend. It's a single file webpage, which just reads the directory structures and files off the disk and renders pages on the fly. All things considered, it's darned fast. (That's one of the great things about [Digital Ocean's](https://www.digitalocean.com/?refcode=c0167ae9a50a) SSD storage!) 

![Old vs new](/content/images/2014/12/archive_upgrade.png)

I have a list of thumbnails being read in from a CSV file, and dumped out. Also, if in any directory there's a "readme.md" file, it gets dumped out onto that page. Useful if you want a short description of a series or something of the sort. 

A live demo is available [here](http://archive.spepmedia.com), and you can see my code on [github](https://github.com/joshgordon/sermon-archive). If you want to see the directory structure underlying the archive, you can accss it [here](http://archive.spepmedia.com/sermons). 