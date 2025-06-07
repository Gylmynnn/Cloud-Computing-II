#!/bin/sh

TARGET_DIRECTORY="/var/www/html"

if [ -z "$(ls -A $TARGET_DIRECTORY)" ]; then
    echo "menyalin file ke directory tujuan"
    cp -r /apps-init/* "$TARGET_DIRECTORY"
else
    echo "file sudah tersedia pada directory"
fi

exec "$@"
