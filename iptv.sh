#!/bin/bash
CRTDIR=$(cd "$(dirname "$0")";pwd)

php $CRTDIR/collect_iptv_to_txt.php | tee /Users/edy/software/php/iptv.log
php $CRTDIR/convert2m3u8.php | tee /Users/edy/software/php/iptv.log
cd $CRTDIR
if [ -n "$(git status -s)" ]; then
    git add .
    git ci -m 'auto update'
    git push
fi