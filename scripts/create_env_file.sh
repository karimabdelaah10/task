#!/bin/sh

# shellcheck disable=SC2164
echo "in create env file.sh"

cp .env.example .env
# Get the current user's UID
USER_ID=$(id -u)
GROUP_ID=$(id -g)
echo "USER_ID=$USER_ID" >> .env
echo "GROUP_ID=$GROUP_ID" >> .env
