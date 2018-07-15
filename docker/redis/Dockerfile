FROM redis:latest

COPY redis.conf /usr/local/etc/redis/redis.conf
CMD [ "redis-server", "/usr/local/etc/redis/redis.conf" ]

EXPOSE 6379

#CMD tail -f /etc/hosts
CMD tail -f /dev/null

