#!/bin/bash
HOME_DIR=/home/ubuntu

seleniumVersion=$(<$HOME_DIR/athena-olxph/utils/seleniumVersion.txt)
parallelism=2

#start selenium hub and chrome nodes
$HOME_DIR/athena/athena selenium start hub $seleniumVersion || true
$HOME_DIR/athena/athena selenium start chrome-debug $seleniumVersion --env DBUS_SESSION_BUS_ADDRESS=/dev/null -v /dev/shm:/dev/shm -t -d -P --instances=$parallelism || true
sleep 2s

#stop selenium container
$HOME_DIR/athena/athena selenium stop chrome-debug || true
$HOME_DIR/athena/athena selenium stop hub || true