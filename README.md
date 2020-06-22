# WHMCS-enhanced-auto-release
This WHMCS hook enriches details about services managed by auto-release module

auto-release is a handy way to manage in WHMCS external services manually, and it's useful for services which have no integration modules available.

But if you set to manage them using internal to-do utility, it's annoying because WHMCS will report just the service ID and a short
description of action required (renew, suspend etc.)

This simple hook will add also service name, making the following job easier faster, and even more safe (it may happen that you open the service with a wrong ID, so i.e. you go on renewing the wrong service...)

