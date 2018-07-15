---
layout: post
title: Chromebook! (But without ChromeOS)
date: '2016-06-12 23:20:06'
---

I got a chromebook this week, and thought I'd post some notes about it. I'll go over some high points about the hardware, and then provide some more wiki-like information about getting fedora to boot and run well on it. Feel free to leave comments about your experience with Linux on a chromebook - especially if it's the same one I've got!

I bought a [Toshiba Chromebook 2](http://amzn.to/1ZCsa1d) and put Fedora 23 on it. 

## The good parts
This is the best hardware I've ever run Linux on. Almost everything (with the exception of the keyboard backlight, more on that later) works out of the box, the trackpad has reasonable drivers (that reject my thumb when I rest it on the bottom of the trackpad and supports 2 finger scrolling) and overall it's the best computer I've run desktop linux on. 

Admittedly, the last computer I tried to run desktop linux on was my MacBook Pro, and honestly, the lack of trackpad drivers (and the inability to switch graphics cards!) makes that a terrible experience. Before that, I was running on a 2006-era dell laptop with a core duo, so I've come a long way. 

## The technical (and still (mostly) good) parts
("but as we all know, there's a big difference between mostly [good] and all [good].")

### Hardware
Like I stated before, this is the best experience I've gotten from desktop linux ever. That said, I have a few minor complaints. 

#### Trackpad
The trackpad is a bit squishy compared to my mac. Overall, it's quite a bit more functional than the trackpad on my mac under linux. That was just painful... 

#### Keyboard
Overall the keyboard is really nice. Not quite on the level of my mechanical keyboard - but nothing that's not a mechanical keyboard will match that. The lack of home/end/pgup/pgdn/delete keys is a minor inconvenience The chicklet keys feel nice, and I can type at a reasonable pace on them. 

#### Screen
Wow, everything is tiny, but crisp, clear, and easy enough to read. Colors seem accurate, the screen gets pretty bright, and looks amazing. I even realized the viewing angle is better than that of my early 2011 Macbook Pro!

#### General build quality
This is where my glowing review gets a little less glowing. The frame on this thing is plastic, and it feels very flexible. I have long term concerns about durability, but I figure if I can get more than a year or two out of it, I'm doing pretty well. The amount of flex in the body and screen of the laptop concerns me a bit. 

Only time will tell how long this lasts. Hopefully long enough.

#### Battery Life
Impressive, to say the least. I am probably getting more than 4-6 hours. I don't know for sure, I've only had it for a couple of days. Pretty impressive from what I can tell.


###Software
Onto the fun stuff.

#### ChromeOS
ChromeOS is nice enough. I didn't use it for more than an hour or so before I blew it away and put fedora on it. My impression of it was very good, but I'm going to let you look elsewhere for a better review. 

If you do blow away ChromeOS in favor of another distro, consider going and grabbing your 100gb of Google Drive storage before you do! Otherwise you'll have to do what I did and put the original SSD *back* in to get that.

#### Fedora
Fedora runs really well, and everything except for the keyboard backlight work out of the box. To get the keyboard backlight working, I had to follow the directions on [this](http://www.pants.nu/~jmcminn/toshiba-2015-chromebook-linux.html) page. More on that in a bit... 

#####Getting into SeaBIOS
First, I booted up into ChromeOS to make sure everything worked as expected. Good News, it did! Then, I made myself a recovery USB stick and charged ahead. 

I opened up the machine and swapped out the m.2 SSD with a [256 GB drive](http://amzn.to/25PPBb6). 11 screws total - 10 to remove the bottom cover, and one to free the SSD. 

While you're in there, remove the hardware BIOS write protect screw. You'll need this out in a second. You can optionally put it back when you're done - it's up to you. If you want to put it back, don't put the chromebook back together yet!

After the new SSD was in, I rebooted the chromebook, and was welcomed by a "OS corrupt, insert recovery media." screen. I did, and within 5 minutes, I was back in ChromeOS. Wow, that was the easiest OS reinstall I've ever done. 

Now it's time to get serious. I used [These](http://notes-danielbeckman.rhcloud.com/toshiba-chromebook-2-2015-edition-installing-fedora-23/) instructions, but made a couple of notes along the way. 

The main thing I have to note is that when it says "Open a shell" it's *actually* referring to a linux shell with ctrl-alt-<forward> and signing in as root with the password you specified when you set up developer mode. (or if you forgot to do that, sign in as chronos without a password). After you've confirmed that ChromeOS still boots, you can set SeaBIOS as the default. I followed [these](https://wiki.archlinux.org/index.php/Chrome_OS_devices#Boot_to_SeaBIOS_by_default) instructions from the always-useful archwiki. 

This is the point where you can (optionally) the hardware write protect screw back.
 
#####Actually installing Fedora
After that, the problem is reduced to installing fedora, which is left as an exercise for the reader.

#####Keyboard Backlight
As I alluded to before, this took a little bit of extra work. I got it working pretty well, though, so I'm happy with it!

The instructions I followed led me to do something like this: 

```
dnf group install "Development Tools"
dnf install kernel-devel
dnf update
reboot # to get newest kernel updates running
wget http://www.pants.nu/~jmcminn/backlight-driver.tar.gz
tar xvfz backlight-driver.tar.gz
cd backlight-driver
make
cp chromebook_kb_backlight.ko /lib/modules/`uname -r`/kernel/drivers/platform/chrome/
cp chromeos_keyboard_leds.ko /lib/modules/`uname -r`/kernel/drivers/platform/chrome/
depmod -a
modprobe chromebook_kb_backlight
modprobe chromeos_keyboard_leds
echo chromebook_kb_backlight > /etc/modules-load.d/chromebook_kb_backlight.conf
echo chromeos_keyboard_leds > /etc/modules-load.d/chromebook_kb_backlight.conf
```

Great. That works, but what if I don't want to recompile every time I get a new kernel? Fortunately, this is a solved problem, thanks to DKMS. I forked the [kernel module](https://github.com/joshgordon/chromebook_keyboard_backlight_driver/) and added a dkms configuration. Now it should be as simple as telling DKMS about the module and letting it rebuild it on new kernel updates. Here's how: 

+ `dnf groupinstall "Development Tools"`
+ `dnf install dkms kernel-devel`
+ clone the repo into /usr/src/chromebook_keyboard_backlight_driver-1.0.0
+ run `dkms add -m chromebook_keyboard_backlight_driver -v 1.0.0`
+ run `dkms build -m chromebook_keyboard_backlight_driver -v 1.0.0`
+ run `dkms install -m chromebook_keyboard_backlight_driver -v 1.0.0`

That should get the kernel module set up to auto-build on new kernel versions. (I haven't gotten a new one from fedora since I set this up, so I don't know yet. I'll update this when I do!)

After that I followed the instructions to set up `keyboard_brightness` in `/usr/local/bin` with the `setuid` bit set, and configured some function keys to trigger the commands to adjust the backlight. 

#####Trackpad
I discovered that `gnome-tweak-tool` has a setting to do multi-finger clicks with the trackpad instead of designating zones. Since this is what I do on my mac, it's much more natural to me (and then I don't trigger right clicks by accident!)


##### Power Button
The power button being above backspace is annoying -- I keep hitting it by accident. 

The fix is easy, install `dconf-editor`, go to `org > gnome > settings-daemon > plugins > power > power-button-action` and set it to `disabled`

## Conclusion

Over all, if you're looking for a small-ish, lightweight laptop to run Linux on, the Toshiba Chromebook 2 is definitely something to look at.