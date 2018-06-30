FROM ubuntu:18.04

ARG UID=1000
ARG GID=1000

RUN apt-get update && \
    apt-get install -y tzdata locales && \
    ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
    dpkg-reconfigure -f noninteractive tzdata && \
    echo "ja_JP UTF-8" > /etc/locale.gen && \
    locale-gen && \
    apt-get clean

ENV LANG=ja_JP.utf8

RUN apt-get update && \
    apt-get install -y less vim curl python php php-fpm nginx && \
    apt-get clean

RUN curl -L https://bootstrap.pypa.io/ez_setup.py | python && \
    easy_install supervisor

RUN groupadd -g $GID pomot && \
    useradd -u $UID -g $GID pomot

RUN rm -f /etc/php/7.2/fpm/pool.d/* && \
    rm -f /etc/nginx/sites-enabled/*

COPY docker/nginx /etc/nginx
COPY docker/supervisord.conf /etc/supervisord.conf
COPY docker/supervisord.d /etc/supervisord.d
COPY docker/php-fpm /etc/php/7.2/fpm

VOLUME ["/opt/pomot", "/data"]

CMD ["supervisord", "-n"]
