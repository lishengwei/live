#!/bin/bash
CRTDIR=$(cd "$(dirname "$0")";pwd)

echo run `date +"%Y-%m-%d %H:%M:%S"` > $CRTDIR/iptv.log
/usr/local/Cellar/php@7.3/7.3.33_7/bin/php $CRTDIR/collect_iptv_to_txt.php
echo collect_iptv_to_txt done `date +"%Y-%m-%d %H:%M:%S"` >> $CRTDIR/iptv.log
/usr/local/Cellar/php@7.3/7.3.33_7/bin/php $CRTDIR/convert2m3u8.php
echo convert2m3u8 done `date +"%Y-%m-%d %H:%M:%S"` >> $CRTDIR/iptv.log
cd $CRTDIR
if [ -n "$(git status -s)" ]; then
    git add .
    git ci -m 'auto update'
    git push
fi