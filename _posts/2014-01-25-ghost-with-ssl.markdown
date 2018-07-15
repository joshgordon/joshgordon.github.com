---
layout: post
title: Ghost with ssl
date: '2014-01-25 04:25:04'
---

So, in the process of setting up nginx on my new arch VPS, I decided "What the heck, I'm going to allow my blog to be served over https." 

Yup, that's right. https://blog.joshgordon.net now brings you to my blog. Admittedly, I'm too cheap to buy a certificate at this point, so you have to click through some scary warnings. 

Anyways, here's the gist of my nginx config: 

    upstream blog.joshgordon.net {
      server 127.0.0.1:2368;
    }
    ... # stuff here for http. 
    
    server {
      listen 443 ssl;
      server_name blog.joshgordon.net;
      ssl on;
      ssl_certificate [redacted]/server.crt;
      ssl_certificate_key [redacted]/server.key;

      location / {
        proxy_pass http://blog.joshgordon.net;
        proxy_set_header Host $host;

        proxy_redirect http:// https://;
      }
    }

I used Digital Ocean's [guide](https://www.digitalocean.com/community/articles/how-to-create-a-ssl-certificate-on-nginx-for-ubuntu-12-04/) to setting up nginx with ssl, and found [this](http://chase-seibert.github.io/blog/2011/12/21/nginx-ssl-reverse-proxy-tutorial.html) page on the specifics. 