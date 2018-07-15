---
layout: post
title: Setting my lights up as a service...
date: '2014-04-11 00:44:11'
tags:
- lights
---

In putting together my new light setup, I decided it was time to make my lights a service. Since I lost my pi's configuration a few weeks ago (The FS on the SD card went bad, so I decided it was time to switch to Arch Linux on the Pi...), I decided it was time to make it a service. 

I've always found services on Ubuntu/Debian a bit confusing. I know that there are a set of scripts that go in /etc/init.d, but I never know what is supposed to go in them, or how to write one from scratch. 

Of course, Arch uses systemd, so it's trivial. I put a file that looks like this in /etc/systemd/sysetm named pylights.service, and now I can treat it like a service. 


    [Unit]
    Description=Python Weblights
    
    [Service]
    Type=simple
    PrivateTmp=false
    PIDFile=/run/pylights.pid
    ExecStart=/usr/bin/python2 /root/pyLights/web/web.py &
    
    [Install]
    WantedBy=default.target

---
```
[root@lights system]# systemctl status pylights
pylights.service - Python Weblights
   Loaded: loaded (/etc/systemd/system/pylights.service; static)
   Active: active (running) since Thu 2014-04-10 18:36:13 MDT; 4min 7s ago
 Main PID: 15643 (python2)
   CGroup: /system.slice/pylights.service
           `-15643 /usr/bin/python2 /root/pyLights/web/web.py &

Apr 10 18:36:13 lights systemd[1]: Started Python Weblights.
Apr 10 18:36:20 lights python2[15643]: Bottle v0.12.5 server starting up (using WSGIRefServer())...
Apr 10 18:36:20 lights python2[15643]: Listening on http://0.0.0.0:80/
Apr 10 18:36:20 lights python2[15643]: Hit Ctrl-C to quit.
[root@lights system]# systemctl restart pylights
[root@lights system]# systemctl stop pylights
[root@lights system]# systemctl start pylights
[root@lights system]# systemctl status pylights
pylights.service - Python Weblights
   Loaded: loaded (/etc/systemd/system/pylights.service; static)
   Active: active (running) since Thu 2014-04-10 18:40:33 MDT; 5s ago
 Main PID: 15659 (python2)
   CGroup: /system.slice/pylights.service
           `-15659 /usr/bin/python2 /root/pyLights/web/web.py &

Apr 10 18:40:33 lights systemd[1]: Started Python Weblights.
Apr 10 18:40:39 lights python2[15659]: Bottle v0.12.5 server starting up (using WSGIRefServer())...
Apr 10 18:40:40 lights python2[15659]: Listening on http://0.0.0.0:80/
Apr 10 18:40:40 lights python2[15659]: Hit Ctrl-C to quit.
```

It's that easy. Now I just need to figure out JQuery color pickers, and some AJAX stuff, write an Android app, (Sorry iOS lovers, I gave away my iPod, and in any case, I'm *not* paying Apple $100 a year for the privilige of running my own code on **MY** device.), do this, do that, and be done in the next 3 years... Oh, and I'll probably port it to Python3 somewhere along the way... 

Edit: Added install options to make it enable-able through systemctl.