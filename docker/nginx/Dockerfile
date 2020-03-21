FROM nginx:1.17-alpine

RUN apk update && \
    apk add --update openssl nginx && \
    mkdir /etc/nginx/certificates && \
    openssl req \
        -x509 \
        -newkey rsa:2048 \
        -keyout /etc/nginx/certificates/key.pem \
        -out /etc/nginx/certificates/cert.pem \
        -nodes \
        -subj /CN=docker && \
    rm -rf /var/cache/apk/*
