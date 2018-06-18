#!/bin/bash
HOME_DIR=/home/ubuntu

#cleanup athena containers to avoid timeouts
yes | $HOME_DIR/athena/athena selenium cleanup all
yes | $HOME_DIR/athena/athena cleanup all

