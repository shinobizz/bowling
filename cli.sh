#!/bin/bash

docker run --rm -ti -w="/app" \
    -v $PWD/docker/.composer:/home/wwwagent/.composer:delegated \
    -v $PWD:/app gitlab.atrapalo.com:5005/service-engineering/registry/phpcli:7.2 /bin/bash
