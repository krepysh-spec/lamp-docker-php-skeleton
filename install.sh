#!/usr/bin/env bash
set -euo pipefail

echo "Let's start the installation PHP Skeleton"

echo "Checking requirements..."
if [ -x "$(command -v git)" ]
then
    echo "SUCCESS: Git is installed"
else
    echo "ERROR: Git does not seem to be installed."
    echo "Please download Git using your package manager or over https://git-scm.com/!"
    exit 1
fi

if [ -x "$(command -v docker)" ]
then
    echo "SUCCESS: Docker is installed"
else
    echo "ERROR: Docker does not seem to be installed."
    echo "Please download docker https://docs.docker.com/compose/install/compose-desktop/"
    exit 1
fi

Path=${1:-lamp-docker-php-skeleton/}
echo "Cloning PHP Skeleton at $Path..."
git clone -q https://github.com/krepysh-spec/lamp-docker-php-skeleton "$Path"

cd "$Path"

echo "Running command make init"
make init

echo "All done! Check you .env file and run command make install."