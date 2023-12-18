#!/bin/bash
CRTDIR=$(cd "$(dirname "$0")";pwd)

echo run `date +"%Y-%m-%d %H:%M:%S"` > $CRTDIR/iptv.log
php $CRTDIR/collect_iptv_to_txt.php
php $CRTDIR/convert2m3u8.php
cd $CRTDIR
if [ -n "$(git status -s)" ]; then
    git add .
    git ci -m 'auto update'
    git push
fi