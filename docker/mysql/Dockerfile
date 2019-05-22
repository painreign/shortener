FROM mysql:5.7
ADD dump.sql /docker-entrypoint-initdb.d/
RUN chmod +x /docker-entrypoint-initdb.d/dump.sql