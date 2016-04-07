#!/bin/bash

timestamp=$(date +%Y%m%d_%H%M%S)
path="/tmp/"
filename=del_pics_$timestamp.log
log=$path/$filename

sudo find /media/pi/pics/* -delete

echo "Backup:: Script Begin -- $(date +%Y%m%d_%H%M)" >> $log

START_TIME=$(date +%s)

END_TIME=$(date +%s)

ELAPSED_TIME=$(expr $END_TIME - $START_TIME)

echo "Backup :: Script Finished -- $(date +%Y%m%d_%H%M)" >> $log
echo "Elapsed Time :: $(date -d 00:00:$ELAPSED_TIME +%Hh:%Mm:%Ss)" >> $log
