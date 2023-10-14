#!/bin/sh

# shellcheck disable=SC2164
echo "in create env file.sh"

cp .env.example .env
# Get the current user's UID
USER_UID=$(id -u)
GROUP_ID=$(id -g)
echo "USER_UID=$USER_UID" >> .env
echo "GROUP_ID=$GROUP_ID" >> .env
