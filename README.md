# WHMCS-enhanced-auto-release
This simple WHMCS hook enriches details about services managed by the auto-release module

auto-release is a handy way to manage in WHMCS external services manually, and it's useful for services that have no integration modules available.

But if you set to manage them using internal to-do utility, it's annoying because WHMCS will report just the service ID and a short
description of action required (renew, suspend etc.)

This simple hook will add also service name, making the following job easier faster, and even more safe (it may happen that you open the service with a wrong ID, so i.e. you go on renewing the wrong service...)

For further details:  https://domainregister.international/index.php?rp=/knowledgebase/584/WHMCS-Enhanced-Auto-Release-Hook.html
