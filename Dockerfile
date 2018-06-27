FROM ubuntu:18.04

RUN apt-get update && \
    apt-get install -y tzdata locales curl python && \
    ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
    dpkg-reconfigure -f noninteractive tzdata && \
    echo "ja_JP UTF-8" > /etc/locale.gen && \
    locale-gen && \
    apt-get clean

ENV LANG=ja_JP.utf8

RUN apt-get update && \
    apt-get install -y curl python php && \
    apt-get clean

RUN curl -L https://bootstrap.pypa.io/ez_setup.py | python && \
    easy_install supervisor

VOLUME ["/opt/pomot", "/var/lib/mysql"]
