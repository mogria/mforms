#!/bin/bash
if [ -z $1 ]; then
  dir=$(pwd)
else
  dir=$1
fi

ls -1 $dir | while read line; do
  line=$dir/$line
  if [ -f $line ]; then
     echo $line | grep -E '~$' | while read file; do
       echo "removing $file ..." 
       rm $file
     done
  elif [ -d $line ]; then 
    call="$0 $line"
    $call
  fi
done
